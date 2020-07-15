<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');
class Login extends CI_Controller{
	public function __construct(){
            parent::__construct();  
			$this->load->model('M_session');	
			$this->load->model('M_dashboard');	
			$this->load->model('M_template');	
			date_default_timezone_set('Asia/Jakarta');
	}
	
	function index(){
		  
		$this->load->view('view_login_template');
	}
	
	function proses(){
	$this->load->model('M_master_userid','',true);
		
		// tangkap data dari inputan form
		$userid = $_POST['userid'];
		$password = sha1($_POST['password']);
		//$password = sha1(sha1($_POST['password']).$_POST['password']);
		
		// validasi form
		$this->form_validation->set_rules('userid', 'Userid', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->run();
		
		//  inisialisasi variabel
		$data['userid'] = '';
		$data['password'] = '';
		$data['status'] = '';
		$data['key'] = '';
		
		// ambil record dari tabel user
		$result= $this->M_master_userid->get_userid($userid);
		
		foreach ($result->result() as $row ){
			$data['userid'] = $row->username;
			$data['password'] = $row->password;
			$data['status'] = $row->status;
			$data['key'] = $row->id_user;
		}
		
		// bandingkan inputan form dengan record tabel
		if ($userid==$data['userid'] and $password==$data['password']){
			$status = $data['status'];
			$key = $data['key'];
			
			$this->M_session->store_session($userid,$status,$key);  // simpan session userid
			
			if($data['status']=='admin'){
					echo "<script type='text/javascript'>
						alert ('Selamat Anda berhasil masuk Ke Sistem !');
					   </script>";
				$this->dashboard_admin();
			}
			else if($data['status']=='owner'){
					echo "<script type='text/javascript'>
						alert ('Selamat Anda berhasil masuk Ke Sistem !');
					   </script>";
				$this->dashboard_owner();
			}
			else{
				echo "<script type='text/javascript'>
						alert ('Maaf Username Dan Password Anda Salah !');
					   </script>";
					$this->index();
			}
		}else{
				echo "<script type='text/javascript'>
						alert ('Maaf Username Dan Password Anda Salah !');
					   </script>";
					 $this->index();
		}
	
	}
	
	function dashboard_admin(){
		$data['jml_villa'] = $this->M_dashboard->jml_villa();
		$data['jml_villa_tersedia'] = $this->M_dashboard->jml_villa_tersedia();
		$data['jml_villa_full'] = $this->M_dashboard->jml_villa_full();
		
		$session = $this->M_session->get_session();
		$id_user = $session['session_userid'];
		$status = $session['session_status'];
		
		$username = $session['session_userid'];
		$data['tgl_sekarang'] = date('D, d-m-Y');
		$data['notif_transaksi'] = $this->M_template->tampil_notif();
		$data['jml_transaksi'] = $this->M_template->jml_notif();
		$data['tampil_nama_user'] = $this->M_template->tampil_pengguna_admin($username);
 		$data['konten_template']    =  'admin';
        $this->load->view('view_admin_template',$data);
    }
	
	function dashboard_owner(){
		$session = $this->M_session->get_session();
		$id_user = $session['session_userid'];
		$status = $session['session_status'];
		$key = $session['session_key'];
		
				$tgl = date('Y-m-d');
				$data['jml'] = $this->M_dashboard->jml_list_sewa($key,$tgl);
				$data['listsewa'] = $this->M_dashboard->list_sewa($key,$tgl);
				$data['data_transaksi'] = $this->M_dashboard->tampil_data_transaksi($key);
			
				$data['jml_villa'] = $this->M_dashboard->jml_villa_owner($key);
				$data['villa'] = $this->M_dashboard->villa_owner($key);
				$data['sewa'] = $this->M_dashboard->villa_owner_sewa($key);
				$data['user'] = $this->M_dashboard->owner($key);
		
		$username = $session['session_userid'];
		$data['tgl_sekarang'] = date('l, d-m-Y');
		$data['notif_transaksi'] = $this->M_template->tampil_notif();
		$data['jml_transaksi'] = $this->M_template->jml_notif();
		$data['tampil_nama_user'] = $this->M_template->tampil_pengguna_admin($username);
 		$data['konten_template']    =  'owner';
        $this->load->view('view_owner_template',$data);
    }

    function logout(){
		$this->session->sess_destroy();
		redirect(site_url('login/'));
	}
	
}