<!-- ======= Hero Section ======= -->
<section id="hero" class="hero d-flex align-items-center">

<div class="container">
  <div class="row">
    <div class="col-lg-6 d-flex flex-column justify-content-center">
      <h1 data-aos="fade-up">Kami berdedikasi untuk memberikan pendidikan terbaik</h1>
      <h2 data-aos="fade-up" data-aos-delay="400">Bergabunglah bersama kami</h2>
      <div data-aos="fade-up" data-aos-delay="600">
        <div class="text-center text-lg-start">
          <a href="pages/backend/login.php" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
            <span>Get Started</span>
            <i class="bi bi-arrow-right"></i>
          </a>
        </div>
      </div>
    </div>
    <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
      <img src="asset/frontend/assets/img/hero-img.png" class="img-fluid" alt="">
    </div>
  </div>
</div>

</section><!-- End Hero -->



<main id="main">


<!-- ======= Values Section ======= -->
<section id="values" class="values">

  <div class="container" data-aos="fade-up">

    <header class="section-header">
      <h2>Jurusan</h2>
      <p>Jurusan yang tersedia</p>
    </header>

    <div class="row">

      <?php
      
      include 'pages/backend/koneksi.php';

      $query = mysqli_query($koneksi, "SELECT * FROM tb_jurusan");

      while ($jurusan = mysqli_fetch_array($query)) :
      
      ?>  
    
      <div class="col-lg-4">
        <div class="box" data-aos="fade-up" data-aos-delay="200">
          <img src="asset/img/<?= $jurusan['foto_jurusan']; ?>" class="img-fluid" alt="">
          <h3><?= $jurusan['nama_jurusan']; ?></h3>
          <p><?= $jurusan['deskripsi']; ?></p>
        </div>
      </div>

      <?php endwhile; ?>

    </div>

  </div>

</section><!-- End Values Section -->

<!-- ======= Counts Section ======= -->
<section id="counts" class="counts">
  <div class="container" data-aos="fade-up">

    <div class="row gy-4">

      <?php 
      include 'pages/backend/koneksi.php';

      $query = mysqli_query($koneksi, "SELECT * FROM tb_dosen");
      $dosen = mysqli_num_rows($query);
      ?>  

      <div class="col-lg-3 col-md-6">
        <div class="count-box">
          <i class="bi bi-people"></i>
          <div>
            <span><?= $dosen; ?></span>
            <p>Total Dosen</p>
          </div>
        </div>
      </div>



      <?php 
      include 'pages/backend/koneksi.php';

      $query = mysqli_query($koneksi, "SELECT * FROM tb_jurusan");
      $jurusan = mysqli_num_rows($query);
      ?>  
      <div class="col-lg-3 col-md-6">
        <div class="count-box">
          <i class="bi bi-journal-richtext" style="color: #ee6c20;"></i>
          <div>
            <span><?= $jurusan; ?></span>
            <p>Jurusan</p>
          </div>
        </div>
      </div>


      <?php 
      include 'pages/backend/koneksi.php';

      $query = mysqli_query($koneksi, "SELECT * FROM tb_admin");
      $admin = mysqli_num_rows($query);
      ?>  
      <div class="col-lg-3 col-md-6">
        <div class="count-box">
          <i class="bi bi-headset" style="color: #15be56;"></i>
          <div>
            <span><?= $admin; ?></span>
            <p>Admin Universitas</p>
          </div>
        </div>
      </div>


      <?php 
      include 'pages/backend/koneksi.php';

      $query = mysqli_query($koneksi, "SELECT * FROM tb_produk");
      $produk = mysqli_num_rows($query);
      ?>
      <div class="col-lg-3 col-md-6">
        <div class="count-box">
          <i class="bi bi-bag-check" style="color: #bb0852;"></i>
          <div>
            <span><?= $produk; ?></span>
            <p>Produk</p>
          </div>
        </div>
      </div>

    </div>

  </div>
</section><!-- End Counts Section -->









