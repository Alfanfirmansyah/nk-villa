<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan!');
class Front extends CI_Controller{
	public function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model("Muser");
		$this->load->helper('url');
	}	
	
    public function index()
    {
		$data['title'] = $this->Muser->title();
		$data['tgl']            = date('l');
        $data['villa']              = $this->Muser->villa_all();
		$data['kategori']			= $this->Muser->kategori();
		$data['pos1']    		    = $this->Muser->villa_pos1();
		$data['pos2']    		    = $this->Muser->villa_pos2();
		$data['pos3']    		    = $this->Muser->villa_pos3();
		$data['pos4']    		    = $this->Muser->villa_pos4();
		
		$data['jml1']    		    = $this->Muser->jml_villa_pos1();
		$data['jml2']    		    = $this->Muser->jml_villa_pos2();
		$data['jml3']    		    = $this->Muser->jml_villa_pos3();
		$data['jml4']    		    = $this->Muser->jml_villa_pos4();
		
        $data['konten_template']    =  'beranda';
        $this->load->view('view_template_user',$data); 
    }

    public function villa()
    {
		$data['tgl']            = date('l');
        $data['villa']              = $this->Muser->villa_all();
		$data['kategori']			= $this->Muser->kategori();
		$data['pos1']    		    = $this->Muser->villa_pos1();
		$data['pos2']    		    = $this->Muser->villa_pos2();
		$data['pos3']    		    = $this->Muser->villa_pos3();
		$data['pos4']    		    = $this->Muser->villa_pos4();
		
		$data['jml1']    		    = $this->Muser->jml_villa_pos1();
		$data['jml2']    		    = $this->Muser->jml_villa_pos2();
		$data['jml3']    		    = $this->Muser->jml_villa_pos3();
		$data['jml4']    		    = $this->Muser->jml_villa_pos4();
		
        $data['konten_template']    =  'villa';
        $this->load->view('view_template_user',$data); 
    }

    public function checkout2()
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

      $this->load->view('checkout',$data);
    }
 
   public function transaksi(){
    $idvilla = $_POST['id_villa'];
    $awal = $_POST['cek_awal'];
    $akhir = $_POST['cek_akhir'];

    $data = $this->Muser->cek($awal, $akhir, $idvilla);

    if($data){
    echo "<script>
alert('Villa tidak tersedia , silahkan cari tanggal yang lain');
window.location.href='/index.php/front/detail_villa/$idvilla';
</script>";
    }
    else{

    $this->load->library('ciqrcode'); //pemanggilan library QR CODE
        $kode_transaksi = 'TR_'.date('his');
        
        $config['cacheable']    = true; //boolean, the default is true
        $config['cachedir']     = './assets/'; //string, the default is application/cache/
        $config['errorlog']     = './assets/'; //string, the default is application/logs/
        $config['imagedir']     = './assets/qrcode/'; //direktori penyimpanan qr code
        $config['quality']      = true; //boolean, the default is true
        $config['size']         = '1024'; //interger, the default is 1024
        $config['black']        = array(224,255,255); // array, default is array(255,255,255)
        $config['white']        = array(70,130,180); // array, default is array(0,0,0)
        $this->ciqrcode->initialize($config);
 
        $image_name=$kode_transaksi.'.png'; //buat name dari qr code sesuai dengan nim
 
        $params['data'] = $kode_transaksi; //data yang akan di jadikan QR CODE
        $params['level'] = 'H'; //H=High
        $params['size'] = 10;
        $params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
        $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE

    
    $waktu_sekarang =  date('Y/m/d H:i:s');
        $waktu_limit    =  date('Y-m-d H:i:s', strtotime('3 hour'));;
    
        $data = array(
            'kode_transaksi'=> $kode_transaksi,
            'id_villa'      => $this->input->post('id_villa'),
            'nama_penyewa'  => $this->input->post('nama'),
      'email'         => $this->input->post('email'),
            'no_telp'       => $this->input->post('no_hp'),
            'alamat'        => $this->input->post('alamat'),
            'tgl_start'     => $this->input->post('cek_awal'),
            'tgl_end'       => $this->input->post('cek_akhir'),
            'total_harga'   => $this->input->post('total'),
            'qrcode'        => $image_name

        );
    
    $data2 = array(
      'id'=>'',
      'kode_transaksi'=> $kode_transaksi,
      'mulai'=>$waktu_sekarang,
      'selesai'=>$waktu_limit
    );
    
            $this->Muser->proses_transaksi($data);
            $this->Muser->proses_transaksi2($data2);
            redirect('front/checkout2/'.$kode_transaksi);  
    
    }
        
    }

    public function detail_villa($id_villa) 
    {     $data['tgl']            = date('l');
          $row = $this->Muser->get_villa($id_villa);
		  $data['gambarvilla'] = $this->Muser->gambarvilla($id_villa);		  
          $data['id_villa']             = $row->id_villa;
          $data['nama_villa']           = $row->nama_villa;       
          $data['harga_weekday']          = $row->harga_weekday;
          $data['harga_weekend']          = $row->harga_weekend;
          $data['diskon']          = $row->diskon;
		  $data['harga_frontend_wd']          = $row->harga_frontend_wd;
          $data['harga_frontend_wk']          = $row->harga_frontend_wk;
          $data['deskripsi_detail']    	= $row->deskripsi_detail;
          $data['kamar']    	= $row->kamar;
          $data['toilet']    	= $row->toilet;
          $data['garasi']    	= $row->garasi;
		  
          $data['transaksi'] = $this->Muser->cek_transaksi($id_villa);
   
          $data['villa']              = $this->Muser->related_villa();
          $data['konten_template']    =  'detail_villa';
          $this->load->view('view_template_user',$data); 

    }
	
	public function cek(){
		$output = array('error' => false);
		$idvilla = $_POST['idvilla'];
		$awal = $_POST['cek1'];
		$akhir = $_POST['cek2'];

		$data = $this->Muser->cek($awal, $akhir, $idvilla);

		if($data){
			$output['error'] = true;
			$output['message'] = 'Villa tidak tersedia , silahkan cari tanggal yang lain';
		}
		else{
			$output['success'] = true;
			$output['message'] = 'Mantap,  Villa tersedia pada tanggal yang kamu pilih';
		}

		echo json_encode($output); 
	}

    
    public function kirim() 
    {
          $data['konten_template']    =  'kirim';
          $this->load->view('view_template_user',$data); 

    }

    public function hasil() 
    {
          $data['cari'] = $this->Muser->cariTransaksi();
          $data['konten_template']    =  'hasil';
          $this->load->view('view_template_user',$data); 
    }

    public function tentang() 
    {
          $data['konten_template']    =  'tentang';
          $this->load->view('view_template_user',$data); 
    }

    public function kontak() 
    {
          $data['konten_template']    =  'kontak';
          $this->load->view('view_template_user',$data); 
    }

   
    public function update_bukti()
    {
      $kode_transaksi2 = $this->input->post('kode_transaksi');
         //$this->session->set_flashdata('msg','<div class="alert alert-success" role="alert"> Data berhasil di update.</div>');
         $config['upload_path']      = './assets/frontend/bukti/';
         $config['allowed_types']    = 'gif|jpg|jpeg|png|pdf|oxps|xps';
         $config['max_size']         = '0';
         $config['max_width']        = '0';
         $config['max_height']       = '0';       
             
             $this->upload->initialize($config);
             if(!$this->upload->do_upload('bukti_pembayaran')){
                 $gambar="";

                 $error = $this->upload->display_errors();
             }else{
                 $gambar=$this->upload->file_name;
             }
                $param=array(

                    'bukti_pembayaran'   => $gambar,
                    'status'             => $this->input->post('status')
                );

                $proses = $this->Muser->update_data($param,$kode_transaksi2);
				
               echo "<script>
alert('Bukti Pembayaran Anda Telah Terkirim, Silahkan Tunggu Konfirmasi dari Admin. Terima Kasih');
window.location.href='/';
</script>";
    }
	
	public function detail_villa2($id_villa) 
    {  
        $data['awal'] = $this->input->post('cek_awal');
        $data['akhir'] = $this->input->post('cek_akhir');

       $data['tgl']            = date('l');
          $row = $this->Muser->get_villa($id_villa);
      $data['gambarvilla'] = $this->Muser->gambarvilla($id_villa);      
          $data['id_villa']             = $row->id_villa;
          $data['nama_villa']           = $row->nama_villa;       
          $data['harga_weekday']          = $row->harga_weekday;
          $data['harga_weekend']          = $row->harga_weekend;
          $data['diskon']          = $row->diskon;
      $data['harga_frontend_wd']          = $row->harga_frontend_wd;
          $data['harga_frontend_wk']          = $row->harga_frontend_wk;
          $data['deskripsi_detail']     = $row->deskripsi_detail;
          $data['kamar']      = $row->kamar;
          $data['toilet']     = $row->toilet;
          $data['garasi']     = $row->garasi;
      
          $data['transaksi'] = $this->Muser->cek_transaksi($id_villa);
   
          $data['villa']              = $this->Muser->related_villa();
          $data['konten_template']    =  'detail_villa2';
          $this->load->view('view_template_user',$data); 

    }
}
    
  

    

