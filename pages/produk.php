<?php
    session_start();
    include '../koneksi/connection.php';
    if (!isset($_SESSION["username"])) {
        header("Location: ../index.php");
        exit;
    }

    $id_produk =(int) $_GET['id_produk'];
    $jumlahbarang = (int) $_GET['jumlahbarang'];
    $hargabarang = (int) $_GET['hargabarang'];
    $namap = $_GET['namabarang'];
    $username = $_SESSION["username"];

    if(isset($_POST['keranjang'])){
        $cek = mysqli_query($conn,"select * from checkout where id_produk='$id_produk' and username = '{$_SESSION['username']}'");
        $liat = mysqli_num_rows($cek);
        if($liat > 0){
            echo "<script> alert ('Anda sudah pernah menambahkan ke keranjang!! Silakan cek keranjang');
                </script>";
        } else {
          
            $bikincart = mysqli_query($conn,"INSERT INTO checkout VALUES('default', 'Topi', '$jumlahbarang', '$hargabarang', '$id_produk', '$username');");
            echo "<script> alert ('Berhasil menambahkan ke keranjang!!');
                </script>";
                header("Location: checkout.php");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>MarbayStore</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" type="text/css" href="../css/homePage.css" />
  </head>
  <body>
    <!-- awal navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">
          <img
            src="../assets/logo.png"
            alt="Bootstrap"
            width="50"
            height="50"
          />
        </a>
        <a class="navbar-brand" href="#"> Marbay<strong>Store</strong> </a>
        <div class="collapse navbar-collapse ms-5" id="navbarNav">
          <ul class="navbar-nav ms-5">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="homePage.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="homePage.php#topi">Topi</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="homePage.php#baju">Baju</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="homePage.php#jaket">Jaket</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="homePage.php#celana">Celana</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="homePage.php#kauskaki">Kaus Kaki</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="homePage.php#sepatu">Sepatu</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="checkout.php">Keranjang</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="homePage.php#aboutus">About Us</a>
            </li>
          </ul>
            
        </div>
        
        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
            <a class="nav-link" ><?php echo $_SESSION['username']; ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">Logout</a>
          </li>
        </ul>
      </div>
    </nav>
    <!-- akhir navbar -->

    <!-- awal Produk -->
    <form action="" method="POST">
      <?php 
            $p = mysqli_fetch_array(mysqli_query($conn,"Select * from produk where id ='$id_produk'"));
				    echo $p['nama'];
            $_SESSION['namaproduk'] = $p['nama'];
            ?>
      <div class="container mt-5">
        <div class="judul-kategori" style="background-color: #fff; padding: 5px 10px;"></div>
          <h1 class="text-center"><?php echo $p['nama']?></h1>
      </div>

          <div class="row mx-0 p-0 mt-3">
            <div class="my-1 container text-center">
                <div class="row">
                  <div class="col container">
                    <div style="border: 2px solid #0000; border-radius: 10px; cursor: crosshair;">
                       <img width="250px" height="400px" src="../assets/<?php echo $p['gambar']?>"
                       class="card-img-top">
                      </div>
                     </div>
                      <div class="col">
                      <div class="card-body ms-auto" style="text-align: left;">
                       <h1 class="text-center"></h1>
                      <h3 class="text-center">Harga : Rp. <?php echo $p['harga']?></h3>
                      <h5>Deskripsi Produk : <?php echo $p['deskripsi']?></h5>
                      <br>
                     <h5>• Jenis Barang : <?php echo $p['jenis']?></h5>
                     <h5>• Jumlah Barang : <?php echo $jumlahbarang?></h5>
                    <h5>• Stok Produk : <?php echo $p['stok']?></h5>
                     <br><br>
                     <button type="submit" name="keranjang"
                       style="border-radius: 5px; background-color: white; color: #446CB3; width: 150px; height: 40px;">+Keranjang</button>

                      </div>
                </div>
              </div>
         </div>
  </form>
    <!-- akhir Produk -->
    <!-- awal footer -->
    <footer class="bg-light p-5 mt-5 text-center">
      <div class="container">
        <div class="row">
          <div class="col">
            <a href="#">
              <img src="../assets/logomarbay.png" style="width: 30px;">
            </a>
            <span>Copyright @2023 | Created by Sahabat Marbay</span>
          </div>
        </div>
      </div>
    </footer>

    <!-- akhir footer -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
