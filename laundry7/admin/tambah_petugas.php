<?php

$title = "Tambah Petugas";
include 'layout/sidebar.php';

$show = mysqli_query($conn, "SELECT * FROM user");

if(isset($_POST['add'])) {
    $nama = $_POST['nama'];
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $nohp = $_POST['nohp'];
    $role = $_POST['role'];

    $sql = mysqli_query($conn, "INSERT INTO user VALUES('','$nama','$user','$pass','$nohp','$role')");
    if($sql) {
        echo "<script language='javascript'>(window.alert('Data Petugas Berhasil Ditambahkan'))</script>";
        echo "<script>location='petugas.php';</script>";
    } else {
        echo "<script language='javascript'>(window.alert('Data Petugas Gagal Ditambahkan'))</script>";
        echo "<script>location='tambah_petugas.php';</script>";
    }
}

?>

<div class="info">
  <form method="POST" action="">
    <h2 class="" style="padding-bottom: 15px; border-bottom: 1px solid #d2d2d2; margin-bottom: 20px;" >Tambah Petugas</h2>
    <div  class="form-group">
      <label>Nama :</label>
      <input required="required" type="text" name="nama" class="form-control form-control-user" placeholder="Nama" autocomplete="off">
  </div>
  <div  class="form-group">
      <label>Username :</label>
      <input required="required" type="text" name="user" class="form-control form-control-user" placeholder="Username" autocomplete="off">
  </div> 
  <div  class="form-group">
      <label>Password :</label>
      <input required="required" type="password" name="pass" class="form-control form-control-user" placeholder="Password">
  </div>
  <div  class="form-group">
      <label>No. Hp :</label>
      <input required="required" type="number" name="nohp" class="form-control form-control-user" placeholder="No. Handphone" autocomplete="off">
  </div>
  <div class="form-group">
      <label>Role :</label>
      <select required="required" name="role" class="form-control form-control-user" id="exampleInputPassword" placeholder="Level">
       <option value="owner">Owner</option>
       <option value="kasir">Kasir</option>
   </select>
</div>

<div class="right">
  <a href="petugas.php" class="btn btn-warning">Kembali</a>
  <input type="submit" name="add" value="Tambah Petugas" class="btn btn-primary">
</div>

</form>
</div>

<?php include 'layout/script.php' ?>