<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_manage_transaksi extends CI_Model {
	function __construct(){
		parent::__construct();
	}


// ------------------------------------------------------------------------------------------------------------------------
// =================  FUNGSI TAMPIL DATA =========================
// ------------------------------------------------------------------------------------------------------------------------
	
		function tampil_data_transaksi(){  
			$sql = "SELECT * from tb_transaksi join tb_villa on tb_transaksi.id_villa = tb_villa.id_villa join tb_type on tb_villa.id_type = 
			tb_type.id_type WHERE tb_transaksi.status != 'Selesai' order by tb_transaksi.status ASC";
            $query = $this->db->query($sql);
            return $query->result();
		}
        function tampil_data_villa(){  
            $sql = "SELECT * from tb_villa";
            $query = $this->db->query($sql);
            return $query->result();
        }
		function tampil_data_transaksi_selesai(){  
			$sql = "SELECT * from tb_transaksi join tb_villa on tb_transaksi.id_villa = tb_villa.id_villa join tb_type on tb_villa.id_type = 
			tb_type.id_type WHERE tb_transaksi.status = 'Selesai'";
            $query = $this->db->query($sql);
            return $query->result();
		}


        public function get_list($where)
    {
       $sql = "SELECT * FROM tb_transaksi WHERE id_villa = $where";
            $query = $this->db->query($sql);
            return $query->result();
    }
        
// =========================================================================================
//--------------------------------------Deleta data-----------------------------------------
//===========================================================================================
	
	
	
//-------------------------------------------------------------------------------------------------
//=======================================Tambah data==============================================
//------------------------------------------------------------------------------------------------
	function simpan($data){
        $this->db->insert('tb_type', $data);
    }
			
// ------------------------------------------------------------------------------------------------------------------------
//		=================  FUNGSI GET DATA $id =========================
// ------------------------------------------------------------------------------------------------------------------------
		

	
	
	
		function getById_transaksi($id) {
			$sql = "SELECT * from tb_transaksi join tb_villa on tb_transaksi.id_villa = tb_villa.id_villa join tb_type on tb_villa.id_type = 
			tb_type.id_type where kode_transaksi = '$id' ";
            $query = $this->db->query($sql);
            return $query->row();
		}
		
		//////////////////////////////////////////////////////////////
		
		
	function update_status($id,$data) {		 
        $this->db->where('kode_transaksi',$id);
        $this->db->update('tb_transaksi',$data);
    }
    function update_statusvilla($idvilla,$data2) {		 
        $this->db->where('id_villa',$idvilla);
        $this->db->update('tb_villa',$data2);
    }
		
	function update_pembayaran($id,$data) {		 
        $this->db->where('kode_transaksi',$id);
        $this->db->update('tb_transaksi',$data);
    }

	function update_pelunasan($kodetransaksi,$data) {		 
        $this->db->where('kode_transaksi',$kodetransaksi);
        $this->db->update('tb_transaksi',$data);
    }	
	

    function update_stokkamar($idvilla,$data2) {		 
        $this->db->where('id_villa',$idvilla);
        $this->db->update('tb_villa',$data2);
    }	

    function update_statusselesai($id,$data) {		 
        $this->db->where('kode_transaksi',$id);
        $this->db->update('tb_transaksi',$data);
    }	
    
     function update_statusvillaselesai($idvilla,$data2) {		 
        $this->db->where('id_villa',$idvilla);
        $this->db->update('tb_villa',$data2);
    }	

    function update_stokkamarselesai($idvilla,$data2) {		 
        $this->db->where('id_villa',$idvilla);
        $this->db->update('tb_villa',$data2);
    }	
   
}