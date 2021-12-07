<?php

$title = "Tambah Produk / Service";
include("layout/sidebar.php");

$show = mysqli_query($conn, "SELECT * FROM service ");

if (isset($_POST['add'])) {
  $nama = $_POST['nama'];
  $deks = $_POST['deks'];
  $satuan = $_POST['satuan'];
  $harga = $_POST['harga'];

  $sql = mysqli_query($conn, "INSERT INTO service VALUES('','$nama', '$deks', '$satuan','$harga')");
  if ($sql) {
    echo "<script language='javascript'>(window.alert('Data Produk / Service Berhasil Ditambahkan'))</script>";
    echo "<script>location='service.php';</script>";
  } else {
    echo "<script language='javascript'>(window.alert('Data Produk / Service Gagal Ditambahkan'))</script>";
    echo "<script>location='tambah_service.php';</script>";
  }
}

?>

<div class="info">
  <form method="POST" action="">
    <h2 class="" style="padding-bottom: 15px; border-bottom: 1px solid #d2d2d2; margin-bottom: 20px;">Tambah Produk / Service</h2>
    <div class="form-group">
      <label>Nama Produk / Service</label>
      <input required="required" type="text" name="nama" class="form-control form-control-user" autocomplete="off">
    </div>
    <div class="form-group">
      <label>Deskripsi</label><br>
      <!-- <input type="text" name="deks" required="required" class="form-control form-control-user" autocomplete="off"> -->
      <textarea name="deks" id="deks" cols="70" rows="2"></textarea>
    </div>
    <div class="form-group">
      <label>Satuan</label>
      <select required="required" name="satuan" class="form-control form-control-user">
        <option value="Kg">Kilogram</option>
        <option value="Pcs">Pcs</option>
        <option value="Bed">Bed</option>
      </select>
    </div>
    <div class="form-group">
      <label>Harga</label>
      <input required="required" type="number" name="harga" class="form-control form-control-user" autocomplete="off">
    </div>

    <div class="right">
      <a href="service.php" class="btn btn-warning">Kembali</a>
      <input type="submit" name="add" value="Tambah Produk / Service" class="btn btn-primary">
    </div>

  </form>
</div>


<?php include 'layout/script.php' ?>