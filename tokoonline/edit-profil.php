<?php 
    session_start();
    include 'db.php';
    if($_SESSION['status_login'] != true){
        echo '<script>window.location="login.php" </script>';
    }

    $query = mysqli_query($conn, "SELECT * FROM tb_admin WHERE admin_id = '".$_SESSION['id']."' ");
    $d = mysqli_fetch_object($query);
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
                    <a class="nav-link " href="kategori.php">Kategori</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="profil.php"><?php echo $_SESSION['a_global']->admin_name ?></a>
                </li>
                </ul>
            </div>
            </div>
        </nav>
            <!-- NavBAR -->

            <!-- Konten profil -->
            <div class="container">
      <form class="form-container" action="" method="POST">
        <h3 class="mb-4 mt-5">Ubah Profil</h3>
        <div class="mb-2">
          <label for="exampleInputEmail1" class="form-label texs-form"
            >Username</label>
            <div class="input-group mb-3">
              <input
                  type="text"
                  class="form-control"
                  name="user"
                  value="<?php echo $d->username ?>"
                /> 
            </div>
             
        </div>
        <div class="mb-2">
          <label for="exampleInputPassword1" class="form-label texs-form">Nama</label>
          <div class="input-group mb-3">
              
                <input
                  type="text"
                  class="form-control"
                  name="nama"
                  value="<?php echo $d->admin_name ?>"
                />
            </div>
        </div>
        <div class="mb-2">
          <label for="exampleInputPassword1" class="form-label texs-form">No.Telp</label>
          <div class="input-group mb-3">
              <input
                  type="text"
                  class="form-control"
                  name="no_telp"
                  value="<?php echo $d->admin_telp ?>"
                />
            </div>
                
        </div>
        <div class="mb-2">
          <label for="exampleInputPassword1" class="form-label texs-form">E-mail</label>
          <div class="input-group mb-3">
              <input
                  type="text"
                  class="form-control"
                  name="email"
                  value="<?php echo $d->admin_email ?>"
                />
            </div>
          
        </div>
        <div class="mb-2">
          <label for="exampleInputPassword1" class="form-label texs-form">Alamat</label>
          <div class="input-group mb-3 form-label">
              <input 
                  type="text"
                  class="form-control"
                  name="alamat"
                  value="<?php echo $d->admin_address ?>"
                />
            </div>
          
        </div>
        
        <div class="d-grid mt-5">
          <button type="submit"name="submit" class="btn btn-outline-primary texs-form" >Simpan</button>
        </div>
        
      </form>
      <?php 
        if(isset($_POST['submit'])){
            $user   = $_POST['user'];
            $nama   = $_POST['nama'];
            $no     = $_POST['no_telp'];
            $email  = $_POST['email'];
            $alamat = $_POST['alamat'];

            $update = mysqli_query($conn, "UPDATE tb_admin SET
                                    admin_name = '".$nama."',
                                    username = '".$user."',
                                    admin_telp = '".$no."',
                                    admin_email = '".$email."',
                                    admin_address = '".$alamat."' 
                                    WHERE admin_id = '".$d->admin_id."' ");
            if($update){
                
                echo "berhasil";
                echo '<script>window.location="profil.php" </script>';
                
            }
            else{
                echo "gagal".mysqli_error($conn);
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