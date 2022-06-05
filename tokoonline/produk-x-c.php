<?php 
include 'db.php';

$produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_id = '".$_GET['idp']."'");
$p = mysqli_fetch_object($produk);
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/styleProduk.css">
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
                
                    <a class="nav-link active" href="produk-c.php">Produk</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
                </ul>
            </div>
            </div>
        </nav>
            <!-- NavBAR -->

            <div class="container">
                <nav aria-label="breadcrumb" style="background-color: white;" class="mt-2">
                    <ol class="breadcrumb p-3" >
                      <li class="breadcrumb-item"><a href="../PAGES/HomePage.html" class="text-decoration-none">Home</a></li>
                      <li class="breadcrumb-item"><a href="#" class="text-decoration-none">Library</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Data</li>
                    </ol>
                  </nav>
            </div>

            <!-- Produk -->
            

            <div class="container">
                <div class="row row-produk">
                    <div class="col-lg-5">
                        <figure class="figure">
                            <img src="Produk/<?php echo $p->description_image ?>" class="figure-img img-fluid rounded" style="border-radius: 5px; width: 450px;">
                          </figure>
                    </div>

                    <div class="col-lg-7">
                        
                            <h3 class="mt-3"><?php echo $p->product_name ?></h3>
                            <div class="garis-judul"></div>
                            <h3 class="text-muted">Rp <?php echo $p->product_price?></h3>

                            <button class="btn btn-dark btn-sm">-</button>
                            <samp class="mx-3">0</samp>
                            <button class="btn btn-warning btn-sm">+</button>
                            <span class="mx-3">Tersisa :</span>

                            <div class="btn-produk mt-3">
                                <a href="#" class="btn btn-dark btn-lg mt-2 btn-custom "> <i class="fas fa-shopping-cart"></i> Masukan ke Keranjang</a>
                                <a href="#" class="btn btn-warning btn-lg text-white mt-2 btn-custom">Beli Langsung</a>
                            </div>
                    </div>
                </div>

                <!-- Diskripsi Produk -->
                <div class="row row-produk">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="Deskripsi-tab" data-bs-toggle="tab" data-bs-target="#Deskripsi" type="button" role="tab" aria-controls="Deskripsi" aria-selected="true">Deskripsi</button>
                            </li>
                            <li class="nav-item" role="presentation">
                            <button class="nav-link" id="Review-tab" data-bs-toggle="tab" data-bs-target="#Review" type="button" role="tab" aria-controls="Review" aria-selected="false">Review</button>
                            </li>
                        </ul>
                        <div class="tab-content deskripsi" id="myTabContent">
                            <div class="tab-pane fade show active" id="Deskripsi" role="tabpanel" aria-labelledby="Deskripsi-tab">
                                <p>
                                <?php echo $p->	product_deskription	?> 
                                </p>
                            </div>
                            <div class="tab-pane fade" id="Review" role="tabpanel" aria-labelledby="Review-tab">...</div>
                            
                        </div>
                </div>
                

                <!-- Diskripsi Produk -->
                
                
            </div>

            

            <!-- Produk -->

            <!-- Footer -->

            <footer class="bg-dark p-5 mt-3">
                <div class="container">

                  <a class="Fooder-conten" href="https://www.freepik.com/">
                    <img src="https://cdn.freebiesupply.com/logos/thumbs/2x/freepik-logo.png" alt="" width="30" height="24" class="d-inline-block align-text-top">
                    image source - www.freepik.com
                  </a>

                </div>
              </footer>

            <!-- Footer -->
              

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="../JS/popper.min.js"></script>
    
    
  </body>
</html>