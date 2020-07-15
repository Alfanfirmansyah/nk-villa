<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Dashboard extends CI_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_dashboard');
	    	$this->load->model('M_template');
			$this->load->library('pdf');
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
			else if ($id_user && $status=='owner'){
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
			$data['tampil_nama_user'] = $this->M_template->tampil_pengguna_owner($username);
			$data['konten_template']    =  'owner';
			$this->load->view('view_owner_template',$data);
			}
			
		  else{
		  
		  }
		}
		
		 
	}
	
	function show_data_villa(){
		$tgl = date('Y-m-d');
		$data['data'] = $this->M_dashboard->get_data_villa();
		$data['sewa'] = $this->M_dashboard->get_data_sewa($tgl);
		$data['villa'] = $this->M_dashboard->get_datasewa($tgl);
		$this->load->view('skpd_villa',$data);
	}
	
	function cetak($key){
		$tglID = $this->input->post('tgl');
		$tglc = substr($tglID,5,2);
		$tahun = substr($tglID,0,4);
		$pdf = new FPDF('l','mm','A4');
        $pdf->AddPage('L');
        $pdf->SetFont('Arial','B',12);
		$query = $this->db->query("SELECT a.*,b.*,c.* from tb_transaksi a join tb_villa b on a.id_villa = b.id_villa join tb_type c on b.id_type = c.id_type where substr(a.tgl_start,1,7)='$tglID' and status='selesai' and b.id_user='$key'
									GROUP BY a.kode_transaksi");
		$data = $query->result();
		
		$query = $this->db->query("SELECT SUM(a.total_harga)as total from tb_transaksi a join tb_villa b on a.id_villa=b.id_villa WHERE substr(a.tgl_start,1,7)='$tglID'and a.status='selesai' and b.id_user='$key'");
		$data2 = $query->result();
		
		$pdf->Cell(0,7,'',0,1,'C');
		$pdf->Cell(0,7,'LAPORAN TRANSAKSI NK-Villa',0,1,'C');
        $pdf->SetFont('Arial','B',11);
		$pdf->Cell(0,1,' ',0,1,'');
		 if ($tglc == '01') {
			 $tglc = ' JANUARI';
		 } else if ($tglc == '02') {
			 $tglc = ' FEBRUARI';
		 } else if ($tglc == '03'){
			 $tglc = ' MARET';
		 } else if ($tglc == '04'){
			 $tglc = ' APRIL';
		 } else if ($tglc == '05'){
			 $tglc = ' MEI';
		 } else if ($tglc == '06'){
			 $tglc = ' JUNI';
		 } else if ($tglc == '07'){
			 $tglc = ' JULI';
	     } else if ($tglc == '08'){
			 $tglc = ' AGUSTUS';
		 } else if ($tglc == '09'){
			 $tglc = ' SEPTEMBER';
		 } else if ($tglc == '10'){
			 $tglc = ' OKTOBER';
		 } else if ($tglc == '11'){
			 $tglc = ' NOVEMBER';
		 } else {
			 $tglc = ' DESEMBER';
		 }
        $pdf->Cell(0,6,'BULAN'.$tglc.' '.$tahun,0,1,'C');
		$pdf->Cell(0,7,' ',0,1,'');
		$pdf->Cell(3,5,' ',0,0);
		$pdf->Cell(10,5,' No',1,0);
		$pdf->Cell(31,5,'Kode Transaksi',1,0);
		$pdf->Cell(31,5,'         Villa',1,0);
		$pdf->Cell(50,5,'         Type',1,0);
		$pdf->Cell(36,5,'   Nama Penyewa',1,0);
		$pdf->Cell(24,5,'      Start',1,0);
		$pdf->Cell(24,5,'      End',1,0);
		$pdf->Cell(24,5,'     Status',1,0);
		$pdf->Cell(40,5,'            Harga',1,0);
        $pdf->SetFont('Arial','',11);
		$no=1;
		foreach ($data as $row){
			$pdf->Cell(0,5,' ',0,1,'');
			$pdf->Cell(3,5,' ',0,0);	
			$pdf->Cell(10,5,'   '.$no++,1,0);
			$pdf->Cell(31,5,'   '.$row->kode_transaksi,1,0);
			$pdf->Cell(31,5,''.$row->nama_villa,1,0);
			$pdf->Cell(50,5,''.$row->nama_type,1,0);
			$pdf->Cell(36,5,' '.$row->nama_penyewa,1,0);
			$pdf->Cell(24,5,''.$row->tgl_start,1,0);
			$pdf->Cell(24,5,''.$row->tgl_end,1,0);
			$pdf->Cell(24,5,'    '.$row->status,1,0);
			$pdf->Cell(40,5,'       Rp.'.number_format($row->total_harga,0),1,0);
			
		}
		$pdf->SetFont('Arial','',11);
		$pdf->Cell(0,2,'',0,1,'C');
		foreach ($data2 as $row){
		$pdf->Cell(0,20,'                                                                                                                                                                    Pemasukan bulan ini sebesar Rp.'.number_format($row->total,0),0,1);
		}
        $pdf->Output();
	}
	
}