<?php

session_start();
date_default_timezone_set('Asia/Makassar');

$conn = mysqli_connect('localhost','root','','laundry7');

// script cek koneksi
if (!$conn) {
    die("Koneksi Tidak Berhasil: " . mysqli_connect_error());
}

function query($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}

function ubah($data) {
	global $conn;
	// ambil data dari tiap elemen dalam form
	$id = $data["id_service"];
	$nama = htmlspecialchars($data["nama"]);
	$deks = htmlspecialchars($data["deks"]);
    $satuan = htmlspecialchars($data["satuan"]);
	$harga = htmlspecialchars($data["harga"]);
	$query = "UPDATE service SET
				nama = '$nama',
				deks = '$deks',
                satuan = '$satuan',
				harga = '$harga'
			WHERE id_service = $id
				";
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}
?>