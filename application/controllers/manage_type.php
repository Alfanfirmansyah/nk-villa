<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Manage_type extends CI_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->helper('url');
			$this->load->model('M_session');
			$this->load->model('M_template');			
			$this->load->model('M_manage_type');
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
				$data['data_type'] = $this->M_manage_type->tampil_data_type();

				$username = $session['session_userid'];
				$data['tgl_sekarang'] = date('D, d-m-Y');
				$data['notif_transaksi'] = $this->M_template->tampil_notif();
				$data['jml_transaksi'] = $this->M_template->jml_notif();
				$data['tampil_nama_user'] = $this->M_template->tampil_pengguna_admin($username);
		 		$data['konten_template']    =  'v_manage_type';
		        $this->load->view('view_admin_template',$data);
			}
			else if ($id_user && $status=='owner'){
			
			
			}
			
			else {
				
			}
		}	 
	}
	
	function add_data() {
				 $data=array(
					'id_type'=>'',
                    'nama_type'=>$this->input->post('type'),
                    'location'=>$this->input->post('lokasi'),
                    'url'=>$this->input->post('link')
                );
			
			$this->M_manage_type->simpan($data);
			redirect('manage_type');
		}
	
	function delete_type() {
			$kode = $this->security->xss_clean($this->uri->segment(3));
			$result = $this->M_manage_type->get_data_type($kode);
			if($result == null) redirect('manage_type');
			else $this->M_manage_type->delete_data_type($kode);
				redirect('manage_type');
		}
		
	
	function update_type($id) {
		$session = $this->M_session->get_session();
		if (!$session['session_userid']){
			//user belum login
			$this->load->view('view_login_template');
		}
		else{
			if($this->input->post('submit')) {
				 $data=array(
                    'nama_type'=>$this->input->post('type'),
                     'location'=>$this->input->post('lokasi'),
                    'url'=>$this->input->post('link')
                );
				
				  $this->M_manage_type->update_type($id,$data);
				  redirect('manage_type');
			} 
				  
			$data['list'] = $this->M_manage_type->getById_type($id);
				$username = $session['session_userid'];
				$data['tgl_sekarang'] = date('D, d-m-Y');
				$data['notif_transaksi'] = $this->M_template->tampil_notif();
				$data['jml_transaksi'] = $this->M_template->jml_notif();
				$data['tampil_nama_user'] = $this->M_template->tampil_pengguna_admin($username);
		 		$data['konten_template']    =  'update_type';
		        $this->load->view('view_admin_template',$data);
			}
			
		}

	
	

 //--------------------------------------------------------------------------------------------------------------------
}