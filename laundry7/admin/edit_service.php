<?php

$title = "Edit service";
include 'layout/sidebar.php';

$id = $_GET["id"];
// query data warung_ berdasarkan id
$show = query("SELECT * FROM service WHERE id_service = $id")[0];
// cek apakah tombol sudah ditekan atau belum
if (isset($_POST["submit"])) {
    // cek apakah data berhasil di ubah atau tidak
    if (ubah($_POST) > 0) {
        echo "<script language='javascript'>(window.alert('Data Produk / Service Berhasil Diubah'))</script>";
        echo "<script>location='service.php';</script>";
    } else {
        echo "<script language='javascript'>(window.alert('Data Produk / Service Gagal Diubah'))</script>";
        echo "<script>location='edit_service.php?id=$id';</script>";
    }
}
// $id = $_GET['id'];
// $sho = mysqli_query($conn, "SELECT * FROM tbl_service WHERE id_service = '$id'");
// $show = mysqli_fetch_array($sho);

// if (isset($_POST['add'])) {
//     $nama = $_POST['nama'];
//     $deks = $_POST['deks'];
//     $satuan = $_POST['satuan'];
//     $harga = $_POST['harga'];

//     $sql = mysqli_query($conn, "UPDATE tbl_service SET nama = '$nama',
//     deks = '$deks',
//     satuan = '$satuan',
//     harga = '$harga',    
//     WHERE id_service = '$id'");
//     if ($sql) {
//         echo "<script language='javascript'>(window.alert('Data Produk / Service Berhasil Diubah'))</script>";
//         echo "<script>location='service.php';</script>";
//     } else {
//         echo "<script language='javascript'>(window.alert('Data Produk / Service Gagal Diubah'))</script>";
//         echo "<script>location='edit_service.php?id=$id';</script>";
//     }
// }
?>

<div class="info">
    <form method="post" action="" enctype="multipart/form-data">
        <h2 class="" style="padding-bottom: 15px; border-bottom: 1px solid #d2d2d2; margin-bottom: 20px;">Edit service</h2>
        <input type="hidden" name="id_service" value="<?= $show['id_service']; ?>">
        <div class="form-group">
            <label>Nama Produk / Service :</label>
            <input required="required" type="text" name="nama" class="form-control form-control-user" placeholder="Nama service" value="<?= $show['nama']; ?>" autocomplete="off">
        </div>
        <div class="form-group">
            <label>deskripsi :</label><br>
            <textarea name="deks" rows="2" cols="70"><?= $show['deks']; ?></textarea>
        </div>
        <div class="form-group">
            <label>Satuan :</label>
            <select required="required" name="satuan" class="form-control form-control-user" id="exampleInputPassword" placeholder="Satuan" value="<?= $show['satuan']; ?>">
                <option value="Kg" <?php if ($show["satuan"] == 'Kg') echo "selected"; ?>>Kilogram</option>
                <option value="Pcs" <?php if ($show["satuan"] == 'Pcs') echo "selected"; ?>>Pcs</option>
                <option value="Bed" <?php if ($show["satuan"] == 'Bed') echo "selected"; ?>>Bed</option>
            </select>
        </div>
        <div class="form-group">
            <label>Harga :</label>
            <input required="required" type="number" name="harga" class="form-control form-control-user" placeholder="Harga service" value="<?= $show['harga']; ?>" autocomplete="off">
        </div>

        <div class="right">
            <a href="service.php" class="btn btn-warning">Kembali</a>
            <input type="submit" name="submit" value="Edit Produk / Service" class="btn btn-primary">
        </div>

    </form>
</div>


<?php include 'layout/script.php' ?>