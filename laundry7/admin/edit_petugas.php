<?php

$title = "Edit Petugas";
include 'layout/sidebar.php';

$id = $_GET['id'];
$sho = mysqli_query($conn, "SELECT * FROM user WHERE id_user = '$id'");
$show = mysqli_fetch_array($sho);

if(isset($_POST['add'])) {
    $nama = $_POST['nama'];
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $nohp = $_POST['nohp'];
    $role = $_POST['role'];

    $sql = mysqli_query($conn, "UPDATE user SET nama_user = '$nama', username = '$user', password = '$pass', no_hp = '$nohp', role = '$role' WHERE id_user = '$id'");
    if($sql) {
        echo "<script language='javascript'>(window.alert('Data Petugas Berhasil Diubah'))</script>";
        echo "<script>location='petugas.php';</script>";
    } else {
        echo "<script language='javascript'>(window.alert('Data Petugas Gagal Diubah'))</script>";
        echo "<script>location='edit_petugas.php?id=$id';</script>";
    }
}

?>

<div class="info">
  <form method="POST" action="">
    <h2 class="" style="padding-bottom: 15px; border-bottom: 1px solid #d2d2d2; margin-bottom: 20px;" >Edit Petugas</h2>
    <div  class="form-group">
      <label>Nama :</label>
      <input required="required" type="text" name="nama" class="form-control form-control-user" placeholder="Nama" autocomplete="off" value="<?= $show['nama_user']; ?>">
  </div>
  <div  class="form-group">
      <label>Username :</label>
      <input required="required" type="text" name="user" class="form-control form-control-user" placeholder="Username" autocomplete="off" value="<?= $show['username']; ?>">
  </div> 
  <div  class="form-group">
      <label>Password :</label>
      <input required="required" type="password" name="pass" class="form-control form-control-user" placeholder="Password" value="<?= $show['password']; ?>">
  </div>
  <div  class="form-group">
      <label>No. Hp :</label>
      <input required="required" type="number" name="nohp" class="form-control form-control-user" placeholder="No. Handphone" autocomplete="off" value="<?= $show['no_hp']; ?>">
  </div>

  <div class="form-group">
      <label>Role :</label>
      <select required="required" name="role" class="form-control form-control-user" id="exampleInputPassword" placeholder="Level" value="<?= $show['jenis_kelamin']; ?>">
        <option value="owner"<?php if($show["role"] == 'owner') echo "selected";?>>Owner</option>
        <option value="kasir"<?php if($show["role"] == 'kasir') echo "selected";?>>Kasir</option>
    </select>
</div>

<div class="right">
  <a href="petugas.php" class="btn btn-warning">Kembali</a>
  <input type="submit" name="add" value="Edit Petugas" class="btn btn-primary">
</div>

</form>
</div>

<?php include 'layout/script.php' ?>