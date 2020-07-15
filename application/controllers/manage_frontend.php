<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Manage_frontend extends CI_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->helper('url');
			$this->load->model('M_session');
			$this->load->model('M_template');			
			$this->load->model('M_manage_frontend');
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
				$data['data_home'] = $this->M_manage_frontend->tampil_data_home();

				$username = $session['session_userid'];
				$data['tgl_sekarang'] = date('D, d-m-Y');
				$data['notif_transaksi'] = $this->M_template->tampil_notif();
				$data['jml_transaksi'] = $this->M_template->jml_notif();
				$data['tampil_nama_user'] = $this->M_template->tampil_pengguna_admin($username);
		 		$data['konten_template']    =  'v_manage_home';
		        $this->load->view('view_admin_template',$data);
			}
			else if ($id_user && $status=='owner'){
			
			
			}
			
			else {
				
			}
		}	 
	}
	
	function update_title($id) {
		$session = $this->M_session->get_session();
		if (!$session['session_userid']){
			//user belum login
			$this->load->view('view_login_template');
		}
		else{
			if($this->input->post('submit')) {
				 $data=array(
                    'title'=>$this->input->post('title')
                );
				
				  $this->M_manage_frontend->update_home($id,$data);
				  redirect('manage_frontend');
			} 
				  
			$data['list'] = $this->M_manage_frontend->getById_home($id);
				$username = $session['session_userid'];
				$data['tgl_sekarang'] = date('D, d-m-Y');
				$data['notif_transaksi'] = $this->M_template->tampil_notif();
				$data['jml_transaksi'] = $this->M_template->jml_notif();
				$data['tampil_nama_user'] = $this->M_template->tampil_pengguna_admin($username);
		 		$data['konten_template']    =  'update_home';
		        $this->load->view('view_admin_template',$data);
			}
			
		}
		
	function upload_gambar() {
			$id = $this->input->post('id'); 
			$config['upload_path'] = './assets/img/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|';
			$config['overwrite']= TRUE;
			$config['max_size']	= 0;
			$config['max_width']  = 0;
			$config['max_height']  = 0;
				$this->upload->initialize($config);
				$this->upload->do_upload('gambar');
				$gambar = $this->upload->file_name;			
				$data=array(
					'img'=>$gambar
                 );
			$this->M_manage_frontend->update_home($id,$data);
			redirect('manage_frontend');
	}

	
	

 //--------------------------------------------------------------------------------------------------------------------
}