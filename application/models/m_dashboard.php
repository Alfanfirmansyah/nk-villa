<?php
class M_dashboard extends CI_Model{
    function __construct(){
        parent::__construct();
    }
	   function jml_villa() {
		$koneksi =  mysqli_connect("localhost","nkvillar_admin","gbkarya2019","nkvillar_villa");
		$notif;
        $result = mysqli_query($koneksi,"SELECT count(*)as jumlah from tb_villa a join tb_type b on a.id_type = b.id_type");
			while($row = mysqli_fetch_array($result)){
                $notif=$row['jumlah'];
			}
		return $notif;
		}
	function jml_villa_tersedia() {
		$koneksi =  mysqli_connect("localhost","nkvillar_admin","gbkarya2019","nkvillar_villa");
		$notif;
        $result = mysqli_query($koneksi,"SELECT count(*)as jumlah from tb_villa a join tb_type b on a.id_type = b.id_type 
            left join tb_transaksi c on a.id_villa = c.id_villa");
			while($row = mysqli_fetch_array($result)){
                $notif=$row['jumlah'];
			}
		return $notif;
		}
	function jml_villa_full() {
		$koneksi =  mysqli_connect("localhost","nkvillar_admin","gbkarya2019","nkvillar_villa");
		$notif;
        $result = mysqli_query($koneksi,"SELECT count(*)as jumlah from tb_villa a join tb_type b on a.id_type = b.id_type 
            left join tb_transaksi c on a.id_villa = c.id_villa");
			while($row = mysqli_fetch_array($result)){
                $notif=$row['jumlah'];
			}
		return $notif;
		}
		
		
	 function jml_villa_owner($key) {
		$koneksi =  mysqli_connect("localhost","nkvillar_admin","gbkarya2019","nkvillar_villa");
		$notif;
        $result = mysqli_query($koneksi,"SELECT count(*)as jumlah from tb_villa a join tb_type b on a.id_type = b.id_type where a.id_user ='$key'");
			while($row = mysqli_fetch_array($result)){
                $notif=$row['jumlah'];
			}
		return $notif;
		}
	
	function villa_owner($key){
		$sql = "select * from tb_villa where id_user='$key'";
        $query = $this->db->query($sql);
        return $query->result();
	}
	
	function villa_owner_sewa($key){
		$sql = "select a.*,b.* from tb_villa a join tb_transaksi b on a.id_villa = b.id_villa where a.id_user='$key'";
        $query = $this->db->query($sql);
        return $query->result();
	}
	
	function jml_list_sewa($key,$tgl)
    {
        $sql = "select count(*)as jumlah from tb_villa a join tb_transaksi b on a.id_villa = b.id_villa 
				where a.id_user = '$key' and (b.tgl_start='$tgl' or b.tgl_end ='$tgl')";
        $query = $this->db->query($sql);
        return $query->row();
    }
	
	function list_sewa($key,$tgl){
		$sql = "select a.*,b.* from tb_villa a join tb_transaksi b on a.id_villa = b.id_villa
				where a.id_user = '$key' and (b.tgl_start='$tgl' or b.tgl_end ='$tgl')";
        $query = $this->db->query($sql);
        return $query->result();
	}
	
	public function get_data_villa(){
		$id = $this->input->post('villa');
	    $sql = "SELECT * FROM tb_transaksi WHERE id_villa ='$id' and (status='Booking' or status='Selesai') order by tgl_start asc";
		$tampil = $this->db->query($sql);
		return $tampil->result();
	}
	
	public function get_data_sewa($tgl){
		$id = $this->input->post('villa');
	    $sql = "SELECT count(*)as jumlah FROM tb_transaksi WHERE id_villa ='$id' and status='Booking' and (tgl_start ='$tgl' or tgl_end ='$tgl')";
		$tampil = $this->db->query($sql);
		return $tampil->row();
	}
	
	public function get_datasewa($tgl){
		$id = $this->input->post('villa');
	    $sql = "SELECT * FROM tb_villa where id_villa ='$id'";
		$tampil = $this->db->query($sql);
		return $tampil->row();
	}
	
	function tampil_data_transaksi($key){  
			$sql = "SELECT distinct(substr(tgl_start,1,7))as tanggal from tb_transaksi join tb_villa on tb_transaksi.id_villa = tb_villa.id_villa where tb_transaksi.status ='selesai' and tb_villa.id_user='$key';";
            $query = $this->db->query($sql);
            return $query->result();
		}
		
	function owner($key){
		$sql = "SELECT * from tb_user where id_user='$key'";
         $query = $this->db->query($sql);
         return $query->row();
	}
 
}
?>