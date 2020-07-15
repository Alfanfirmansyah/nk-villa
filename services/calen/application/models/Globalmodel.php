<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Globalmodel extends CI_Model 
{
	public function get_list($idvilla)
	{
		$sql = "Select tb_transaksi.*,concat(nama_penyewa,' ( checkout : ',tgl_start,')') as calen FROM tb_transaksi WHERE id_villa = $idvilla";
            $query = $this->db->query($sql);
            return $query->result();
	}	
	public function get_villa($idvilla)
	{
		$sql = "Select nama_villa from tb_villa where id_villa= '$idvilla'";
            $query = $this->db->query($sql);
            return $query->result();
	}	

	public function insert($table, $param)
	{
		$this->db->insert($table, $param);
		return $this->db->insert_id();
	}

	public function update($table, $set, $where)
	{
		$this->db->where($where);
		$this->db->update($table, $set);
		return $this->db->affected_rows();
	}

	public function delete($table, $where)
	{
		$this->db->where($where);
		$this->db->delete($table);
		return $this->db->affected_rows();
	}

}