<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Manage_transaksi extends CI_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->helper('url');
			$this->load->model('M_session');
			$this->load->model('M_template');
			$this->load->model('Muser');
			$this->load->model('M_manage_transaksi');
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
				$data['data_transaksi'] = $this->M_manage_transaksi->tampil_data_transaksi();
				$data['data_villa'] = $this->M_manage_transaksi->tampil_data_villa();
				$username = $session['session_userid'];
				$data['tgl_sekarang'] = date('D, d-m-Y');
				$data['notif_transaksi'] = $this->M_template->tampil_notif();
				$data['jml_transaksi'] = $this->M_template->jml_notif();
				$data['tampil_nama_user'] = $this->M_template->tampil_pengguna_admin($username);
		 		$data['konten_template']    =  'v_manage_transaksi';
		        $this->load->view('view_admin_template',$data);
			}
			else if ($id_user && $status=='owner'){
			
			
			}
			
			else {
				
			}
		}	 
	}
	 public function cetak()
    { 
		  $kode_transaksi = $this->uri->segment(3);
		  $row = $this->Muser->get_row_transaksi($kode_transaksi); 
          $baris = $this->Muser->get_row_transaksi2($kode_transaksi);
		  $data['selesai'] = $baris->selesai;
          $data['kode_transaksi']        = $row->kode_transaksi;
          $data['qrcode']        = $row->qrcode;
          $data['nama_penyewa']        = $row->nama_penyewa;
          $data['nama_type']           = $row->nama_type;
          $data['nama_villa']           = $row->nama_villa;
          $data['no_telp']           = $row->no_telp;
          $data['alamat']           = $row->alamat;
          $data['email']           = $row->email;
          $data['tgl_start']           = $row->tgl_start;
          $data['tgl_end']      = $row->tgl_end;
          $data['total_harga']             = $row->total_harga; 

      $this->load->view('cetak',$data);
    }
    

	function calendar(){

		$idvilla = $this->input->post('id_villa');
		echo "<script>
window.location.href='/services/calen/index.php/calendar/detail/$idvilla';
</script>";
    }
	

	
	function record(){
		$session = $this->M_session->get_session();
		if (!$session['session_userid'] && !$session['session_status']){
			//user belum login
			$this->load->view('view_login_template');

		}
		else{
		$id_user = $session['session_userid'];
		$status = $session['session_status'];
		
			if ($id_user && $status=='admin'){
				$data['data_transaksi'] = $this->M_manage_transaksi->tampil_data_transaksi_selesai();

				$username = $session['session_userid'];
				$data['tgl_sekarang'] = date('D, d-m-Y');
				$data['notif_transaksi'] = $this->M_template->tampil_notif();
				$data['jml_transaksi'] = $this->M_template->jml_notif();
				$data['tampil_nama_user'] = $this->M_template->tampil_pengguna_admin($username);
		 		$data['konten_template']    =  'v_record_transaksi';
		        $this->load->view('view_admin_template',$data);
			}
			else if ($id_user && $status=='owner'){
			
			
			}
			
			else {
				
			}
		}	 
	}

	function verifikasi($id) {
		$session = $this->M_session->get_session();
		if (!$session['session_userid']){
			//user belum login
			$this->load->view('view_login_template');

		}
		else{
			if($this->input->post('submit')) {

				$idvilla = $this->input->post('id_villa');

							 
				 $data=array(
                    'status'=>$this->input->post('status'),
                    'pembayaran'=>$this->input->post('pembayaran')
					
                );
           
				

				
				  $this->M_manage_transaksi->update_status($id,$data);
			

				  redirect('manage_transaksi');
			} 
				  
			$data['list'] = $this->M_manage_transaksi->getById_transaksi($id);
				$username = $session['session_userid'];
				$data['tgl_sekarang'] = date('D, d-m-Y');
				$data['notif_transaksi'] = $this->M_template->tampil_notif();
				$data['jml_transaksi'] = $this->M_template->jml_notif();
				$data['tampil_nama_user'] = $this->M_template->tampil_pengguna_admin($username);
		 		$data['konten_template']    =  'verifikasi_transaksi';
		        $this->load->view('view_admin_template',$data);
			}
			
		}
		function tambahsewa2($id) {
		$session = $this->M_session->get_session();
		if (!$session['session_userid']){
			//user belum login
			$this->load->view('view_login_template');

		}
		else{
			if($this->input->post('submit')) {



				$idvilla = $this->input->post('id_villa');
				
				 
				 $data=array(
					'tgl_end'=>$this->input->post('tambah'),
                    'total_harga'=>$this->input->post('total')
					
                );
				
				  $this->M_manage_transaksi->update_pembayaran($id,$data);
				  redirect('manage_transaksi');
			} 
			$data['tambah'] = $this->input->post('tambah');	  
			$data['list'] = $this->M_manage_transaksi->getById_transaksi($id);
				$username = $session['session_userid'];
				$data['tgl_sekarang'] = date('D, d-m-Y');
				$data['notif_transaksi'] = $this->M_template->tampil_notif();
				$data['jml_transaksi'] = $this->M_template->jml_notif();
				$data['tampil_nama_user'] = $this->M_template->tampil_pengguna_admin($username);
		 		$data['konten_template']    =  'v_tambah_sewa2';
		        $this->load->view('view_admin_template',$data);
			}
			
		}
		
		function tambahsewa($id) {
		$session = $this->M_session->get_session();
		if (!$session['session_userid']){
			//user belum login
			$this->load->view('view_login_template');

		}
		else{
			if($this->input->post('submit')) {

				$idvilla = $this->input->post('id_villa');
				
				 
				 $data=array(
					'tgl_end'=>$this->input->post('tambah'),
                    'total_harga'=>$this->input->post('total')
					
                );
				
				  $this->M_manage_transaksi->update_pembayaran($id,$data);
				  redirect('manage_transaksi');
			} 
				  
			$data['list'] = $this->M_manage_transaksi->getById_transaksi($id);
				$username = $session['session_userid'];
				$data['tgl_sekarang'] = date('D, d-m-Y');
				$data['notif_transaksi'] = $this->M_template->tampil_notif();
				$data['jml_transaksi'] = $this->M_template->jml_notif();
				$data['tampil_nama_user'] = $this->M_template->tampil_pengguna_admin($username);
		 		$data['konten_template']    =  'v_tambah_sewa';
		        $this->load->view('view_admin_template',$data);
			}
			
		}

		function pelunasan(){

			   
				$kodetransaksi = $this->input->post('kode_transaksi');
				
				 
				 $data=array(
                    'pembayaran'=>$this->input->post('pembayaran')
       
					
                );
			
				  $this->M_manage_transaksi->update_pelunasan($kodetransaksi,$data);
	
				  redirect('manage_transaksi');
		}
		
		function selesai(){

			    $idvilla = $this->input->post('id_villa');
				$kodetransaksi = $this->input->post('kode_transaksi');
				
				 
				 $data=array(
                    'status'=>$this->input->post('status')
					
                );
           
				
				
				  $this->M_manage_transaksi->update_statusselesai($kodetransaksi,$data);
			
				  redirect('manage_transaksi');
		}
	
	

	
	

 //--------------------------------------------------------------------------------------------------------------------
}