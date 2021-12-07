<?php

$title = "Data Member";
include ("layout/sidebar.php");

$show = mysqli_query($conn, "SELECT * FROM member");

?>

<div class="info2">
  <h2 class="" style="padding-bottom: 15px; border-bottom: 1px solid #d2d2d2; margin-bottom: 20px;" >Member</h2>
  <a href="tambah_member.php" class="btn btn-primary" style="margin-bottom: 15px !important"><span class="fas fa-fw fa-plus"></span> Member</a>
  <table class="content-table" id="datatables" style="width: 100%;">
    <thead>
     <tr style="text-align: center;">
        <td>No</td>
        <td>Nama</td>
        <td>Alamat</td>
        <td>Jenis Kelamin</td>
        <td>No Hp</td>
        <td width="25%">Aksi</td>
    </tr>
</thead>
<tbody>
  <?php $no = 1;
  while($s = mysqli_fetch_array($show)) {
     ?>
     <tr>
        <td><?= $no++; ?></td>
        <td><?= $s['nama_member']; ?></td>
        <td><?= $s['alamat']; ?></td>
        <td><?= $s['jenis_kelamin']; ?></td>
        <td><?= $s['no_telp']; ?></td>
        <td>
            <a title="Ubah" href="edit_member.php?id=<?= $s['id_member']; ?>" class="btn btn-warning"><span class="fas fa-fw fa-pen"></span> Edit</a> 
            <a title="Hapus" href="hapus_member.php?id=<?= $s['id_member']; ?>" onclick="return confirm('Yakin ingin Menghapus Member Dengan Nama : \n<?php echo $s['nama_member'];?>');" class="btn btn-danger"><span class="fas fa-fw fa-trash"></span> Hapus</a>
        </td>
    </tr>
    <?php
}
?>
</tbody>
</table>
</div>


<?php include 'layout/script.php' ?>