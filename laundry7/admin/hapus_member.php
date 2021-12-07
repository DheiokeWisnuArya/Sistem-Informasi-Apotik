<?php

require '../conn.php';

$id = $_GET['id'];
$hps = mysqli_query($conn, "DELETE FROM member WHERE id_member = '$id'");

if($hps) {
    echo "<script language='javascript'>(window.alert('Data Member Berhasil Dihapus'))</script>";
	echo "<script>location='member.php';</script>";
} else {
    echo "<script language='javascript'>(window.alert('Data Member Sedang Digunakan'))</script>";
	echo "<script>location='member.php';</script>";
}

?>