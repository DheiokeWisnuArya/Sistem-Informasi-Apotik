
<?php 
// menghubungkan php dengan koneksi database
require 'conn.php';

// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];


// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($conn, "SELECT * FROM user WHERE username='$username' AND password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);


// cek apakah username dan password di temukan pada database
if($cek > 0){

    $data = mysqli_fetch_assoc($login);

    // cek jika user login sebagai admin
    if($data['role']=="owner"){

        // buat session login dan username
        $_SESSION['id'] = $data['id_user'];
        $_SESSION['username'] = $username;
        $_SESSION['nama_user'] = $data['nama_user'];
        $_SESSION['role'] = "owner";
        $_SESSION['status'] = "login";
        // alihkan ke halaman dashboard admin
        echo "<script language='javascript'>(window.alert('Selamat Anda Berhasil Login'))</script>";
        echo "<script>location='admin/index.php';</script>";

    // cek jika user login sebagai pegawai
    }else if($data['role']=="kasir"){
        // buat session login dan username
        $_SESSION['id'] = $data['id_user'];
        $_SESSION['username'] = $username;
        $_SESSION['nama_user'] = $data['nama_user'];
        $_SESSION['role'] = "kasir";
        $_SESSION['status'] = "login";
        // alihkan ke halaman dashboard pegawai
        echo "<script language='javascript'>(window.alert('Selamat Anda Berhasil Login'))</script>";
        echo "<script>location='admin/index.php';</script>";

    // cek jika user login sebagai pengurus
    }  
}else{
    echo "<script language='javascript'>(window.alert('Cek Kembali Username / Password Anda'))</script>";
    echo "<script>location='index.php';</script>";
}

?>