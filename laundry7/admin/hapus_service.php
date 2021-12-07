<?php

require '../conn.php';

$id = $_GET['id'];
$hps = mysqli_query($conn, "DELETE FROM service WHERE id_service = '$id'");

if($hps) {
    echo "<script language='javascript'>(window.alert('Data Produk / Service Berhasil Dihapus'))</script>";
	echo "<script>location='service.php';</script>";
} else {
    echo "<script language='javascript'>(window.alert('Data Produk / Service Sedang Digunakan'))</script>";
	echo "<script>location='service.php';</script>";
}

?>