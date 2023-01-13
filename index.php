<?php
    session_start();
    include 'koneksi/connection.php';
    if(isset($_SESSION['username'])){
      header("Location: homePage.php");
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
    <link rel="stylesheet" type="text/css" href="css/homePage.css" />
  </head>
  <body>
    <!-- awal navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">
          <img
            src="assets/logo.png"
            alt="Bootstrap"
            width="50"
            height="50"
          />
        </a>
        <a class="navbar-brand" href="#"> Marbay<strong>Store</strong> </a>
        <div class="collapse navbar-collapse ms-5" id="navbarNav">
          <ul class="navbar-nav ms-5">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#topi">Topi</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#baju">Baju</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#jaket">Jaket</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#celana">Celana</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#kauskaki">Kaus Kaki</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#sepatu">Sepatu</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#aboutus">About Us</a>
            </li>
          </ul>
            
        </div>
        
        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
            <a class="nav-link" href="pages/login.php">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/regis.php">Register</a>
          </li>
        </ul>
      </div>
    </nav>
    <!-- akhir navbar -->
    <!-- awal carausel -->
    <div class="container">
      <div
        id="carouselExampleAutoplaying"
        class="carousel slide"
        data-bs-ride="carousel"
      >
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="assets/gif1.gif" class="d-block w-100" alt="..." />
          </div>
          <div class="carousel-item">
            <img src="assets/gif2.gif" class="d-block w-100" alt="..." />
          </div>
          <div class="carousel-item">
            <img src="assets/gif3.gif" class="d-block w-100" alt="..." />
          </div>
          <div class="carousel-item">
            <img src="assets/gif4.gif" class="d-block w-100" alt="..." />
          </div>
        </div>
        <button
          class="carousel-control-prev"
          type="button"
          data-bs-target="#carouselExampleAutoplaying"
          data-bs-slide="prev"
        >
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button
          class="carousel-control-next"
          type="button"
          data-bs-target="#carouselExampleAutoplaying"
          data-bs-slide="next"
        >
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
        
      </div>
    </div>
    <!-- akhir carausel -->

    <!-- Produk Topi -->
    <div id="topi" class="topi container mt-5" style = "border: 1px solid#2d2d2d;">
        <div class="judul-kategori" style="background-color: ; padding: 5px 10px;"></div>
        <h5 class="text-left"><strong>TOPI</strong></h5>
    </div>
    <div class="container mt-5">
    <div class="row row-cols-1 row-cols-md-4 g-4">
      <?php 
        $brgs=mysqli_query($conn,"SELECT * from produk WHERE jenis = 'topi' order by id DESC");
        $no=1;
        while($p=mysqli_fetch_array($brgs)){
          ?>
          <div class="col">
            <div class="card"style="width: 18rem;">
              <img src="assets/<?php echo $p['gambar']?>" width="250px" 
                height="250px class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $p['nama'] ?></h5>
                  <p class="card-text">Rp. <?php echo number_format($p['harga'])?></p>
                  <p class = "card-text">Stok: <?php echo number_format($p['stok'])?></p>
                  <input class="quantity text-center ms-5" min="1" name="quantity" value="1" type="number">
                  <div class="d-grid mt-4">  
                    <a class="btn btn-primary">CheckOut</a>
                  </div>
                </div>
              </div>
            </div>
          <?php
				}
			?>
    </div>
    </div>

    <!-- Produk Baju -->
    <div id="baju" class="container mt-5" style = "border: 1px solid#2d2d2d;">
        <div class="judul-kategori" style="background-color: ; padding: 5px 10px;"></div>
        <h5 class="text-left"><strong>BAJU</strong></h5>
    </div>
    <div class="container mt-5">
    <div class="row row-cols-1 row-cols-md-4 g-4">
      <?php 
        $brgs=mysqli_query($conn,"SELECT * from produk WHERE jenis = 'baju' order by id DESC");
        $no=1;
        while($p=mysqli_fetch_array($brgs)){
          ?>
          <div class="col">
            <div class="card"style="width: 18rem;">
              <img src="assets/<?php echo $p['gambar']?>" width="250px" 
                height="250px class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $p['nama'] ?></h5>
                  <p class="card-text">Rp. <?php echo number_format($p['harga'])?></p>
                  <p class = "card-text">Stok: <?php echo number_format($p['stok'])?></p>
                  <input class="quantity text-center ms-5" min="1" name="quantity" value="1" type="number">
                  <div class="d-grid mt-4">  
                    <a class="btn btn-primary">CheckOut</a>
                  </div>
                </div>
              </div>
            </div>
          <?php
				}
			?>
    </div>
    </div>

    <!-- Produk Jaket -->
    <div id="jaket" class="container mt-5" style = "border: 1px solid#2d2d2d;">
        <div class="judul-kategori" style="background-color: ; padding: 5px 10px;"></div>
        <h5 class="text-left"><strong>JAKET</strong></h5>
    </div>
    <div class="container mt-5">
    <div class="row row-cols-1 row-cols-md-4 g-4">
      <?php 
        $brgs=mysqli_query($conn,"SELECT * from produk WHERE jenis = 'jaket' order by id DESC");
        $no=1;
        while($p=mysqli_fetch_array($brgs)){
          ?>
          <div class="col">
            <div class="card"style="width: 18rem;">
              <img src="assets/<?php echo $p['gambar']?>" width="250px" 
                height="250px class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $p['nama'] ?></h5>
                  <p class="card-text">Rp. <?php echo number_format($p['harga'])?></p>
                  <p class = "card-text">Stok: <?php echo number_format($p['stok'])?></p>
                  <input class="quantity text-center ms-5" min="1" name="quantity" value="1" type="number">
                  <div class="d-grid mt-4">  
                    <a class="btn btn-primary">CheckOut</a>
                  </div>
                </div>
              </div>
            </div>
          <?php
				}
			?>
    </div>
    </div>

    <!-- Produk Celana -->
    <div id=celana class="container mt-5" style = "border: 1px solid#2d2d2d;">
        <div class="judul-kategori" style="background-color: ; padding: 5px 10px;"></div>
        <h5 class="text-left"><strong>CELANA</strong></h5>
    </div>
    <div class="container mt-5">
    <div class="row row-cols-1 row-cols-md-4 g-4">
      <?php 
        $brgs=mysqli_query($conn,"SELECT * from produk WHERE jenis = 'celana' order by id DESC");
        $no=1;
        while($p=mysqli_fetch_array($brgs)){
          ?>
          <div class="col">
            <div class="card"style="width: 18rem;">
              <img src="assets/<?php echo $p['gambar']?>" width="250px" 
                height="250px class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $p['nama'] ?></h5>
                  <p class="card-text">Rp. <?php echo number_format($p['harga'])?></p>
                  <p class = "card-text">Stok: <?php echo number_format($p['stok'])?></p>
                  <input class="quantity text-center ms-5" min="1" name="quantity" value="1" type="number">
                  <div class="d-grid mt-4">  
                    <a class="btn btn-primary">CheckOut</a>
                  </div>
                </div>
              </div>
            </div>
          <?php
				}
			?>
    </div>
    </div>

    <!-- Produk Kaus Kaki -->
    <div id="kauskaki" class="container mt-5" style = "border: 1px solid#2d2d2d;">
        <div class="judul-kategori" style="background-color: ; padding: 5px 10px;"></div>
        <h5 class="text-left"><strong>KAUS KAKI</strong></h5>
    </div>
    <div class="container mt-5">
    <div class="row row-cols-1 row-cols-md-4 g-4">
      <?php 
        $brgs=mysqli_query($conn,"SELECT * from produk WHERE jenis = 'kauskaki' order by id DESC");
        $no=1;
        while($p=mysqli_fetch_array($brgs)){
          ?>
          <div class="col">
            <div class="card"style="width: 18rem;">
              <img src="assets/<?php echo $p['gambar']?>" width="250px" 
                height="250px class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $p['nama'] ?></h5>
                  <p class="card-text">Rp. <?php echo number_format($p['harga'])?></p>
                  <p class = "card-text">Stok: <?php echo number_format($p['stok'])?></p>
                  <input class="quantity text-center ms-5" min="1" name="quantity" value="1" type="number">
                  <div class="d-grid mt-4">  
                    <a class="btn btn-primary">CheckOut</a>
                  </div>
                </div>
              </div>
            </div>
          <?php
				}
			?>
    </div>
    </div>

    <!-- Produk Sepatu -->
    <div id="sepatu" class="container mt-5" style = "border: 1px solid#2d2d2d;">
        <div class="judul-kategori" style="background-color: ; padding: 5px 10px;"></div>
        <h5 class="text-left"><strong>SEPATU</strong></h5>
    </div>
    <div class="container mt-5">
    <div class="row row-cols-1 row-cols-md-4 g-4">
      <?php 
        $brgs=mysqli_query($conn,"SELECT * from produk WHERE jenis = 'sepatu' order by id DESC");
        $no=1;
        while($p=mysqli_fetch_array($brgs)){
          ?>
          <div class="col">
            <div class="card"style="width: 18rem;">
              <img src="assets/<?php echo $p['gambar']?>" width="250px" 
                height="250px class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $p['nama'] ?></h5>
                  <p class="card-text">Rp. <?php echo number_format($p['harga'])?></p>
                  <p class = "card-text">Stok: <?php echo number_format($p['stok'])?></p>
                  <input class="quantity text-center ms-5" min="1" name="quantity" value="1" type="number">
                  <div class="d-grid mt-4">  
                    <a class="btn btn-primary">CheckOut</a>
                  </div>
                </div>
              </div>
            </div>
          <?php
				}
			?>
    </div>
    </div>
    <!-- akhir carausel -->
    <div id="aboutus" class="container mt-5" style = "border: 1px solid#2d2d2d;">
        <div class="judul-kategori" style="background-color: ; padding: 5px 10px;"></div>
        <h5 class="text-left"><strong>ABOUT US</strong></h5>
    </div>
    <div class="container mt-5">
        <div class="row row-cols-1 row-cols-md-4 g-4">
      <div class="col">
        <div class="card h-100">
          <a href="https://instagram.com/arfan_prihard?igshid=YmMyMTA2M2Y="><img src="assets/Screenshot_2023_0113_085850.png" class="card-img-top" alt=""></a>
          <div class="card-body">
            <p class="card-text"><center>Arfan Prihardiansyah</center></p>
          </div>
          <div class="card-footer">
            <small class="text-muted">Arpan si ganteng punya empang</small>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card h-100">
          <a href="https://instagram.com/bayumhs_?igshid=YmMyMTA2M2Y="><img src="assets/Screenshot_2023_0113_085914.png" class="card-img-top" alt=""></a>
          <div class="card-body">
            <p class="card-text"><center>Bayu Mahesa</center></p>
          </div>
          <div class="card-footer">
            <small class="text-muted">Bayu si tampan penakluk gunung</small>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card h-100">
          <a href="https://instagram.com/kafahalfrz?igshid=YmMyMTA2M2Y="><img src="assets/IMG_20220510_132938_162.jpg" class="card-img-top" alt=""></a>
          <div class="card-body">
            <p class="card-text"><center>Kafah Al Farzi Andeza</center></p>
          </div>
          <div class="card-footer">
            <small class="text-muted">Kafah sang pemberani hobi mancing</small>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card h-100">
          <a href="https://instagram.com/_sandyfirdaus?igshid=YmMyMTA2M2Y="><img src="assets/Screenshot_2023_0113_085931.png" class="card-img-top" alt=""></a>
          <div class="card-body">
            <p class="card-text"><center>Mochamad Shandy Firdaus</center></p>
          </div>
          <div class="card-footer">
            <small class="text-muted">Shandy sang jagoan suka memasak</small>
          </div>
        </div>
      </div>
    </div>
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
              <img src="assets/logomarbay.png" style="width: 30px;">
            </a>
            <span>Copyright @2023 | Created by Sahabat Marbay</span>
          </div>
        </div>
      </div>
    </footer>

    <!-- akhir footer -->
</html>
