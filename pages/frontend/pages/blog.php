
  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="index.php">Home</a></li>
          <li>Blog</li>
        </ol>
        <h2>Blog</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-8 entries">

            <?php 
            
            include 'pages/backend/koneksi.php';

            $halaman = 2;
            // di cek halaman, kemudian diambil angka dari halaman lalu dibagi 1
            $page = isset($_GET['halaman'])? (int)$_GET['halaman']: 1;

            $mulai = ($page > 1)? ($page * $halaman) - $halaman : 0;

            $result = mysqli_query($koneksi, "SELECT * FROM tb_berita");
            $total = mysqli_num_rows($result);
            $pages = ceil($total/$halaman);


            $query = mysqli_query($koneksi, "SELECT * FROM tb_berita LIMIT $mulai, $halaman");

            
            while ($berita = mysqli_fetch_array($query)) :
            
            ?>          
            <article class="entry">

              <div class="entry-img">
                <img src="<?= 'asset/img/'.$berita['foto']; ?>" alt="foto" class="img-fluid">
              </div>

              <h2 class="entry-title">
                <a href="#"><?= $berita['judul']; ?></a>
              </h2>

              <div class="entry-meta">
                <ul>
                  <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="blog-single.html"><?= $berita['penulis']; ?></a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-single.html"><time datetime="2020-01-01"><?= $berita['tanggal']; ?></time></a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="blog-single.html">12 Comments</a></li>
                </ul>
              </div>

              <div class="entry-content">
                <p><?= $berita['deskripsi']; ?></p>
                <div class="read-more">
                  <a href="index.php?page=blog-single&slug=<?= $berita['slug']; ?>">Read More</a>
                </div>
              </div>

            </article><!-- End blog entry -->
            
            <?php endwhile; ?>
            
           
            
            <!-- Pagination -->
            
            <div class="blog-pagination">
              
              <ul class="justify-content-center">

              <?php for($i=1; $i<=$pages; $i++) :?>              
                <li><a href="?halaman=<?= $i; ?>"><?= $i; ?></a></li>
                <?php endfor; ?>
              </ul>
              
            </div>
           

          </div><!-- End blog entries list -->

          <div class="col-lg-4">

            <div class="sidebar">

              <h3 class="sidebar-title">Search</h3>
              <div class="sidebar-item search-form">
                <form action="">
                  <input type="text">
                  <button type="submit"><i class="bi bi-search"></i></button>
                </form>
              </div><!-- End sidebar search formn-->

              

              <h3 class="sidebar-title">Berita Terbaru</h3>
              <?php 
              
              include 'pages/backend/koneksi.php';

              $query = mysqli_query($koneksi, "SELECT * FROM tb_berita ORDER BY id_berita DESC LIMIT 5");

              while ($berita = mysqli_fetch_array($query)) :
              ?>
              <div class="sidebar-item recent-posts">
                <div class="post-item clearfix">
                  <img src="<?= 'asset/img/'.$berita['foto']?>" alt="foto">
                  <h4><a href="index.php?page=blog-single&slug=<?= $berita['slug']; ?>"><?= $berita['judul'];?></a></h4>
                  <time datetime="2020-01-01"><?= $berita['tanggal']; ?></time>
                </div>

              </div><!-- End sidebar recent posts-->
              <?php endwhile; ?>

              

            </div><!-- End sidebar -->

          </div><!-- End blog sidebar -->

        </div>

      </div>
    </section><!-- End Blog Section -->

  </main><!-- End #main -->

