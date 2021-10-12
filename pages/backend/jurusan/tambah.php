  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Form Data</h1>

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-info">Tambah Data Jurusan</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <label>Nama Jurusan</label>
          <input type="text" name="tnamajurusan" class="form-control">
        </div>
       
        <div class="form-group">
          <label>Foto Jurusan</label>
          <input type="file" name="tfotojurusan" class="form-control">
        </div>

        <div class="form-group">
          <label>Deskripsi Jurusan</label>
          <input type="text" name="tdeskripsi" class="form-control">
        </div>
        
        
        <button type="submit" name="tambah" class="btn btn-primary btn-md">Tambah</button>
      </form>
    </div>
  </div>
</div>


<?php 
if (isset($_POST['tambah'])){
  $nama_jurusan = $_POST['tnamajurusan'];
  $deskripsi = $_POST['tdeskripsi'];
 
  $originalname = $_FILES['tfotojurusan']['name'];
  $lokasi = $_FILES['tfotojurusan']['tmp_name'];
  $size = $_FILES['tfotojurusan']['size'];
  $filename = time(). "_" . $originalname;
  // echo $filename;
  // die();

$tambah = $koneksi->query("INSERT INTO tb_jurusan(nama_jurusan, foto_jurusan, deskripsi) VALUE ('$nama_jurusan', '$filename', '$deskripsi')");

  if ($tambah == True) {
    move_uploaded_file($lokasi, '../../asset/img/'.$filename);
    echo "<script>
              alert('Data berhasil disimpan')
              window.location.href = 'index.php?page=jurusan/index'
          </script>";
  }else{
    echo 'gagal';
  }
}
?>
