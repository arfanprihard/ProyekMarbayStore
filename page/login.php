<?php

include '../koneksi/connection.php';

session_start();

error_reporting(0);

if(isset($_SESSION['username'])){
    header("Location: homePage.php");
}

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM users WHERE (username = '$username' OR email = '$username') AND password = '$password'";
    $result = mysqli_query($conn, $sql);
    if($result->num_rows > 0){
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        $_SESSION['email'] = $row['email'];
        header("Location: homePage.php");
    }else{
        echo "<script>alert('Username atau Password salah')</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="../css/style.css" />
  </head>
  <body class = "bg-dark">
    <div class="container">
      <form class="form-container" action="" method="post">
        <h3 class="textJudul mb-5 mt-2">Login</h3>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label textForm"
            >Username or Email address</label
          >
          <input
            type="text"
            class="form-control"
            id="exampleInputEmail1"
            aria-describedby="emailHelp"
            name="username"
          />
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label textForm"
            >Password</label
          >
          <input type="password" class="form-control" name="password" />
        </div>
        <div style="margin-top: -5px" class="text-end">
          <span><a href="#" class="textForm">Lupa Password?</a></span>
        </div>
        <div class="d-grid mt-4">
          <button type="submit" class="btn btn-outline-primary" name="submit" >
            Submit
          </button>
        </div>
        <div class="mt-2">
          <span
            >Belum Punya Akun?
            <a href="regis.php" class="textForm"
              ><strong>Daftar</strong></a
            ></span
          >
        </div>
      </form>
    </div>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
