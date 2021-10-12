    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="index.php">Home</a></li>
          <li>About</li>
        </ol>
        <h2>About</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <?php 
    include 'pages/backend/koneksi.php';

    // $query = mysqli_query($koneksi, "SELECT * FROM tb_about");

    // $about = mysqli_fetch_array($query);

    $about = $koneksi->query("SELECT * FROM tb_about")->fetch_array();
    
    
    ?>
   
   
   <!-- ======= About Section ======= -->
    <section id="about" class="about">

      <div class="container" data-aos="fade-up">
      <header class="section-header">
        <p>Tentang Kami</p>
      </header>

        <div class="row gx-0">

          <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
            <div class="content">
              <h2><?= $about['judul_about']; ?></h2>
              <p>
               <?= $about['deskripsi_about']; ?>
              </p>
              
            </div>
          </div>

          <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
            <img src="asset/frontend/assets/img/about.jpg" class="img-fluid" alt="">
          </div>

        </div>
      </div>

    </section><!-- End About Section -->