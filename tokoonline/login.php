<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/styleMasuk.css" />
    <link rel="stylesheet" href="../fontawesome-free-6.1.1-web/css/all.min.css">

    <title>Masuk</title>
  </head>
  <body>
    <div class="container">
      <form class="form-container" action="" method="POST">
        <h3 class="mb-4">Masuk</h3>
        <div class="mb-2">
          <label for="exampleInputEmail1" class="form-label texs-form"
            >Username</label>
            <div class="input-group mb-3">
              
                <input
                  type="text"
                  class="form-control"
                  name="user"
                  id="exampleInputEmail1"
                  aria-describedby="emailHelp"
                  placeholder="Masukkan Username"
                  required
                />
            </div>
        </div>
        <div class="mb-2">
          <label for="exampleInputPassword1" class="form-label texs-form">Password</label>
          <div class="input-group mb-3">
            
          <input
            type="password"
            class="form-control"
            name="pass"
            id="exampleInputPassword1"
            placeholder="Password"
            required
          /></div>
        </div>
        <div style="margin-top: 5px;" class="texs-form">
          <a href="LupaPassword.html" class="texs-hover">Lupa Password?</a>
        </div>
        <div class="d-grid mt-5">
          <button type="submit"name="submit" class="btn btn-outline-primary texs-form" >Masuk</button>
        </div>
        <div class="mt-2">
          <span class="texs-form">Belum Punya Akun? <a href="Daftar.html" class="texs-form texs-hover">Daftar</a></span>
        </div>
      </form>
      <?php 
        if(isset($_POST['submit'])){
          session_start();
          include 'db.php';

          $user = mysqli_real_escape_string($conn, $_POST['user']);
          $pass = mysqli_real_escape_string($conn, $_POST['pass']);

          $cek = mysqli_query($conn, "SELECT * FROM tb_admin WHERE username = '".$user."' AND password = '".$pass."' ");
          
          if(mysqli_num_rows($cek) > 0){
            $d = mysqli_fetch_object($cek);
            $_SESSION['status_login'] = true;
            $_SESSION['a_global'] = $d;
            $_SESSION['id'] = $d->admin_id;

            echo '<script>window.location="home.php" </script>';
          }else{
            echo '<script>alert("Username salah")</script>';
          };
        }
        

        
      ?>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="../JS/bootstrap.js"></script>
    <script src="../JS/popper.min.js"></script>
  </body>
</html>
