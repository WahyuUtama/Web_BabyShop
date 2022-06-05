<?php 
    include 'db.php';
    
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/styleHome.css">
    <link rel="stylesheet" href="../fontawesome-free-6.1.1-web/css/all.min.css">

    <title>Home</title>
  </head>
  <body>
            <!-- NavBAR -->
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
            <a class="navbar-brand" href="home-c.php">Baby Store</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <form class="d-flex ms-auto my-4 my-lg-0" action="produk-c.php"> 
                    <input class="form-control me-2" type="search" name="search" placeholder="Cari Barang" aria-label="Search">
                    <input class="btn btn-light" type="submit" name="cari" value="Cari">
                  </form>
                <ul class="navbar-nav ms-auto">
                
                    <a class="nav-link" href="produk-c.php">Produk</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
                </ul>
            </div>
            </div>
        </nav>
            <!-- NavBAR -->

            <!-- Capsule-->
            <div class="container">
                <div id="carouselExampleIndicators" class="carousel slide mt-5" data-bs-ride="true">
                    <div class="carousel-indicators ">
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img src="assets/img1.jpg" class="d-block img-fluid" alt="...">
                      </div>
                      <div class="carousel-item">
                        <img src="assets/img2.jpg" class="d-block img-fluid" alt="...">
                      </div>
                      <div class="carousel-item">
                        <img src="assets/img3.jpg" class="d-block img-fluid" alt="...">
                      </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                  </div>
            </div>
            
              <!-- Capsule-->

              <!--Kategori-->
              <div class="container">
                  <div class="judulKategori mt-5" style="background-color: white; padding: 5px 10px;">
                      <h5>Kategori</h5>
                  </div>
                  <div class="row text-center row-container" >
                    <?php 
                        $kategori = mysqli_query($conn, "SELECT * FROM tb_kategori ORDER BY kategori_name ASC");
                        if(mysqli_num_rows($kategori) > 0){
                          while($k= mysqli_fetch_array($kategori)){?>
                                <div class="col-lg-2 col-md-3 col-sm-4 col-6 mt-3">
                                  <div class="menu-kategori">
                                      <a href="produk-c.php?kat=<?php echo $k['kategori_id'] ?>">
                                      <img src="assets/Aset Kategori/christmas-toy-collection-flat-design_23-2148750492.webp" class="img-kategori"></a>
                                      <p class="mt-2"><?php echo $k['kategori_name'] ?></p>
                                  </div>
                                </div> <?php } } ?>
                  </div>
              </div>
              <!--Kategori-->

              <!-- Daftar Barang -->
            <div class="container">
                <div class="row text-center">
                  <?php 
                    $produk = mysqli_query($conn, "SELECT * FROM tb_product ORDER BY product_id DESC LIMIT 12");
                    if(mysqli_num_rows($produk) > 0){ 
                      while($p = mysqli_fetch_array($produk)){?>
                    <div class="col-lg-3 col-md-3 col-sm-4 col-6 mt-3">
                    <div class="card"  >
                      
                        <img src="./Produk/<?php echo $p['description_image'] ?>" class="card-img-top" height="200">
                      
                        <div class="card-body">
                          <h5 class="card-title"><?php echo $p['product_name'] ?></h5>
                          <p class="card-text">Rp <?php echo number_format($p['product_price']) ?></p>
                          <a href="#" class="btn btn-primary d-grid">Beli</a>
                        </div>
                      </div>
                  </div>
                  <?php } } ?>

              </div>
            </div>
              

              <!-- Daftar Barang -->
              <footer class="bg-dark p-5 mt-3">
                <div class="container">

                  <a class="Fooder-conten" href="https://www.freepik.com/">
                    <img src="https://cdn.freebiesupply.com/logos/thumbs/2x/freepik-logo.png" alt="" width="30" height="24" class="d-inline-block align-text-top">
                    image source - www.freepik.com
                  </a>

                </div>
              </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="../JS/popper.min.js"></script>
    
    
  </body>
</html>