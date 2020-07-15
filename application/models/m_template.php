<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_template extends CI_Model {
	function __construct(){
		parent::__construct();
	}
//----------------------------------------------------------------------------------------------------------------------------------------------
	
	
	function tampil_pengguna_owner($username){
		$koneksi =  mysqli_connect("localhost","nkvillar_admin","gbkarya2019","nkvillar_villa");
		$nama;
        $result = mysqli_query($koneksi,"SELECT username,nama FROM tb_user where username='$username'");
			while($row = mysqli_fetch_array($result)){
                $nama=$row['nama'];
			}
		return $nama;
	
	}
	
	function tampil_notif() {
			$sql = "SELECT * FROM tb_transaksi WHERE status = 'Belum terverifikasi' Order by tgl_start ASC";
            $query = $this->db->query($sql);
            return $query->result();
		}
	
	function jml_notif() {
		$koneksi =  mysqli_connect("localhost","nkvillar_admin","gbkarya2019","nkvillar_villa");
		$notif;
        $result = mysqli_query($koneksi,"SELECT COUNT(*)as jumlah FROM tb_transaksi WHERE status = 'Belum terverifikasi'");
			while($row = mysqli_fetch_array($result)){
                $notif=$row['jumlah'];
			}
		return $notif;
		}
	
	
	function tampil_pengguna_admin($username){
		$koneksi =  mysqli_connect("localhost","nkvillar_admin","gbkarya2019","nkvillar_villa");
		$nama;
        $result = mysqli_query($koneksi,"SELECT username FROM tb_user where username='$username'");
			while($row = mysqli_fetch_array($result)){
                $nama=$row['username'];
			}
		return $nama;
	}
	
}