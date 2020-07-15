<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_manage_type extends CI_Model {
	function __construct(){
		parent::__construct();
	}


// ------------------------------------------------------------------------------------------------------------------------
// =================  FUNGSI TAMPIL DATA =========================
// ------------------------------------------------------------------------------------------------------------------------
	
		function tampil_data_type(){  
			$sql = "SELECT * from tb_type";
            $query = $this->db->query($sql);
            return $query->result();
		}
// =========================================================================================
//--------------------------------------Deleta data-----------------------------------------
//===========================================================================================
	
	function delete_data_type($kode) { 
			$this->db->where('id_type', $kode);
			$this->db->delete('tb_type');
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
        $this->db->insert('tb_type', $data);
    }
			
// ------------------------------------------------------------------------------------------------------------------------
//		=================  FUNGSI GET DATA $id =========================
// ------------------------------------------------------------------------------------------------------------------------
		

	function get_data_type($kode) { 
			$this->db->where('id_type', $kode);
			$query = $this->db->get('tb_type');
			if($query->num_rows() > 0) {
				return $query->row();
			} else {
				return null;
			}
	}
	
	
		function getById_type($id) {
			return $this->db->get_where('tb_type', array('id_type' => $id))->row();
		}
		
		//////////////////////////////////////////////////////////////
		
		
	function update_type($id,$data) {		 
        $this->db->where('id_type',$id);
        $this->db->update('tb_type',$data);
    }	
   
}