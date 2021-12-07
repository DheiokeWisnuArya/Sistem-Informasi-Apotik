<?php

$title = "Data Produk / Service";
include 'layout/sidebar.php';


$show = mysqli_query($conn, "SELECT * FROM service");
// $show2 = mysqli_query($conn, "SELECT * FROM kategoripaket");
?>

<div class="info2">
  <h2 class="" style="padding-bottom: 15px; border-bottom: 1px solid #d2d2d2; margin-bottom: 20px;" >Produk / Service</h2>
  <a href="tambah_service.php" class="btn btn-primary" style="margin-bottom: 15px !important"><span class="fas fa-fw fa-plus"></span> Produk / Service</a>
  <table class="content-table" id="datatables" style="width: 100%;">
    <thead>
     <tr style="text-align: center;">
        <td>No</td>
        <td>Produk</td>
        <td>Deskripsi</td>
        <td>Satuan</td>
        <td>Harga</td>
        <td width="25%">Aksi</td>
    </tr>
</thead>
<tbody>
  <?php $no = 1;
  while($s = mysqli_fetch_array($show)) {
     ?>
     <tr>
        <td><?= $no++; ?></td>
        <td><?= $s['nama']; ?></td>
        <td><?= $s['deks']; ?></td>
        <td><?= $s['satuan']; ?></td>
        <td>Rp. <?= $s['harga']; ?></td>
        <td>
            <a title="Ubah" href="edit_service.php?id=<?= $s['id_service']; ?>" class="btn btn-warning"><span class="fas fa-fw fa-pen"></span> Edit</a> 
            <a title="Hapus" href="hapus_service.php?id=<?= $s['id_service']; ?>" onclick="return confirm('Yakin ingin Menghapus Produk / Service Dengan Nama : \n<?php echo $s['nama'];?>');" class="btn btn-danger"><span class="fas fa-fw fa-trash"></span> Hapus</a>
        </td>
    </tr>
    <?php
}
?>
</tbody>
</table>
</div>

<?php include 'layout/script.php' ?>