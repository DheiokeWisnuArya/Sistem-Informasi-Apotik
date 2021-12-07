<?php 
require("../conn.php");
  if($_SESSION['status']!='login'){
    header("location: ../index.php");
  }
?>

<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <link rel="icon" type="image/png" href="../assets/photo/icon_laundry.png"> -->

  <title>Admin : <?php echo $title ?></title>

  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="../assets/fontawesome/css/all.css">
  <link rel="stylesheet" href="../assets/datatables/datatables.min.css">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

</head>
<body onload="tampilkanwaktu();setInterval('tampilkanwaktu()', 1000);">
  <div class="wrapper">
    <div class="sidebar" style="cursor: pointer;">
      <a href="index.php" class="text-header"> 
        <!-- <img src="../assets/photo/laundry2.png" alt="" style=" margin: auto; width: 190px; display: flex; margin-bottom: 27px;"> -->
        Laundry - Kelompok 7
      </a>
      <ul>
       <a href="index.php"><li><i class="fas fa-fw fa-tachometer-alt"></i>&nbsp;Dashboard</li></a>
       <a href="member.php"><li><i class="fas fa-fw fa-users"></i>&nbsp;Member</li></a>
       <!-- <a href="kategoripaket.php"><li><i class="fas fa-fw fa-tasks"></i>&nbsp;Kategori Paket</li></a> -->
       <?php if ($_SESSION['role'] == 'owner') { ?>
       <a href="service.php"><li><i class="fas fa-fw fa-archive"></i>&nbsp;Produk / Service</li></a>
       <?php } ?>
       <a href="transaksi.php"><li><i class="fas fa-fw fa-shopping-cart"></i>&nbsp;Transaksi</li></a>
       <?php if ($_SESSION['role'] == 'owner') { ?>
       <a href="laporantransaksi.php"><li><i class="fas fa-fw fa-chart-line"></i>&nbsp;Laporan Transaksi</li></a>
       <?php } ?>
       <?php if ($_SESSION['role'] == 'owner') { ?>
       <a href="petugas.php"><li><i class="fas fa-fw fa-user"></i>&nbsp;Petugas</li></a>

      <?php } ?>
    </ul>  

  </div>

  <div class="main_content">
    <div class="header" style="padding-left: 30px;">
      <span>Pukul : </span><b><span id="clock"></span></b> | 
      <?php
      $tanggal= mktime(date("m"),date("d"),date("Y"));
      echo "Tanggal : <b>".date("d-M-Y", $tanggal)."</b> ";
      date_default_timezone_set('Asia/Makassar');
      $jam=date("H:i:s");
      echo "| <b>"."</b>";
      $a = date ("H");
      if (($a>=6) && ($a<=11)){
        echo "<b>Selamat Pagi</b>";
      }
      else if(($a>11) && ($a<=15))
      {
        echo "<b>Selamat Siang</b>";}
        else if (($a>15) && ($a<=18)){
          echo "<b>Selamat Sore</b>";}
          else { 
            echo "<b> Selamat Malam </b>";}
            ?>
            <p class="right" ><a href="../logout.php" onclick="return confirm('Anda yakin ingin keluar ?')" style="color: #327690;"><i class="fas fa-sign-out-alt" style="color: #327690;" ></i>&nbsp;Logout</a></p>
          </div>  