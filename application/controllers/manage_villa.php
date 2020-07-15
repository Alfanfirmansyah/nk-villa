<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Manage_villa extends CI_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->helper('url');
			$this->load->model('M_session');
			$this->load->model('M_manage_villa');
			$this->load->model('M_template');
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
				$data['data_villa'] = $this->M_manage_villa->tampil_data_villa();
				$data['data_type'] = $this->M_manage_villa->tampil_data_type();
				$data['data_user'] = $this->M_manage_villa->tampil_data_user();
		
				$username = $session['session_userid'];
				$data['tgl_sekarang'] = date('D, d-m-Y');
				$data['notif_transaksi'] = $this->M_template->tampil_notif();
				$data['jml_transaksi'] = $this->M_template->jml_notif();
				$data['tampil_nama_user'] = $this->M_template->tampil_pengguna_admin($username);
		 		$data['konten_template']    =  'v_manage_villa';
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
					'id_villa'=>'',
                    'id_type'=>$this->input->post('type_villa'),
                    'id_user'=>$this->input->post('owner'),
                    'nama_villa'=>$this->input->post('nama_villa'),
					'deskripsi_detail'=>$this->input->post('deskripsi'),
					'toilet'=>$this->input->post('kamarmandi'),
					'garasi'=>$this->input->post('garasi'),
					'kamar'=>$this->input->post('kamartidur'),
					'diskon'=>$this->input->post('diskon'),
					'harga_weekend'=>$this->input->post('harga_weekend'),
					'harga_weekday'=>$this->input->post('harga_weekday'),
					'harga_frontend_wk'=>$this->input->post('harga_frontend2'),
					'harga_frontend_wd'=>$this->input->post('harga_frontend')
                );
			
			$this->M_manage_villa->simpan($data);
			redirect('manage_villa');
		}
		
	function upload_gambar() {
			$kode = $this->input->post('id_villa'); 
			$config['upload_path'] = './assets/img/type_villa/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|';
			$config['overwrite']= TRUE;
			$config['max_size']	= 0;
			$config['max_width']  = 0;
			$config['max_height']  = 0;
				$this->upload->initialize($config);
				$this->upload->do_upload('gambar');
				$gambar = $this->upload->file_name;			
				$data=array(
					'id_img'=>'',
                    'id_villa'=>$this->input->post('id_villa'),
					'gambar'=>$gambar
                 );
			$this->M_manage_villa->simpan_gambar($data);
			redirect('manage_villa/detail_adminvilla/'.$kode);
	}

		function update_villa($id) {
			$session = $this->M_session->get_session();
			if (!$session['session_userid']){
				//user belum login
				$this->load->view('view_login_template');
			}
			else{
				if($this->input->post('submit')) {
			
					 $data=array(
						'id_type'=>$this->input->post('type_villa'),
						'id_user'=>$this->input->post('owner'),
						'nama_villa'=>$this->input->post('nama_villa'),
						'diskon'=>$this->input->post('diskon'),
						'harga_weekday'=>$this->input->post('harga_frontend'),
						'harga_frontend_wd'=>$this->input->post('harga_weekday'),
						'harga_frontend_wk'=>$this->input->post('harga_weekend'),
						'harga_weekend'=>$this->input->post('harga_frontend2'),
						'kamar'=>$this->input->post('kamartidur'),
						'toilet'=>$this->input->post('kamarmandi'),
						'garasi'=>$this->input->post('garasi'),
						'deskripsi_detail'=>$this->input->post('deskripsi')
					);
					
					  $this->M_manage_villa->update_villa($id,$data);
					  redirect('manage_villa');
				} 
					  
				$data['list'] = $this->M_manage_villa->getById_villa($id);
					$username = $session['session_userid'];
					$data['tgl_sekarang'] = date('D, d-m-Y');
					$data['data_type'] = $this->M_manage_villa->tampil_data_type();
					$data['data_user'] = $this->M_manage_villa->tampil_data_user();
					$data['notif_transaksi'] = $this->M_template->tampil_notif();
					$data['jml_transaksi'] = $this->M_template->jml_notif();
					$data['tampil_nama_user'] = $this->M_template->tampil_pengguna_admin($username);
					 $data['konten_template']    =  'update_villa';
					$this->load->view('view_admin_template',$data);
				}
				
			}
		
		
		function detail_adminvilla($id) {
			$session = $this->M_session->get_session();
			if (!$session['session_userid']){
				//user belum login
				$this->load->view('view_login_template');
	
			}
			else{
					  
				$data['list'] = $this->M_manage_villa->getById_villa($id);
				$data['list_gambar'] = $this->M_manage_villa->getGambar_villa($id);
					$username = $session['session_userid'];
					$data['tgl_sekarang'] = date('D, d-m-Y');
					$data['data_type'] = $this->M_manage_villa->tampil_data_type();
					$data['data_user'] = $this->M_manage_villa->tampil_data_user();
					$data['notif_transaksi'] = $this->M_template->tampil_notif();
					$data['jml_transaksi'] = $this->M_template->jml_notif();
					$data['tampil_nama_user'] = $this->M_template->tampil_pengguna_admin($username);
					 $data['konten_template']    =  'detail_adminvilla';
					$this->load->view('view_admin_template',$data);
				}
				
			}
			
			
	
	function delete_villa() {
			$kode = $this->security->xss_clean($this->uri->segment(3));
			$result = $this->M_manage_villa->get_data_villa($kode);
			if($result == null) redirect('manage_villa');
			else $this->M_manage_villa->delete_data_villa($kode);
				redirect('manage_villa');
		}

	function open(){

		$idvilla = $this->input->post('id_villa');
			 $data=array(
						'status_villa'=>$this->input->post('status'),
					);
		$this->M_manage_villa->open($idvilla,$data);
		redirect('manage_villa/detail_adminvilla/'.$idvilla);
	}

	function closevilla(){

		$idvilla = $this->input->post('id_villa');
			 $data=array(
						'status_villa'=>$this->input->post('status'),
					);
		$this->M_manage_villa->closevilla($idvilla,$data);
		redirect('manage_villa/detail_adminvilla/'.$idvilla);
	}
		
	function delete_gambar($id) {
			$result = $this->M_manage_villa->get_data_gambar($id);
			$kode = $result->id_villa;
			if($result == null) redirect('manage_villa/detail_adminvilla/'.$kode);
			else $this->M_manage_villa->delete_data_gambar($id);
				redirect('manage_villa/detail_adminvilla/'.$kode);
		}

		
		
	

 //--------------------------------------------------------------------------------------------------------------------
}