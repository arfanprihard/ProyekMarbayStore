<?php

include '../koneksi/connection.php';

session_start();

error_reporting(0);

if(isset($_SESSION['username'])){
    header("Location: homePage.php");
}

if(isset($_POST['submit'])){
    $email = $_POST['email'];  
    $username = $_POST['username'];
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];
    $sql = "INSERT INTO users VALUES ('default', '$username', '$email', '$password')";
    $result = mysqli_query($conn, $sql);
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $password;
        header("Location: homePage.php");
    
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/cssRegis.css">
  </head>
  <body>
    <div class="container">
        <form class="form-container"  action="" method="post">
            <h3>Daftar</h3>
    <div class="row">
        <div class="col-md-7">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input name="email"  type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            
        </div>
        </div>
        <div class="col-md-5">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">User Name</label>
            <input  name="username"  type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            
        </div>
        </div>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input name="password" type="password" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label"> Konfirmasi Password</label>
            <input name="repassword" type="password" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Saya Menyetujui Syarat & Ketentuan Yang Berlaku*</label>
        </div>
        <div class="row">
            <div class="col-md-6 d-grid">
            <button name="submit" type="submit" href="#" class="btn btn-primary">Daftar</button>
            </div>
            <div class="col-md-6 d-grid">
            <button type="reset" href="#" class="btn btn-danger">Refresh</button>
            </div>
            <div class="mt-3"><label>Kamu Sudah Punya Akun ? <a href="login.php" class="textForm"><strong>Login Disini</strong></a></span
          ></label></div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>