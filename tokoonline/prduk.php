<?php 
    session_start();
    include 'db.php';
    if($_SESSION['status_login'] != true){
        echo '<script>window.location="login.php" </script>';
    }
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
            <a class="navbar-brand" href="home.php">Baby Store</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
            <form class="d-flex ms-auto my-4 my-lg-0" action="prduk.php"> 
                    <input class="form-control me-2" type="search" name="search" placeholder="Cari Barang" aria-label="Search">
                    <input class="btn btn-light" type="submit" name="cari" value="Cari">
                  </form>
                <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="prduk.php">Produk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="kategori.php">Kategori</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="profil.php"><?php echo $_SESSION['a_global']->admin_name ?></a>
                </li>
                </ul>
            </div>
            </div>
        </nav>
            <!-- NavBAR -->


            <div class="container">
            <div class="container mt-3 ">
            <div class="row md-3">
                <div class="col-md-4 offset-md-10">
                <a href="tambah-produk.php" class="btn btn-outline-primary texs-form" >Tambah Produk</a>
            </div>
            </div>


            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th width="50px" class="text-center">No</th>
                        <th width="50px">Kategori</th>
                        <th>Nama Produk</th>
                        <th width="140px">Harga</th>
                        <th>Gambar</th>
                        <th width="200px" class="text-center">Opsi</th>
                    </tr>
                </thead>
                <body>
                    <?php 
                        error_reporting(0);
                        if($_GET[search] != '' ){
                            $where = "WHERE product_name LIKE '%".$_GET[search]."%'  ";
                        }
                        if( $_GET[kat] != '' ){
                            $where = "WHERE kategori_id LIKE '%".$_GET[kat]."%' ";
                        }
                        $no = 1;
                        $produk = mysqli_query($conn, "SELECT * FROM tb_product LEFT JOIN tb_kategori USING (kategori_id) $where ORDER BY product_name ASC");
                        while($row = mysqli_fetch_array($produk)){        
                    ?>
                        <tr>
                            <th class="text-center" ><?php echo $no++ ?></th>
                            <th><?php echo $row['kategori_name'] ?></th>
                            <th><?php echo $row['product_name'] ?></th>
                            <th>Rp <?php echo number_format($row['product_price'])  ?></th>
                            <th ><a href="./produk/<?php echo $row['description_image'] ?>" target="_blank"><img src="./produk/<?php echo $row['description_image'] ?>"  alt="" height="60px"></a></th>
                            
                            
                            <th class="text-center" ><a class="btn btn-primary" href="edit-p.php?idp=<?php echo $row['product_id'] ?>">EDIT</a> || 
                                <a class="btn btn-danger" href="hapus-k.php?idp=<?php echo $row['product_id'] ?>" onclick="return confirm('Yakin Ingin hapus data?')">HAPUS</a></th>
                        </tr>
                    <?php } ?>     
                        <button type="button" class="list-group-item list-group-item-action"></button> 
                              
                </body>
            </table>

            </div>
            </div>


            <!-- footer -->
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