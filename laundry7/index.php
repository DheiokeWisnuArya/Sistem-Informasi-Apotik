<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Selamat Datang</title>
  <link rel="stylesheet" type="text/css" href="assets/css/login.css">
  <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="assets/fontawesome/css/all.css">
</head>
<body>  
  <div class="container-fluid mx-auto">
    <div class="card card0 ">
      <div class="row d-flex">
        <div class="col-lg-6">
          <div class="row justify-content-center mt-5 border-line"> 
            <img src="assets/photo/img-login.png" class="image"> 
          </div>
        </div>
        <div class="col-lg-6">
          <form action="cek_login.php" method="POST">
            <div class="card2 card border-0 px-4 py-5">
              <div class="row mb-4">
                <h3 class="mb-0 mr-4 mt-2">LAMAN LOGIN</h3>
              </div>
              <div class="row"> 
                <label class="mb-1">
                  <h6 class="mb-0 text-sm">Username</h6>
                </label> 
                <input class="mb-4 form-control" type="text" name="username" placeholder="Masukkan Username Anda"> 
              </div>
              <div class="row"> 
                <label class="mb-1">
                  <h6 class="mb-0 text-sm">Password</h6>
                </label> 
                <input type="password" class="form-control" name="password" id="pswd" placeholder="Masukkan Password Anda"> 
              </div>
              <div class="row mb-4">
                <div class="custom-control custom-checkbox custom-control-inline"> 
                  <input id="chk1" type="checkbox" name="chk" class="custom-control-input"> 
                  <label for="chk1" id="showhide" class="custom-control-label text-sm mt-2">Tampilkan Password</label> 
                </div>
              </div>
              <div class="row mb-3"> 
                <button type="submit" class="btn btn-primary text-center">Login</button> 
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script src="assets/fontawesome/js/all.js"></script>
  <script>
  // proses 1
  var masukanpass = document.getElementById('pswd'),
  chk  = document.getElementById('chk1'),
  label = document.getElementById('showhide');


  chk.onclick = function () {

    if(chk.checked) {

      masukanpass.setAttribute('type', 'text');
      label.textContent = 'Sembunyikan Password';
    } else {

      masukanpass.setAttribute('type', 'password');
      label.textContent = 'Tampilkan Password';
    }

  }
</script>
</body>
</html>
