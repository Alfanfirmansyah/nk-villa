<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_manage_villa extends CI_Model {
	function __construct(){
		parent::__construct();
	}


// ------------------------------------------------------------------------------------------------------------------------
// =================  FUNGSI TAMPIL DATA =========================
// ------------------------------------------------------------------------------------------------------------------------
	
		function tampil_data_villa(){  
			$sql = "SELECT a.*,b.*,c.id_user,c.nama from tb_type a join tb_villa b on a.id_type = b.id_type join tb_user c on b.id_user = c.id_user";
            $query = $this->db->query($sql);
            return $query->result();
		}
		
		
		function tampil_data_type(){  
			$sql = "SELECT * from tb_type";
            $query = $this->db->query($sql);
            return $query->result();
		}
		
		function tampil_data_user(){  
			$sql = "SELECT * from tb_user WHERE status ='Owner'";
            $query = $this->db->query($sql);
            return $query->result();
		}
		
// =========================================================================================
//--------------------------------------Deleta data-----------------------------------------
//===========================================================================================
	
	function delete_data_villa($kode) { 
			$this->db->where('id_villa', $kode);
			$this->db->delete('tb_villa');
			if($this->db->affected_rows() > 0) {
				return true;
			} else {
				return false;
			}
		}
		
	
//-------------------------------------------------------------------------------------------------
//=======================================Tambah data==============================================
//------------------------------------------------------------------------------------------------
	function simpan($data){
        $this->db->insert('tb_villa', $data);
    }
			
// ------------------------------------------------------------------------------------------------------------------------
//		=================  FUNGSI GET DATA $id =========================
// ------------------------------------------------------------------------------------------------------------------------
		

	function get_data_villa($kode) { 
			$this->db->where('id_villa', $kode);
			$query = $this->db->get('tb_villa');
			if($query->num_rows() > 0) {
				return $query->row();
			} else {
				return null;
			}
	}
	
	
		function getById_villa($id) {
			$sql = "SELECT a.*,b.* from tb_villa a join tb_type b on a.id_type = b.id_type
					WHERE a.id_villa ='$id'";
            $query = $this->db->query($sql);
			return $query->row();
		}
		
	
	function getGambar_villa($id) {
			$sql = "SELECT a.*,b.* from tb_villa a join tb_imgvilla b on a.id_villa = b.id_villa
					WHERE a.id_villa ='$id'";
            $query = $this->db->query($sql);
            return $query->result();
		}
	
	function simpan_gambar($data){
        $this->db->insert('tb_imgvilla', $data);
    }
	
	
	function get_data_gambar($id) { 
			$this->db->where('id_img', $id);
			$query = $this->db->get('tb_imgvilla');
			if($query->num_rows() > 0) {
				return $query->row();
			} else {
				return null;
			}
	}
	
	function delete_data_gambar($id) { 
			$this->db->where('id_img', $id);
			$this->db->delete('tb_imgvilla');
			if($this->db->affected_rows() > 0) {
				return true;
			} else {
				return false;
			}
		}
		
		//////////////////////////////////////////////////////////////
		
		
	function update_villa($id,$data) {		 
        $this->db->where('id_villa',$id);
        $this->db->update('tb_villa',$data);
    }

    function open($idvilla,$data) {		 
        $this->db->where('id_villa',$idvilla);
        $this->db->update('tb_villa',$data);
    }	

    function closevilla($idvilla,$data) {		 
        $this->db->where('id_villa',$idvilla);
        $this->db->update('tb_villa',$data);
    }
   
}