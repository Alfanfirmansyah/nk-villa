<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_laporan extends CI_Model {
	function __construct(){
		parent::__construct();
	}


// ------------------------------------------------------------------------------------------------------------------------
// =================  FUNGSI TAMPIL DATA =========================
// ------------------------------------------------------------------------------------------------------------------------
	
		function tampil_data_transaksi(){  
			$sql = "SELECT distinct(substr(tgl_start,1,7))as tanggal from tb_transaksi where status ='selesai';";
            $query = $this->db->query($sql);
            return $query->result();
		}

		function hapus(){

			$this->db->empty_table('tb_transaksi'); 
		}
		
}