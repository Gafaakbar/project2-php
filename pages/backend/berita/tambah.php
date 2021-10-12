<!-- untuk membuat ck editor -->
<script src="https://cdn.ckeditor.com/4.7.3/standard/ckeditor.js"></script>

<!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Form Data</h1>

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-info">Tambah Data Berita</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <label>Judul Berita</label>
          <input type="text" name="tjudul" class="form-control">
        </div>
        <div class="form-group">
          <label>Foto</label>
          <input type="file" name="tfoto" class="form-control">
        </div>
        <div class="form-group">
          <label>Penulis</label>
          <input type="text" name="tpenulis" class="form-control">
        </div>
        <div class="form-group">
          <label>Tanggal</label>
          <input type="date" name="ttanggal" class="form-control">
        </div>
        <div class="form-group">
          <label>Deskripsi</label>
          <textarea class="ckeditor" name="tdeskripsi" id="tdeskripsi" value=""></textarea>
        </div>
        <button type="submit" name="tambah" class="btn btn-primary btn-md">Tambah</button>
      </form>
    </div>
  </div>
</div>


<?php 
if (isset($_POST['tambah'])){
  $judul = $_POST['tjudul'];
  $penulis = $_POST['tpenulis'];
  $tanggal = $_POST['ttanggal'];
  $deskripsi = $_POST['tdeskripsi'];

  // untuk foto
  $originalname = $_FILES['tfoto']['name'];
  $lokasi = $_FILES['tfoto']['tmp_name'];
  $size = $_FILES['tfoto']['size'];
  $filename = time(). "_" . $originalname;


  //kenalkan slug
  $slug = str_replace(' ', '-', $_POST['tjudul']);
  // str_replace untuk mengganti spasi menjadi strip atau sesuai parameter kedua

$tambah = $koneksi->query("INSERT INTO tb_berita(judul, slug, foto, penulis, tanggal, deskripsi) VALUE ('$judul', '$slug', '$filename', '$penulis', '$tanggal', '$deskripsi')");

  if ($tambah == True) {
    move_uploaded_file($lokasi, '../../asset/img/'.$filename);
    echo "<script>
              alert('Data berhasil disimpan')
              window.location.href = 'index.php?page=berita/berita'
          </script>";
  }else{
    echo 'gagal';
  }
}
?>
