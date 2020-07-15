<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Muser extends CI_Model
{
    function update_data($param,$kode_transaksi2)
    {
        $this->db->where('kode_transaksi',$kode_transaksi2);
        $this->db->update('tb_transaksi',$param);
        if($this->db->affected_rows()>0)
        {
            return true;
        }
        else
        {
            return false;
        }

    }
    
    function cariTransaksi()
    {
        $cari = $this->input->GET('cari',TRUE);
        $data = $this->db->query("select *from tb_transaksi inner join tb_villa on
        tb_transaksi.id_villa = tb_villa.id_villa inner join tb_type on tb_villa.id_type = 
        tb_type.id_type WHERE kode_transaksi ='$cari'");
        return $data->result();
    }


    function get_row_transaksi($kode_transaksi)
    {
        $sql = "select * from tb_transaksi left join tb_villa on tb_transaksi.id_villa = tb_villa.id_villa
        left join tb_type on tb_villa.id_type = tb_type.id_type where tb_transaksi.kode_transaksi='$kode_transaksi'";
        $tampil = $this->db->query($sql);
        return $tampil->row();
        
    }
function get_row_transaksi2($kode_transaksi)
    {
        $this->db->select('*');    
        $this->db->from('tb_status');
        $this->db->join('tb_transaksi', 'tb_transaksi.kode_transaksi = tb_status.kode_transaksi');
        $this->db->where('tb_status.kode_transaksi', $kode_transaksi);
        $query  = $this->db->get(); 
        return $query->row();
        
    }
       
    //search
    function search($keyword)
    {
        $this->db->like('kode_transaksi',$keyword);
        $query  =   $this->db->get('tb_transaksi');
        return $query->result();
    }

    //detail villa
    function get_villa($id_villa)
    {
        $this->db->select('*');    
        $this->db->from('tb_villa');
        $this->db->join('tb_type', 'tb_villa.id_type = tb_type.id_type','left');
        $this->db->where('id_villa', $id_villa);
        $query  = $this->db->get();
        return $query->row();
    }
	
    //related villa
    function related_villa()
    {
        $sql = "select tb_villa.*,tb_imgvilla.*,tb_transaksi.status,tb_type.url,tb_type.location from tb_villa join tb_type on tb_villa.id_type = tb_type.id_type
									   join tb_imgvilla on tb_villa.id_villa = tb_imgvilla.id_villa
									   left join tb_transaksi on tb_villa.id_villa = tb_transaksi.id_villa 									   
									   group by tb_villa.id_villa
									   limit 3";
        $query = $this->db->query($sql);
        return $query->result();
    }

	function villa_all()
    {
        $sql = "SELECT a.id_type as type,a.*, b.*,c.gambar FROM tb_type a left join tb_villa b on b.id_type = a.id_type
				left JOIN tb_imgvilla c on b.id_villa = c.id_villa
				group by a.id_type";
        $query = $this->db->query($sql);
        return $query->result();
    }
	
	
	function kategori()
    {
        $sql = "select * from tb_type";
        $query = $this->db->query($sql);
        return $query->result();
    }
	
	public function cek($awal, $akhir ,$idvilla){
			$sql = "SELECT * FROM tb_transaksi WHERE id_villa = $idvilla and ((tgl_start ='$awal' or ('$awal' > tgl_start and '$awal' < tgl_end)) and (tgl_start !='$akhir' or ('$akhir' > tgl_start and '$akhir' < tgl_end))or '$akhir' = tgl_end);";
			$query = $this->db->query($sql);
			return $query->row_array();
	}
	public function cek_transaksi($id_villa){
		$sql = "SELECT a.* from tb_transaksi a join tb_villa b on a.id_villa = b.id_villa where a.id_villa ='$id_villa' order by a.tgl_start asc";
        $query = $this->db->query($sql);
        return $query->result();
	}
	
	function jml_villa_pos1()
    {
        $sql = "select count(*)as jumlah from tb_villa where id_type = 19 and status_villa='open'";
        $query = $this->db->query($sql);
        return $query->row();
    }
	function jml_villa_pos2()
    {
        $sql = "select count(*)as jumlah from tb_villa where id_type = 20 and status_villa='open'";
        $query = $this->db->query($sql);
        return $query->row();
    }
	function jml_villa_pos3()
    {
        $sql = "select count(*)as jumlah from tb_villa where id_type = 21 and status_villa='open'";
        $query = $this->db->query($sql);
        return $query->row();
    }
	function jml_villa_pos4()
    {
        $sql = "select count(*)as jumlah from tb_villa where id_type = 22 and status_villa='open'";
        $query = $this->db->query($sql);
        return $query->row();
    }
	
	function villa_pos1()
    {
        $sql = "select tb_villa.*,tb_imgvilla.*,tb_type.url,tb_type.location from tb_villa join tb_type on tb_villa.id_type = tb_type.id_type
									   join tb_imgvilla on tb_villa.id_villa = tb_imgvilla.id_villa
									   where tb_villa.id_type = 19
                                       group by tb_villa.id_villa";
        $query = $this->db->query($sql);
        return $query->result();
    }
	
	function villa_pos2()
    {
        $sql = "select tb_villa.*,tb_imgvilla.*,tb_type.url,tb_type.location from tb_villa join tb_type on tb_villa.id_type = tb_type.id_type
									   join tb_imgvilla on tb_villa.id_villa = tb_imgvilla.id_villa
									   where tb_villa.id_type = 20
                                       group by tb_villa.id_villa";
        $query = $this->db->query($sql);
        return $query->result();
    }
	function villa_pos3()
    {
        $sql = "select tb_villa.*,tb_imgvilla.*,tb_type.url,tb_type.location from tb_villa join tb_type on tb_villa.id_type = tb_type.id_type
									   join tb_imgvilla on tb_villa.id_villa = tb_imgvilla.id_villa
									   where tb_villa.id_type = 21
                                       group by tb_villa.id_villa";
        $query = $this->db->query($sql);
        return $query->result();
    }
	function villa_pos4()
    {
        $sql = "select tb_villa.*,tb_imgvilla.*,tb_type.url,tb_type.location from tb_villa join tb_type on tb_villa.id_type = tb_type.id_type
									   join tb_imgvilla on tb_villa.id_villa = tb_imgvilla.id_villa
									   where tb_villa.id_type = 22
                                       group by tb_villa.id_villa";
        $query = $this->db->query($sql);
        return $query->result();
    }
	
	function gambarvilla($id_villa)
    {
        $sql = "select a.*, b.* from tb_villa a join tb_imgvilla b on a.id_villa = b.id_villa
				where a.id_villa=$id_villa";
        $query = $this->db->query($sql);
        return $query->result();
    }
	
  
	function proses_transaksi($data){
			$this->db->insert('tb_transaksi',$data);
	}
	function proses_transaksi2($data){
			$this->db->insert('tb_status',$data);
	}
	function title(){
		$sql = "SELECT * from tb_home";
        $query = $this->db->query($sql);
        return $query->row();
	}
}