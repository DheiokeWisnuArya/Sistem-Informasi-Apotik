<?php

$title = "Edit Transaksi";
include 'layout/sidebar.php';

$id = $_GET['id'];
$sho = mysqli_query($conn, "SELECT * FROM transaksi WHERE kode_transaksi = '$id'");
$show = mysqli_fetch_array($sho);

if(isset($_POST['add'])) {
    $status_pembayaran = $_POST['pembayaran'];
    $dibayar = $_POST['dibayar'];
    $kembali = $_POST['kembali'];
    $status_pesanan = $_POST['status_pesanan'];
    $tanggal_bayar = date('Y-m-d');

    $sql = mysqli_query($conn, "UPDATE transaksi SET tgl_bayar = '$tanggal_bayar', status_pembayaran = '$status_pembayaran', dibayar = $dibayar, kembali = $kembali, status_pesanan = '$status_pesanan' WHERE kode_transaksi = '$id'");
    if($sql) {
        echo "<script language='javascript'>(window.alert('Data Transaksi Berhasil Diubah'))</script>";
      echo "<script>location='transaksi.php';</script>";
  } else {
    echo 'gagal';
      echo "<script language='javascript'>(window.alert('Data Transaksi Gagal Diubah'))</script>";
      echo "<script>location='edit_transaksi.php?id=$id';</script>";
}
}

?>
<div class="info">
  <form method="POST" action="">
    <h2 class="" style="padding-bottom: 15px; border-bottom: 1px solid #d2d2d2; margin-bottom: 20px;" >Edit Transaksi <?= $show['kode_transaksi'] ?></h2>


    <div class="form-group">
      <label>Nilai Laundry :</label>
      <input type="number" name="nilai_laundry" id="nilai_laundry" value="<?= $show['nilai_laundry'] ?>" class="form-control">
    </div>

    <div class="form-group">
      <label>Dibayar :</label>
      <input type="number" name="dibayar" id="dibayar" value="<?= $show['dibayar'] ?>" class="form-control">
    </div>

    <div class="form-group">
      <label>Kembali :</label>
      <input type="number" name="kembali" id="kembali" readonly value="<?= $show['kembali'] ?>" class="form-control">
    </div>

    <div class="form-group">
      <label>Status Pembayaran :</label>
      <select name="pembayaran" required="required" class="form-control form-control-user" placeholder="Member">
        <option value="lunas"<?php if($show["status_pembayaran"] == 'lunas') echo "selected";?>>Lunas</option>
        <option value="belum lunas"<?php if($show["status_pembayaran"] == 'belum lunas') echo "selected";?>>Belum Lunas</option>
      </select>
    </div>

    <div class="form-group">
      <label>Status Pesanan :</label>
      <select name="status_pesanan" required="required" class="form-control form-control-user" placeholder="Member">
        <option value="selesai"<?php if($show["status_pesanan"] == 'selesai') echo "selected";?>>Selesai</option>
        <option value="diambil"<?php if($show["status_pesanan"] == 'diambil') echo "selected";?>>Diambil</option>
      </select>
    </div>
<div class="right">
  <a href="transaksi.php" class="btn btn-warning" >Kembali</a>
  <input type="submit" name="add" value="Edit Transaksi" class="btn btn-primary">
</div>

</form>
</div>

<?php include 'layout/script.php' ?>

<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
    $(document).ready(function() {
        $('#dibayar').change(function() {
            var dibayar = $(this).val();
            var nilai_laundry = $('#nilai_laundry').val();
            var sum = Math.round(Number(dibayar) - Number(nilai_laundry));
            $('#kembali').val(sum);
        });        		
    })
</script>