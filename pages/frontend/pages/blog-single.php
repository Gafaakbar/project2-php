  <?php 
  
  include 'pages/backend/koneksi.php';

  $query = mysqli_query($koneksi, "SELECT * FROM tb_berita WHERE slug = '$_GET[slug]'");

  $detail = mysqli_fetch_array($query);
  
  ?>
  
  
  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="index.php">Home</a></li>
          <li><a href="blog.php">Blog</a></li>
          <li>Blog Single</li>
        </ol>
        <h2>Blog Single</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Single Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row">

          
          <div class="col-lg-8 entries">

            <article class="entry entry-single">

              <div class="entry-img">
                <img src="<?= 'asset/img/'.$detail['foto']; ?>" alt="foto" class="img-fluid">
              </div>

              <h2 class="entry-title">
                <a href="blog-single.html"><?= $detail['judul']; ?></a>
              </h2>

              <div class="entry-meta">
                <ul>
                  <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="blog-single.html">John Doe</a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-single.html"><time datetime="2020-01-01">Jan 1, 2020</time></a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="blog-single.html">12 Comments</a></li>
                </ul>
              </div>

              <div class="entry-content">
                <p>
                 <?= $detail['deskripsi']; ?>
                </p>


              

                

              </div>

              

            </article><!-- End blog entry -->

            

            <div class="blog-comments">

              <div class="reply-form">
                <h4>Leave a Reply</h4>
                <p>Your email address will not be published. Required fields are marked * </p>
                <form action="">
                  <div class="row">
                    <div class="col-md-6 form-group">
                      <input name="name" type="text" class="form-control" placeholder="Your Name*">
                    </div>
                    <div class="col-md-6 form-group">
                      <input name="email" type="text" class="form-control" placeholder="Your Email*">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col form-group">
                      <input name="website" type="text" class="form-control" placeholder="Your Website">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col form-group">
                      <textarea name="comment" class="form-control" placeholder="Your Comment*"></textarea>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary">Post Comment</button>

                </form>

              </div>

            </div><!-- End blog comments -->

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
    </section><!-- End Blog Single Section -->

  </main><!-- End #main -->
