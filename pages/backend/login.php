<?php 

include'koneksi.php';

session_start();
if(isset($_SESSION['admin'])) {
  header("location: index.php");
  die();
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
  <?php include'component/style.php';?>
</head>

<body class="">
  <div class="container position-sticky z-index-sticky top-0">
    <div class="row">
      <div class="col-12">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg blur blur-rounded top-0 z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
          <div class="container-fluid">
            <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="../pages/dashboard.html">
              Selamat Datang Admin
            </a>
           
           
          </div>
        </nav>
        <!-- End Navbar -->
      </div>
    </div>
  </div>
  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-75">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
              <div class="card card-plain mt-8">
                <div class="card-header pb-0 text-left bg-transparent">
                  <h3 class="font-weight-bolder text-info text-gradient">Silahkan Login !</h3>
                  <p class="mb-0">Silahkan masukkan username dan password</p>
                </div>
                <div class="card-body">
                  <form action="" method="POST">
                    <label>Username</label>
                    <div class="mb-3">
                      <input type="text" name="username" class="form-control" placeholder="username" aria-label="username" aria-describedby="username-addon">
                    </div>
                    <label>Password</label>
                    <div class="mb-3">
                      <input type="password" name="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="password-addon">
                    </div>
                    

                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="rememberMe" checked="">
                      <label class="form-check-label" for="rememberMe">Remember me</label>
                    </div>

                    <div class="text-center">
                      <button type="submit" name="login" class="btn bg-gradient-info w-100 mt-4 mb-0">Sign in</button>
                    </div>
                  </form>
                
                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-4 text-sm mx-auto">
                    Don't have an account?
                    <a href="javascript:;" class="text-info text-gradient font-weight-bold">Sign up</a>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" style="background-image:url('../../assets/img/curved-images/curved6.jpg')"></div>
              </div>
            </div>
            
            <?php 
            
            if(isset($_POST['login'])) {
              $username = $_POST['username'];
              $password = $_POST['password'];
              
              $cek_user = $koneksi->query("SELECT * FROM tb_admin WHERE username = '$username' AND password = '$password' ")->fetch_assoc();

              // var_dump($cek_user);
              // die();

              if($cek_user == True) {
                $_SESSION['admin'] = $cek_user;
                echo "<script>
                          alert('Login Sukses !')
                          window.location='index.php'
                      </script>";
              } else {
                echo "<script>
                          alert('Login Gagal!')
                          window.location='login.php'
                      </script>";
              }
              
            }
            
            ?>

            
           

          </div>
        </div>
      </div>


  


    </section>
  </main>
  <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  
  <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  <?php include'component/script.php';?>
</body>

</html>