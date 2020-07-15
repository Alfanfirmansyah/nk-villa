<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_manage_frontend extends CI_Model {
	function __construct(){
		parent::__construct();
	}


// ------------------------------------------------------------------------------------------------------------------------
// =================  FUNGSI TAMPIL DATA =========================
// ------------------------------------------------------------------------------------------------------------------------
	
		function tampil_data_home(){  
			$sql = "SELECT * from tb_home";
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
        $this->db->insert('tb_home', $data);
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
	
	
		function getById_home($id) {
			return $this->db->get_where('tb_home', array('id' => $id))->row();
		}
		
		//////////////////////////////////////////////////////////////
		
		
	function update_home($id,$data) {		 
        $this->db->where('id',$id);
        $this->db->update('tb_home',$data);
    }	
   
}