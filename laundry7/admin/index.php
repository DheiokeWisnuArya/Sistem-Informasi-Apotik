<?php 

$title = "Laundry - Kel 7";
include("layout/sidebar.php");

?>

<?php
$member = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM member "));
$petugas = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM user "));
$transaksilunas = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM transaksi WHERE status_pembayaran='Lunas'"));
$transaksibelumlunas = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM transaksi WHERE status_pembayaran='Belum Lunas'"));
if(empty($jumlah)){
  error_reporting(0);
}
?>

<div class="info" style="margin-top: 70px; text-align: center;">
  <span style="text-transform: uppercase; color: #717171 !important; font-size: 30px;"><b>Dashboard Laundry</b></span>
  <br>
  <span style="text-transform: uppercase; color: #717171 !important; font-size: 30px;"><b>Selamat Datang <?= $_SESSION['nama_user'];?></b></span>
</div>

<div class="col-xl-6 col-md-6 mb-4">
  <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-md-11">
          <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Member</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $member;?></div>
        </div>
        <div class="col-md-1">
          <i class="fas fa-users fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="col-xl-6 col-md-6 mb-4">
  <div class="card2">
    <div class="card-body">
      <div class="row">
        <div class="col-md-11">
          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Pembayaran Belum Lunas</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $transaksibelumlunas;?></div>
        </div>
        <div class="col-md-1">
          <i class="fas fa-calendar fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="col-xl-6 col-md-6 mb-4">
  <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-md-11">
          <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Petugas</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $petugas;?></div>
        </div>
        <div class="col-md-1">
          <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="col-xl-6 col-md-6 mb-4">
  <div class="card2">
    <div class="card-body">
      <div class="row">
        <div class="col-md-11">
          <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Pembayaran Lunas</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $transaksilunas;?></div>
        </div>
        <div class="col-md-1">
          <i class="fas fa-check fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>



<?php include 'layout/script.php' ?>