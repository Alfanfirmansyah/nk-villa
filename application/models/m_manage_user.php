<?php
class M_manage_user extends CI_Model{
    function __construct(){
        parent::__construct();
    }

   
	function simpan($data){
        $this->db->insert('tb_user', $data);
    }

    function tampil_data_user(){  
			$sql = "SELECT * from tb_user where status = 'owner' ";
            $query = $this->db->query($sql);
            return $query->result();
		}

		function getById_user($id) {
			return $this->db->get_where('tb_user', array('id_user' => $id))->row();
		}

	function update_user($id,$data) {		 
        $this->db->where('id_user',$id);
        $this->db->update('tb_user',$data);
    }

    function delete_data_user($kode) { 
			$this->db->where('id_user', $kode);
			$this->db->delete('tb_user');
			if($this->db->affected_rows() > 0) {
				return true;
			} else {
				return false;
			}
		}

		function get_data_user($kode) { 
			$this->db->where('id_user', $kode);
			$query = $this->db->get('tb_user');
			if($query->num_rows() > 0) {
				return $query->row();
			} else {
				return null;
			}
	}
		
 
}
?>