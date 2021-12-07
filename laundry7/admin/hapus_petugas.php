<?php

require '../conn.php';

$id = $_GET['id'];
$hps = mysqli_query($conn, "DELETE FROM user WHERE id_user = '$id'");

if($hps) {
    echo "<script language='javascript'>(window.alert('Data Petugas Berhasil Dihapus'))</script>";
	echo "<script>location='petugas.php';</script>";
} else {
    echo "<script language='javascript'>(window.alert('Data Petugas Sedang Digunakan'))</script>";
	echo "<script>location='petugas.php';</script>";
}

?>