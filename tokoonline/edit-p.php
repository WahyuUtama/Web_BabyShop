<?php 
    session_start();
    include 'db.php';
    if($_SESSION['status_login'] != true){
        echo '<script>window.location="login.php" </script>';
    }

    $query = mysqli_query($conn, "SELECT * FROM tb_admin WHERE admin_id = '".$_SESSION['id']."' ");
    $d = mysqli_fetch_object($query);
    $produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_id = '".$_GET['idp']."' ");
    //if(mysqli_num_rows($produk)==0){
        //echo '<script>window.location="prduk.php" </script>';}
    $k = mysqli_fetch_object($produk);
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

            <!-- Konten profil -->
            <div class="container">
            <form class="form-container" action="" method="POST" enctype="multipart/form-data">
        <h3 class="mb-4 mt-5">Edit Produk</h3>
        

        <div class="mb-2">
          <label for="exampleInputEmail1" class="form-label texs-form">Kategori</label>
            <div class="input-group mb-3">
                <select class="form-select" id="inputGroupSelect01" name="kategori" Required>
                    <option value>--Pilih--</option>
                    <?php 
                        $kategori = mysqli_query($conn, "SELECT * FROM tb_kategori ORDER BY kategori_name ASC");
                        while($r = mysqli_fetch_array($kategori)){
                    ?>
                        <option value="<?php echo $r['kategori_id'] ?>" <?php echo ($r['kategori_id'] == $k->kategori_id)? 'selected':''; ?>><?php echo $r['kategori_name'] ?></option>
                    <?php } ?>
                </select>
                </div>
        </div>
        
        <div class="mb-2">
          <label for="exampleInputEmail1" class="form-label texs-form"
            >Nama Produk</label>
            <div class="input-group mb-3">
              <input
                  type="text"
                  class="form-control"
                  name="nama"
                  value="<?php echo $k->product_name?>"
                  Required
                /> 
            </div>
        </div>

        <div class="mb-2">
          <label for="exampleInputEmail1" class="form-label texs-form"
            >Harga Produk</label>
            <div class="input-group mb-3">
              <input
                  type="text"
                  class="form-control"
                  name="harga"
                  value="<?php echo $k->product_price?>"
                  Required
                /> 
            </div>
        </div>

        <div class="mb-2">
          <label for="exampleInputEmail1" class="form-label texs-form"
            >Deskripsi Produk</label>
            <div class="input-group mb-3">
              <input
                  type="text"
                  class="form-control"
                  name="deskripsi"
                  value="<?php echo $k->product_deskription?>"
                  Required
                /> 
            </div>
        </div>

        <div class="mb-2">
          <label for="exampleInputEmail1" class="form-label texs-form"
            >Gambar Produk</label>
            <div></div>
            <img src="./Produk/<?php echo $k->description_image ?>" height="300px" class="mb-3">
            <input type="hidden" name="foto" value="<?php echo $k->description_image ?>">
            <div class="input-group mb-3">
                <input type="file" class="form-control" id="inputGroupFile01" name="gambar">
            </div>
        </div>

        <div class="mb-2">
          <label for="exampleInputEmail1" class="form-label texs-form" >status</label>
            <div class="input-group mb-3">
                <select class="form-select" id="inputGroupSelect01" name="status" Required>
                    <option value>--pilih--</option>
                    <option value="Baru" <?php echo ($k->product_status == "Baru")? 'selected':'' ?>>Baru</option>
                    <option value="Bekas" <?php echo ($k->product_status == "Bekas")? 'selected':'' ?>>Bekas</option>
                </select>
                </div>
        </div>

        <div class="d-grid mt-5">
          <button type="submit"name="submit" class="btn btn-outline-primary texs-form" >Simpan</button>
        </div>
      </form>

      <?php 
        if(isset($_POST['submit'])){

            $kategori   = $_POST['kategori'];
            $nama       = $_POST['nama'];
            $harga      = $_POST['harga'];
            $deskripsi  = $_POST['deskripsi'];
            $status     = $_POST['status'];
            $foto     = $_POST['foto'];

            $filename = $_FILES['gambar']['name'];
            $tmp_name = $_FILES['gambar']['tmp_name'];

            
            
            if($filename != ''){
              $type1 = explode('.', $filename);
              $type2 = $type1[1];

              $newname = 'produk'.time().'.'.$type2;

              $tipe_dizinkan = array('jpg', 'jpeg', 'png');
              
              if(!in_array($type2, $tipe_dizinkan)){
                echo '<script>alert("Format File tidak dizinkan")</script>';
              }else{
                unlink('./Produk/'. $foto );
                move_uploaded_file($tmp_name, './Produk/'.$newname);
                $namagambar = $newname;
            }
          }else{
            $namagambar = $foto;
          }

          $update = mysqli_query($conn, "UPDATE tb_product SET
                                    product_name        = '".$nama."',  
                                    product_price       = '".$harga."',
                                    description_image   = '".$namagambar."',
                                    product_deskription = '".$deskripsi."',
                                    product_status      = '".$status."',
                                    kategori_id         = '".$kategori."' 
                                    WHERE product_id = $k->product_id");
                if($update){
                    echo '<script>alert("Berhasil Menambahkan Produk")</script>';
                    echo '<script>window.location="prduk.php" </script>';
                }else{
                    echo 'Gagal'.mysqli_error($conn);
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