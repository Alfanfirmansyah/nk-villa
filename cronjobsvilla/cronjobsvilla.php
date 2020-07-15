<?php
include 'koneksi.php';
mysqli_query($koneksi,"DELETE tb_transaksi FROM tb_transaksi JOIN tb_status ON tb_transaksi.kode_transaksi=tb_status.kode_transaksi where status='' AND TIMESTAMPDIFF(MINUTE, tb_status.mulai, NOW())>=180");
?>