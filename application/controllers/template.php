<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan!');
class Template extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model("M_template");
		$this->load->model("M_session");
		date_default_timezone_set('Asia/Jakarta');
	}	
	
	public function login_template($data){
		$this->load->view('view_login_template', $data);
	}
	
	public function admin_template($data){
		$session = $this->M_session->get_session(); 
		$username = $session['session_userid'];
		
		$data['tgl_sekarang'] = date('D, d-m-Y');
		$data['notif_transaksi'] = $this->M_template->tampil_notif();
		$data['jml_transaksi'] = $this->M_template->jml_notif();
		$data['tampil_nama_user'] = $this->M_template->tampil_pengguna_admin($username);
		$this->load->view('view_admin_template', $data);
	}
	
	public function owner_template($data){
		$session = $this->M_session->get_session(); 
		$username = $session['session_userid'];
		
		$data['tgl_sekarang'] = date('D, d-m-Y');
		$data['notif_transaksi'] = $this->M_template->tampil_notif();
		$data['jml_transaksi'] = $this->M_template->jml_notif();
		$data['tampil_nama_user'] = $this->M_template->tampil_pengguna_owner($username);
		$this->load->view('view_owner_template', $data);
	}
	
}