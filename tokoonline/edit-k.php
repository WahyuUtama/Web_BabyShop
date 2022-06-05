<?php 
    session_start();
    include 'db.php';
    if($_SESSION['status_login'] != true){
        echo '<script>window.location="login.php" </script>';
    }

    $query = mysqli_query($conn, "SELECT * FROM tb_admin WHERE admin_id = '".$_SESSION['id']."' ");
    $d = mysqli_fetch_object($query);
    $kategori = mysqli_query($conn, "SELECT * FROM tb_kategori WHERE kategori_id = '".$_GET['id']."' ");
    if(mysqli_num_rows($kategori)==0){
        echo '<script>window.location="edit-kategori.php" </script>';
    }
    $k = mysqli_fetch_object($kategori);
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
                    <a class="nav-link" href="prduk.php">Produk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="kategori.php">Kategori</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="profil.php"><?php echo $_SESSION['a_global']->admin_name ?></a>
                </li>
                </ul>
            </div>
            </div>
        </nav>
            <!-- NavBAR -->

            <!-- Konten profil -->
            <div class="container">
      <form class="form-container" action="" method="POST">
        <h3 class="mb-4 mt-5">Edit Kategori</h3>
        <div class="mb-2">
          <label for="exampleInputEmail1" class="form-label texs-form"
            >Nama Kategori</label>
            <div class="input-group mb-3">
              <input
                  type="text"
                  class="form-control"
                  name="user"
                  value="<?php echo $k->kategori_name ?>"
                /> 
            </div>
             
        </div>
        
        
        <div class="d-grid mt-5">
          <button type="submit"name="submit" class="btn btn-outline-primary texs-form" >Simpan</button>
        </div>
      </form>

      <?php 
        if(isset($_POST['submit'])){

            $nama = ucwords($_POST['user']);

            $update = mysqli_query($conn, "UPDATE tb_kategori SET
                                        kategori_name = '".$nama."'
                                        WHERE kategori_id = '".$k->kategori_id."' ");
            if($update){
                echo '<script>alert("Berhasil Mengedit Kategori")</script>';
                echo '<script>window.location="edit-kategori.php" </script>';
            }
            else{
                echo '<script>alert("Gagal")</script>';
            }
        }
      ?>
      

      
    </div>

    <!-- ahir konten -->



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