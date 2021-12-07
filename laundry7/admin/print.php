<?php

$title = "Print Transaksi";
// include 'layout/sidebar.php';
include '../conn.php';
$id = $_GET['id'];
$sho = mysqli_query($conn, "SELECT * FROM transaksi JOIN member ON member.id_member = transaksi.id_member WHERE kode_transaksi = '$id'");
$s = mysqli_fetch_array($sho);

$sho3 = mysqli_query($conn, "SELECT * FROM user JOIN transaksi ON transaksi.id_user = user.id_user");
$s3 = mysqli_fetch_array($sho3);

$sho4 = mysqli_query($conn, "SELECT * FROM service JOIN detail_transaksi ON detail_transaksi.id_service = service.id_service WHERE kode_transaksi = '$id'");
$s4 = mysqli_fetch_array($sho4);

?>

<div class="container">
<div class="info2">
    <h2 class="" style="padding-bottom: 15px; border-bottom: 1px solid #d2d2d2; margin-bottom: 20px; text-align: left;">Laundry 7</h2>
    <!-- style="margin-left:auto;margin-right:auto" ; -->
    <table >
        <tr>
            <td>
                No Transaksi
            </td>
            <td>:</td>
            <td><?= $s['kode_transaksi']; ?></td>
        </tr>
        <tr>
            <td>
                Pelanggan
            </td>
            <td>:</td>
            <td>
                <?= $s['nama_member']; ?>
            </td>
        </tr>
        <tr>
            <td>
                Operator
            </td>
            <td>:</td>
            <td>
                <?= $s3['nama_user']; ?>
            </td>
        </tr>
        <tr>
            <td>Waktu</td>
            <td>:</td>
            <td>
                <?= $s['tanggal']; ?>
            </td>
        </tr>
    </table>
<br>
    <!-- <p style="text-align: center;">Items & Service</p> -->

    <table class="content-table" style="" border="1">
    <tr>
        <td colspan="5" style="text-align: center;">Items & Service</td>
        
    </tr>
        
            <tr style="text-align: center;">
                <td style="width:10%">No</td>
                <td style="width:30%">Items</td>
                <td style="width:30%">Harga @</td>
                <td style="width:10%; ">Qty</td>
                <td style="width:30%">Total</td>
            </tr>
        <!-- </thead> -->
        <tbody>
            <?php $no = 1;
            ?>
            <tr>
                <!-- <td><?= $no++; ?></td> -->
                <td><?= $s['kode_transaksi']; ?></td>
                <td><?= $s4['nama']; ?></td>
                <td>Rp. <?= $s4['harga']; ?></td>
                <td style="text-align: center;"><?= $s4['qty']; ?></td>
                <td>Rp. <?= $s['nilai_laundry']; ?></td>
            </tr>
        </tbody>
    </table>

    <table style="" ;>
        <tr>
            <td>Sub Total</td>
            <td><?= $s['nilai_laundry']; ?></td>
        </tr>
        <tr>
            <td>Total</td>
            <td><?= $s['nilai_laundry']; ?></td>
        </tr>
        <tr>
            <td>Tunai</td>
            <td><?= $s['dibayar']; ?></td>
        </tr>
        <tr>
            <td>Kembali</td>
            <td>
                <?= $s['kembali']; ?>
            </td>
        </tr>
    </table>
<br>
<p style="text-size: 2px;">Terima kasih <?= $s['nama_member']; ?>.</p>

</div>
</div>
<?php include 'layout/script.php' ?>

<script>
    $(document).ready(function() {
        $('#service').change(function() {
            var id = $(this).val();
            $.ajax({
                    url: 'ajax.php',
                    dataType: 'json',
                    type: 'POST',
                    data: {
                        id: id
                    },
                })
                .done(function(data) {
                    var harga = data.harga;
                    $('#harga').val(harga);
                })
                .fail(function() {
                    console.log('gagal');
                })
        });
        $('#qty').change(function() {
            var qty = $(this).val();
            var pajak = $('#pajak').val();
            var diskon = $('#diskon').val();
            var harga = $('#harga').val();
            var sum = Math.round(Number(harga) * Number(qty));
            var sum2 = Math.round(Number(sum) * Number(diskon));
            var sum3 = Math.round(Number(sum2) * Number(pajak));
            $('#total').val(sum + sum2 + sum3);
        })
        $('#qty').keyup(function() {
            var qty = $(this).val();
            var pajak = $('#pajak').val();
            var diskon = $('#diskon').val();
            var harga = $('#harga').val();
            var sum = Math.round(Number(harga) * Number(qty));
            var sum2 = Math.round(Number(sum) * Number(diskon));
            var sum3 = Math.round(Number(sum2) * Number(pajak));
            $('#total').val(sum + sum2 + sum3);
        })
    })


    window.print();
</script>