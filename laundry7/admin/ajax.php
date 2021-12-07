<?php

require '../conn.php';
$id = $_POST['id'];
$sql = mysqli_query($conn, "SELECT * FROM service WHERE id_service = '$id'");
$row = mysqli_fetch_array($sql);

$arr = array('harga' => $row['harga']);

echo json_encode($arr);

?>