<!-- ======= Testimonials Section ======= -->
<section id="testimonials" class="testimonials">

  <div class="container" data-aos="fade-up">

    <header class="section-header">
      <h2>Testimoni</h2>
      <p>Apa Pendapat Mereka Tentang Kampus Ini</p>
    </header>

    <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="200">
      <div class="swiper-wrapper">

        <?php 
        include 'pages/backend/koneksi.php';
        $query = mysqli_query($koneksi, "SELECT * FROM tb_testimoni");
        while ($testimoni = mysqli_fetch_array($query)) :
        ?>
        <div class="swiper-slide">
          <div class="testimonial-item">
            <div class="stars">
              <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
            </div>
            <p><?= $testimoni['deskripsi']; ?></p>
            <div class="profile mt-auto">
              <img src="asset/img/<?= $testimoni['foto']; ?>" class="testimonial-img" alt="foto">
              <h3><?= $testimoni['nama']; ?></h3>
              <h4><?= $testimoni['pekerjaan']; ?></h4>
            </div>
          </div>
        </div><!-- End testimonial item -->
        <?php endwhile; ?>


      </div>
      <div class="swiper-pagination"></div>
    </div>

  </div>

</section><!-- End Testimonials Section -->



<!-- ======= Clients Section ======= -->
<!-- <section id="clients" class="clients">

  <div class="container" data-aos="fade-up">

    <header class="section-header">
      <h2>Our Clients</h2>
      <p>Temporibus omnis officia</p>
    </header>

    <div class="clients-slider swiper">
      <div class="swiper-wrapper align-items-center">
        <div class="swiper-slide"><img src="asset/frontend/assets/img/clients/client-1.png" class="img-fluid" alt=""></div>
        <div class="swiper-slide"><img src="asset/frontend/assets/img/clients/client-2.png" class="img-fluid" alt=""></div>
        <div class="swiper-slide"><img src="asset/frontend/assets/img/clients/client-3.png" class="img-fluid" alt=""></div>
        <div class="swiper-slide"><img src="asset/frontend/assets/img/clients/client-4.png" class="img-fluid" alt=""></div>
        <div class="swiper-slide"><img src="asset/frontend/assets/img/clients/client-5.png" class="img-fluid" alt=""></div>
        <div class="swiper-slide"><img src="asset/frontend/assets/img/clients/client-6.png" class="img-fluid" alt=""></div>
        <div class="swiper-slide"><img src="asset/frontend/assets/img/clients/client-7.png" class="img-fluid" alt=""></div>
        <div class="swiper-slide"><img src="asset/frontend/assets/img/clients/client-8.png" class="img-fluid" alt=""></div>
      </div>
      <div class="swiper-pagination"></div>
    </div>
  </div>

</section>End Clients Section -->

<!-- ======= Recent Blog Posts Section ======= -->
<section id="recent-blog-posts" class="recent-blog-posts">

  <div class="container" data-aos="fade-up">

    <header class="section-header">
      <h2>Blog</h2>
      <p>Berita Terbaru</p>
    </header>

    <div class="row">
      <?php 
        include 'pages/backend/koneksi.php';
        $query = mysqli_query($koneksi, "SELECT * FROM tb_berita ORDER BY id_berita DESC LIMIT 3");

        while ($berita = mysqli_fetch_array($query)) :
        
      ?>
      <div class="col-lg-4">
        <div class="post-box">
          <div class="post-img"><img src="<?= 'asset/img/'.$berita['foto']; ?>" class="img-fluid" alt=""></div>
          <span class="post-date"><?= $berita['tanggal']; ?></span>
          <h3 class="post-title"><?= $berita['judul']; ?></h3>
          <a href="index.php?page=blog-single&slug=<?= $berita['slug']; ?>" class="readmore stretched-link mt-auto"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
        </div>
      </div>
      <?php endwhile; ?>

    </div>

  </div>

</section><!-- End Recent Blog Posts Section -->



</main><!-- End #main -->