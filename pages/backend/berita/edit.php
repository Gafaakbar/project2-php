<?php 
$id_berita = $_GET['id']; 
$berita = $koneksi->query("SELECT * FROM tb_berita WHERE id_berita='$id_berita'")->fetch_array();
?>


<!-- untuk membuat ck editor -->
<script src="https://cdn.ckeditor.com/4.7.3/standard/ckeditor.js"></script>


<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Form Data</h1>

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-info">Edit Data</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
    <form action="" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="id_berita" value="<?= $berita['id_berita']; ?>">

        <div class="form-group">
          <label>Judul</label>
          <input type="text" name="tjudul" class="form-control" value="<?= $berita['judul'] ?>">
        </div>
        <div class="form-group">
          <img src="../../asset/img/<?= $berita['foto'] ?>" alt="foto" width="80px" height="40px">
        </div>

        <div class="form-group">
          <input type="hidden" name="tfoto_beritalama" class="form-control" value="<?= $berita['foto'] ?>">
        </div>

        <div class="form-group">
          <label>Foto Berita</label>
          <input type="file" name="tfoto" class="form-control" value="<?= $berita['foto'] ?>">
        </div>
        <div class="form-group">
          <label>Penulis</label>
          <input type="text" name="tpenulis" class="form-control" value="<?= $berita['penulis'] ?>">
        </div>
        <div class="form-group">
          <label>Tanggal</label>
          <input type="date" name="ttanggal" class="form-control" value="<?= $berita['tanggal'] ?>">
        </div>
        <div class="form-group">
          <label>Deskripsi</label>
          <textarea class="ckeditor" name="tdeskripsi" id="tdeskripsi" ><?= $berita['deskripsi']; ?></textarea>
        </div>
        <button type="submit" name="update" class="btn btn-primary btn-md">Update</button>
      </form>
    </div>
  </div>
</div>


<?php
if (isset($_POST['update'])) {

  $id_berita = $_POST['id_berita'];
  $judul = $_POST['tjudul'];
  $penulis = $_POST['tpenulis'];
  $tanggal = $_POST['ttanggal'];
  $deskripsi = $_POST['tdeskripsi'];

  $fotolama       = $_POST['tfoto'];
  $originalname   = $_FILES['tfoto']['name'];
  $lokasi         = $_FILES['tfoto']['tmp_name'];
  $size           = $_FILES['tfoto']['size'];
  $filename       = time() . "_" . $originalname;


  if ($size > 1000000) {
    echo "<script>
            alert('data Max 1 Mb')
            window.location='?page=produk/edit&id=" . $id_berita . "'
         </>";
  } else {
    if (!empty($lokasi)) {
      unlink("../../asset/img/" . $fotolama);
      move_uploaded_file($lokasi, "../../asset/img/" . $filename);

      // deklarasi slug
      $slug = str_replace(' ', '-', $_POST['tjudul']);

      $update = $koneksi->query("UPDATE tb_berita SET judul = '$judul', slug = '$slug', foto = '$filename', penulis = '$penulis', tanggal = '$tanggal', deskripsi = '$deskripsi' WHERE id_berita = '$id_berita'");
    } else {

      // untuk foto lama
      $filename = $_POST['tfoto_beritalama'];

      $slug = str_replace(' ', '-', $_POST['tjudul']);

      $update = $koneksi->query("UPDATE tb_berita SET judul = '$judul', slug = '$slug', foto = '$filename', penulis = '$penulis', tanggal = '$tanggal', deskripsi = '$deskripsi' WHERE id_berita = '$id_berita'");
    }
    if ($update) {
      echo "<script>
              alert('Data Berhasil Diedit')
              window.location='?page=berita/berita'
            </script>";
    } else {
      echo "<script>
      alert('Data Gagal Diedit')
      window.location='?page=berita/edit&id=" . $id_berita . "'
    </script>";
    } 
    
    }
  }



  

?>