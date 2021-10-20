<?php 
session_start();
if (isset($_SESSION["login"])) {
  echo'<script>location="dashboard"</script>';
}
 include '../db.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/login.css">

    <title>Login Admin</title>
  </head>
  <body style="background-image: url(../asset/gambar/banner.jpg); background-size: cover; background-position: center; background-attachment: fixed;">



<div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto my-5">
        <div class="card border-0 shadow rounded-3 my-5 p-5">
        	<img src="../asset/gambar/logo.png" class="img-fluid mx-auto" style="width:50px;">
          <div class="card-body">
          	<h3 class="card-title text-center fs-5">PEMERINTAHAN<br>DESA SUKASENANG</h3>
            <h5 class="card-title text-center mb-3 fw-light fs-5">Login Admin</h5>
            <?php

                if (isset($_POST['submit'])) {

                  $username = $_POST['email'];
                  $password = $_POST['pass'];

                  $result = mysqli_query($conn, "SELECT * FROM tb_admin WHERE username = '".$username."' ");

                  if(mysqli_num_rows($result)>0){

                    $row = mysqli_fetch_assoc($result);

                    if (password_verify($password, $row['password'])) {
                      $_SESSION["login"]=true;
                        echo'<script>location="dashboard"</script>';
                    } else {
                    echo('<div class="alert alert-primary alert-dismissible fade show" role="alert">
                          <strong style="font-style:italic;">Password Salah!</strong>
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>');
                    }

                  }else{
                    echo('<div class="alert alert-primary alert-dismissible fade show" role="alert">
                          <strong style="font-style:italic;">Username Tidak Ditemukan!</strong>
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>');
                  }

                  }

            ?>
            <form action="" method="POST">
              <div class="form-floating mb-3">
                <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com" required="Username Harus Diisi">
                <label for="floatingInput">Email address</label>
              </div>
              <div class="form-floating mb-3">
                <input type="password" name="pass" class="form-control" id="floatingPassword" placeholder="Password" required>
                <label for="floatingPassword">Password</label>
              </div>
              <div class="d-grid">
                <button class="btn btn-primary name btn-login text-uppercase fw-bold" name="submit" type="submit">Sign
                  in</button>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>









   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
  </body>
</html>

