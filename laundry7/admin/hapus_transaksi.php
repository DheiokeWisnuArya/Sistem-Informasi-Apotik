<?php

require '../conn.php';

$id = $_GET['id'];
$hps = mysqli_query($conn, "DELETE FROM transaksi WHERE kode_transaksi = '$id'"); 

if($hps) {
	echo "<script language='javascript'>(window.alert('Data Transaksi Berhasil Dihapus'))</script>";
	echo "<script>location='transaksi.php';</script>";
} else {
	echo "<script language='javascript'>(window.alert('Data Transaksi Sedang Digunakan'))</script>";
	echo "<script>location='transaksi.php';</script>";
}

?>