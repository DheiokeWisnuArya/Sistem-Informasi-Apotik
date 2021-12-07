<?php

$title = "Data Petugas";
include 'layout/sidebar.php';

$show = mysqli_query($conn, "SELECT * FROM user");

?>

<div class="info2">
  <h2 class="" style="padding-bottom: 15px; border-bottom: 1px solid #d2d2d2; margin-bottom: 20px;" >Petugas</h2>
  <a href="tambah_petugas.php" class="btn btn-primary" style="margin-bottom: 15px !important"><span class="fas fa-fw fa-plus"></span> Petugas</a>
  <table class="content-table" id="datatables" style="width: 100%;">
    <thead>
        <tr style="text-align: center;">
            <td>No</td>
            <td>Nama</td>
            <td>User</td>
            <td>Password</td>
            <td>No Hp</td>
            <td>Role</td>
            <td width="20%">Aksi</td>
        </tr>
    </thead>
    <tbody>
      <?php $no = 1;
      while($s = mysqli_fetch_array($show)) {
         ?>
         <tr>
            <td><?= $no++; ?></td>
            <td><?= $s['nama_user']; ?></td>
            <td><?= $s['username']; ?></td>
            <td><?= $s['password']; ?></td>
            <td><?= $s['no_hp']; ?></td>
            <td><?= $s['role']; ?></td>
            <td>
             <a title="Ubah" href="edit_petugas.php?id=<?= $s['id_user']; ?>" class="btn btn-warning"><span class="fas fa-fw fa-pen"></span> Edit </a> 
             <a title="Hapus" href="hapus_petugas.php?id=<?= $s['id_user']; ?>" onclick="return confirm('Yakin ingin Menghapus Petugas Dengan Nama : \n<?php echo $s['nama_user'];?>');" class="btn btn-danger"><span class="fas fa-fw fa-trash"></span> Hapus</a>
         </td>
     </tr>
 <?php } ?>
</tbody>
</table>
</div>


<?php include 'layout/script.php' ?>