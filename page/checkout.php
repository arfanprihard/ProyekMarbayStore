<?php
    session_start();
    include '../koneksi/connection.php';
    if (!isset($_SESSION['username'])) {
        header("Location: ../index.php");
        exit;
    }
    $username = $_SESSION['username'];
    if(isset($_POST["hapus"])){
        $kode = $_POST['idproduknya'];
        var_dump($kode);
        $q2 = mysqli_query($conn, "DELETE FROM checkout WHERE id_produk='$kode' AND username = '$username'");
        if($q2){
            echo "<script>alert('Delete Berhasil')</script>";
        } else {
            echo "<script>alert('Delete Gagal')</script>";
        }
        
    }else if(isset($_GET["bayar"])){
        $username = $_SESSION['username'];
            $keranjang = mysqli_query($conn,"select * from checkout where username='$username'");
            echo "<script>alert('Pembayaran Berhasil')</script>";
                                // $brgs=mysqli_query($conn, $keranjang);
                                // while($p=mysqli_fetch_array($brgs)){
                                //     $namaproduk = $p['nama_produk'];
                                //     $totalproduk = (int) $p['total_produk'];
                                //     $totalharga = (int) $p['total_harga'];
                                //     $idproduk = (int) $p['id_produk'];
                                //     mysqli_query($conn,"INSERT INTO history VALUES (default, '$namaproduk', '$totalproduk', '$totalharga', '$idproduk', '$username'");
                                //     mysqli_query($conn,"DELETE FROM checkout WHERE id_produk='$idproduk' AND username = '$username'");
                                // }
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Check Out</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" type="text/css" href="../css/checkout.css" />
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
              <a class="nav-link" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="homePage.php">Topi</a>
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
              <a class="nav-link active" href="checkout.php">Keranjang</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About Us</a>
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
    <!-- awal keranjang -->
    <div class="cart_section">
     <div class="container-fluid">
         <div class="row">
             <div class="col-lg-10 offset-lg-1">
                 <div class="cart_container">
                     <div class="cart_title">Keranjang</div>
                     
                     <?php 
                        $_SESSION['totalsemuaharga'] = 0;
                        $cekproduk=mysqli_query($conn,"SELECT * from checkout WHERE username = '$username' order by id_produk DESC");
                            
                            while($c=mysqli_fetch_array($cekproduk)){
                                $idp = $c['id_produk'];
                                $tampilproduk=mysqli_query($conn,"SELECT * from produk WHERE id = '$idp'");
                                $row = mysqli_fetch_assoc($tampilproduk);
                                $_SESSION['totalsemuaharga'] += (int) $c['total_harga'];
                                ?>
                                <form action="" method="POST">
                                <div class="cart_items">
                                    <ul class="cart_list">
                                        <li class="cart_item clearfix">
                                            <div class="cart_item_image"><img src="../assets/<?php echo $row['gambar']?>"></div>
                                            <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                                                <div class="cart_item_name cart_info_col">
                                                    <div class="cart_item_title">Nama</div>
                                                    <div class="cart_item_text"><?php echo $c['nama_produk']?></div>
                                                </div>
                                                <div class="cart_item_quantity cart_info_col">
                                                    <div class="cart_item_title">Kuantitas</div>
                                                    <div class="cart_item_text"><?php echo $c['total_produk']?></div>
                                                </div>
                                                <div class="cart_item_price cart_info_col">
                                                    <div class="cart_item_title">Harga</div>
                                                    <div class="cart_item_text">Rp. <?php echo $c['total_harga']?></div>
                                                </div>
                                            </div>
                                        </li>

                                    </ul>
                                    <div>
                                        <input type="hidden" name="idproduknya" value="<?php echo $idp?>">
                                        <button type="submit" name="hapus" style = "border: none;"><img src="../assets/trash.png"></button>
                                    </div>
                                    
                                </div>      
                                </form>
                                <?php
                                        }
                                    ?>
                     
                     <div class="order_total">
                         <div class="order_total_content text-md-right">
                             <div class="order_total_title">Order Total:</div>
                             <div class="order_total_amount"><?php echo $_SESSION['totalsemuaharga']?></div>
                         </div>
                     </div>
                        <div class="cart_buttons"> 
                            
                            <a href="homePage.php">
                                <button type="button" class="button cart_button_clear">
                                    Kembali Belanja
                                </button> 
                            </a>
                                <a href="bayar.php">
                                <button type="button" class="button cart_button_checkout" name="bayar">
                                    Bayar
                                </button> 
                                </a>
                        </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
    <!-- akhir keranjang -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
      crossorigin="anonymous"
    ></script>
  </body>
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
</html>
