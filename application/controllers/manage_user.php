<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Manage_user extends CI_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');	
			$this->load->model('M_template');	
			$this->load->model('M_manage_user');	
			date_default_timezone_set('Asia/Jakarta');			
			
	}
	
	function index(){
	$session = $this->M_session->get_session();
		
		if (!$session['session_userid'] && !$session['session_status']){
			//user belum login
			$this->load->view('view_login_template');

		}
		else{
		$id_user = $session['session_userid'];
		$status = $session['session_status'];
		
			if ($id_user && $status=='admin'){
					
				$data['data_type'] = $this->M_manage_user->tampil_data_user();
				$username = $session['session_userid'];
				$data['tgl_sekarang'] = date('D, d-m-Y');
				$data['notif_transaksi'] = $this->M_template->tampil_notif();
				$data['jml_transaksi'] = $this->M_template->jml_notif();
				$data['tampil_nama_user'] = $this->M_template->tampil_pengguna_admin($username);
		 		$data['konten_template']    =  'v_owner';
		        $this->load->view('view_admin_template',$data);
			}
			
		}
		
		 
	}

	function inputuser(){
				$username = $session['session_userid'];
				$data['tgl_sekarang'] = date('D, d-m-Y');
				$data['notif_transaksi'] = $this->M_template->tampil_notif();
				$data['jml_transaksi'] = $this->M_template->jml_notif();
				$data['tampil_nama_user'] = $this->M_template->tampil_pengguna_admin($username);
		 		$data['konten_template']    =  'v_input_owner';
		        $this->load->view('view_admin_template',$data);

	}

	function add_data() {
			$config['upload_path'] = './assets/img/foto_owner/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|';
			$config['overwrite']= TRUE;
			$config['max_size']	= 0;
			$config['max_width']  = 0;
			$config['max_height']  = 0;
				$this->upload->initialize($config);
				$this->upload->do_upload('foto');
				$foto = $this->upload->file_name;					
				
				 $data=array(
					'id_user'=>'',
					'username'=>$this->input->post('username'),
					'password'=>sha1($this->input->post('password')),
					'nama'=>$this->input->post('nama'),
					'email'=>$this->input->post('email'),
					'no_telp'=>$this->input->post('notelp'),
					'foto'=>$foto,
					'alamat'=>$this->input->post('alamat'),
					'status'=>$this->input->post('status')
                );
			
			$this->M_manage_user->simpan($data);
			redirect('manage_user');
		}

	function update_user($id) {
		$session = $this->M_session->get_session();
		if (!$session['session_userid']){
			//user belum login
			$this->load->view('view_login_template');

		}
		else{
			if($this->input->post('submit')) {
			$config['upload_path'] = './assets/img/foto_owner/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|';
			$config['overwrite']= TRUE;
			$config['max_size']	= 0;
			$config['max_width']  = 0;
			$config['max_height']  = 0;
				$this->upload->initialize($config);
				$this->upload->do_upload('foto');
				$foto = $this->upload->file_name;					
				
				 $data=array(
					'username'=>$this->input->post('username'),
					'password'=>sha1($this->input->post('password')),
					'nama'=>$this->input->post('nama'),
					'email'=>$this->input->post('email'),
					'no_telp'=>$this->input->post('notelp'),
					'foto'=>$foto,
					'alamat'=>$this->input->post('alamat'),
					'status'=>$this->input->post('status')
                );
				
				  $this->M_manage_user->update_user($id,$data);
				  redirect('manage_user');
			} 
				  
			$data['list'] = $this->M_manage_user->getById_user($id);
				$username = $session['session_userid'];
				$data['tgl_sekarang'] = date('D, d-m-Y');
				$data['notif_transaksi'] = $this->M_template->tampil_notif();
				$data['jml_transaksi'] = $this->M_template->jml_notif();
				$data['tampil_nama_user'] = $this->M_template->tampil_pengguna_admin($username);
		 		$data['konten_template']    =  'v_edit_owner';
		        $this->load->view('view_admin_template',$data);
			}
			
		}
		function delete_user() {
			$kode = $this->security->xss_clean($this->uri->segment(3));
			$result = $this->M_manage_user->get_data_user($kode);
			if($result == null) redirect('Manage_user');
			else $this->M_manage_user->delete_data_user($kode);
				redirect('manage_user');
		}

	
}