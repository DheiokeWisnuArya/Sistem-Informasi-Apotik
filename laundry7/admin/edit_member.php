<?php

$title = "Edit Member";
include ("layout/sidebar.php");

$id = $_GET['id'];
$sho = mysqli_query($conn, "SELECT * FROM member WHERE id_member = '$id'");
$show = mysqli_fetch_array($sho);

if(isset($_POST['add'])) {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jenkel = $_POST['jenkel'];
    $nohp = $_POST['nohp'];

    $sql = mysqli_query($conn, "UPDATE member SET nama_member = '$nama', alamat = '$alamat', no_telp = '$nohp', jenis_kelamin = '$jenkel' WHERE id_member = '$id' ");
    // var_dump($jenkel);
    // exit();
    if($sql) {
        echo "<script language='javascript'>(window.alert('Data Member Berhasil Diubah'))</script>";
        echo "<script>location='member.php';</script>";
    } else {
        echo "<script language='javascript'>(window.alert('Data Member Gagal Diubah'))</script>";
        echo "<script>location='edit_member.php?id=$id';</script>";
    }
}

?>

<div class="info">
  <form method="POST" action="">
    <h2 class="" style="padding-bottom: 15px; border-bottom: 1px solid #d2d2d2; margin-bottom: 20px;" >Edit Member</h2>

    <div  class="form-group">
      <label>Nama Member :</label>
      <input required="required" type="text" name="nama" class="form-control form-control-user" placeholder="Nama Member" value="<?= $show['nama_member']; ?>">
  </div>
  <div  class="form-group">
      <label>Alamat :</label>
      <textarea required="required" type="text" name="alamat" class="form-control form-control-user" placeholder="Alamat"><?= $show['alamat']; ?></textarea>
  </div>
  <div  class="form-group">
      <label>No. Hp : </label>
      <input required="required" type="number" name="nohp" class="form-control form-control-user" placeholder="No. Hp" value="<?= $show['no_telp']; ?>">
  </div>
  <div class="form-group">
      <label>Jenis Kelamin :</label>
      <select required="required" name="jenkel" class="form-control form-control-user" placeholder="Level">
        <option value="Laki-Laki"<?php if($show["jenis_kelamin"] == 'Laki-Laki') echo "selected";?>>Laki-Laki</option>
        <option value="Perempuan"<?php if($show["jenis_kelamin"] == 'Perempuan') echo "selected";?>>Perempuan</option>
    </select>
</div>

<div class="right">
    <a href="member.php" class="btn btn-warning">Kembali</a>
    <input type="submit" name="add" value="Edit Member" class="btn btn-primary">
</div>

</form>
</div>

<?php include 'layout/script.php' ?>