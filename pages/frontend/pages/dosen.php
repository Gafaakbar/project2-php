<!-- ======= Breadcrumbs ======= -->
<section class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="index.php">Home</a></li>
          <li>Dosen</li>
        </ol>
        <h2>Dosen</h2>

      </div>
</section><!-- End Breadcrumbs -->


<!-- ======= Team Section ======= -->
<section id="team" class="team">

<div class="container" data-aos="fade-up">

  <header class="section-header">
    <h2>Dosen</h2>
    <p>Dosen Tetap Universitas</p>
  </header>

  <div class="row gy-4">

    <!-- perulangan -->
    <?php 
      
      include 'pages/backend/koneksi.php';

      $query = mysqli_query($koneksi, "SELECT * FROM tb_dosen");

      while ($dosen = mysqli_fetch_array($query)) {


      
      ?>
    <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">

      <div class="member">
        <div class="member-img">
          <img src="<?= 'asset/img/'.$dosen['foto_dosen']; ?>" class="img-fluid" alt="">
          <div class="social">
            <a href=""><i class="bi bi-twitter"></i></a>
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-linkedin"></i></a>
          </div>
        </div>
        <div class="member-info">
          <h4><?= $dosen['nama_dosen']; ?></h4>
          <span><?= $dosen['jabatan']; ?></span>
          <p><?= $dosen['alamat']; ?></p>
        </div>
      </div>

   

    </div>

    <?php   } ?>

    

    

    

  </div>

</div>

</section><!-- End Team Section -->