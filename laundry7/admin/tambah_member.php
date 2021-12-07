<?php

$title = "Tambah Member";
include ("layout/sidebar.php");

$show = mysqli_query($conn, "SELECT * FROM member");

if(isset($_POST['add'])) {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jenkel = $_POST['jenkel'];
    $nohp = $_POST['nohp'];

    $sql = mysqli_query($conn, "INSERT INTO member VALUES('','$nama','$alamat','$nohp','$jenkel')");
    if($sql) {
        echo "<script language='javascript'>(window.alert('Data Member Berhasil Ditambahkan'))</script>";
        echo "<script>location='member.php';</script>";
    } else {
        echo "<script language='javascript'>(window.alert('Data Member Gagal Ditambahkan'))</script>";
        echo "<script>location='tambah_member.php';</script>";
    }
}

?>   

<div class="info">
  <form method="POST" action="">
    <h2 class="" style="padding-bottom: 15px; border-bottom: 1px solid #d2d2d2; margin-bottom: 20px;" >Tambah Member</h2>

    <div  class="form-group">
      <label>Nama Member :</label>
      <input required="required" type="text" name="nama" class="form-control" placeholder="Nama Member" autocomplete="off">
  </div>
  <div  class="form-group">
      <label>Alamat :</label>
      <textarea required="required" type="text" name="alamat" class="form-control form-control-user" placeholder="Alamat" autocomplete="off"></textarea>
  </div>
  <div  class="form-group">
      <label>No. Hp : </label>
      <input required="required" type="number" name="nohp" class="form-control form-control-user" placeholder="No. Hp" autocomplete="off">
  </div>
  <div class="form-group">
      <label>Jenis Kelamin :</label>
      <select required="required" name="jenkel" class="form-control form-control-user" placeholder="Level">
        <option value="Laki-Laki">Laki-Laki</option>
        <option value="Perempuan">Perempuan</option>
    </select>
</div>

<div class="right">
    <a href="member.php" class="btn btn-warning">Kembali</a>
    <input type="submit" name="add" value="Tambah Member" class="btn btn-primary">
</div>

</form>
</div>


<?php include 'layout/script.php' ?>