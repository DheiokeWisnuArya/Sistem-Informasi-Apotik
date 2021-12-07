<?php

$title = "Laporan Transaksi";
include 'layout/sidebar.php';

$show = mysqli_query($conn, "SELECT * FROM transaksi JOIN member ON member.id_member = transaksi.id_member JOIN detail_transaksi ON detail_transaksi.kode_transaksi = transaksi.kode_transaksi JOIN service ON service.id_service = detail_transaksi.id_service");
$show2 = mysqli_query($conn, "SELECT * FROM member");
$show3 = mysqli_query($conn, "SELECT * FROM service");

$sa = mysqli_query($conn, "SELECT MAX(kode_transaksi) AS kode FROM transaksi");
$data = mysqli_fetch_array($sa);



 
?>

<div class="info2">
  <h2 class="" style="padding-bottom: 15px; border-bottom: 1px solid #d2d2d2; margin-bottom: 20px;" >Laporan Transaksi</h2>
  <a href="" onclick="window.print()" class="btn btn-primary" style="margin-bottom: 15px !important"><span class="fas fa-fw fa-print"></span> Print</a>
  <table class="content-table" id="datatables" style="width: 100%;">
    <thead>
       <tr >
           <td>No</td>
           <td>Nota</td>
           <td>Member</td>
           <td width="10%">Terima</td>
           <td width="10%">Selesai</td>
           <td>service</td>
           <td>Qty</td>
           <!-- <td>Diskon</td> -->
           <!-- <td>Pajak</td> -->
           <td>Total</td>
           <td>Dibayar</td>
           <td>Status Pesanan</td>
           <td>Status Pembayaran</td>
           <!-- <td width="20%">Aksi</td> -->
       </tr>
   </thead>
   <tbody>
    <?php $no = 1;
    while($s = mysqli_fetch_array($show)) {
       ?>
       <tr>
        <td><?= $no++; ?></td>
        <td><?= $s['kode_transaksi']; ?></td>
        <td><?= $s['nama_member']; ?></td>
        <td><?php echo date('d-m-Y', strtotime($s['tanggal'])); ?></td>
        <td><?php echo date('d-m-Y', strtotime($s['batas_waktu'])); ?></td>
        <td><?= $s['nama']; ?></td>
        <td><?= $s['qty']; ?></td>
        <!-- <td><?= $s['diskon']; ?></td> -->
        <!-- <td><?= $s['pajak']; ?></td> -->
        <td><?= $s['nilai_laundry']; ?></td>
        <td><?= $s['dibayar']; ?></td>
        <td><?= $s['status_pesanan']; ?></td>
        <td><?= $s['status_pembayaran']; ?></td>
        <!-- <td>
           <a title="Ubah" href="edit_transaksi.php?id=<?= $s['kode_transaksi']; ?>" class="btn btn-warning"><span class="fas fa-fw fa-pen"></span> Ubah</a> 
           <a title="Hapus" href="hapus_transaksi.php?id=<?= $s['kode_transaksi']; ?>" onclick="return confirm('Yakin ingin Menghapus Transaksi Dengan Nomor Nota : \n<?php echo $s['kode_transaksi'];?>');" class="btn btn-danger"> <span class="fas fa-fw fa-trash"></span> Hapus</a>
       </td> -->
   </tr>
<?php } ?>
</tbody>
</table>
</div>
<?php include 'layout/script.php' ?>

<script>
    $(document).ready(function(){
        $('#service').change(function(){
            var id = $(this).val();
            $.ajax({
                url: 'ajax.php',
                dataType: 'json',
                type: 'POST',
                data:{id:id},
            })
            .done(function(data){
                var harga = data.harga;
                $('#harga').val(harga);
            })
            .fail(function(){
                console.log('gagal');
            })
        });
        $('#qty').change(function(){
            var qty = $(this).val();
            var pajak = $('#pajak').val();
            var diskon = $('#diskon').val();
            var harga = $('#harga').val();
            var sum = Math.round(Number(harga)*Number(qty));
            var sum2 = Math.round(Number(sum)*Number(diskon));
            var sum3 = Math.round(Number(sum2)*Number(pajak));
            $('#total').val(sum+sum2+sum3);
        })
        $('#qty').keyup(function(){
            var qty = $(this).val();
            var pajak = $('#pajak').val();
            var diskon = $('#diskon').val();
            var harga = $('#harga').val();
            var sum = Math.round(Number(harga)*Number(qty));
            var sum2 = Math.round(Number(sum)*Number(diskon));
            var sum3 = Math.round(Number(sum2)*Number(pajak));
            $('#total').val(sum+sum2+sum3);
        })
    })
</script>