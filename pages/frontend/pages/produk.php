<!-- ======= Breadcrumbs ======= -->
<section class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="index.php">Home</a></li>
          <li>Product</li>
        </ol>
        <h2>Product</h2>

      </div>
</section><!-- End Breadcrumbs -->


<!-- ======= Portfolio Section ======= -->
<section id="portfolio" class="portfolio">

<div class="container" data-aos="fade-up">

  <header class="section-header">
    <h2>Product</h2>
    <p>Check our latest Product</p>
  </header>


  <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">


  <!-- perulangan -->
  <?php 
  
  include 'pages/backend/koneksi.php';

  $query = mysqli_query($koneksi, "SELECT * FROM  tb_produk");

  while ($produk = mysqli_fetch_array($query)) {

 
  
  ?>

    <div class="col-lg-4 col-md-6 portfolio-item filter-app">
      <div class="portfolio-wrap">
        <img src="<?= 'asset/img/'.$produk['foto_produk']; ?>" class="img-fluid" alt="">
        <div class="portfolio-info">
          <h2><?= $produk['nama_produk']; ?></h2>
          <p>Harga : Rp.<?= $produk['harga'];?></p>
          <div class="portfolio-links">
            <a href="<?= 'asset/img/' .$produk['foto_produk']; ?>" data-gallery="portfolioGallery" class="portfokio-lightbox"><i class="bi bi-plus"></i></a>
          </div>
        </div>
      </div>
    </div>

  <?php } ?>

  

  </div>

</div>

</section><!-- End Portfolio Section -->