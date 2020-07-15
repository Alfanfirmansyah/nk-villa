<?php 
$koneksi = mysqli_connect("localhost","nkvillar_admin","gbkarya2019","nkvillar_villa");
 
// Check connection
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
 
?>