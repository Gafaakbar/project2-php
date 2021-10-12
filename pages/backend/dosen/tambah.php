  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Form Data</h1>

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-info">Tambah Data</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <label>Nama Dosen</label>
          <input type="text" name="nama_dosen" class="form-control">
        </div>
        <div class="form-group">
          <label>NIDN Dosen</label>
          <input type="text" name="nidn_dosen" class="form-control">
        </div>
        <div class="form-group">
          <label>Jabatan</label>
          <input type="text" name="jabatan" class="form-control">
        </div>
        <div class="form-group">
          <label>Alamat</label>
          <input type="text" name="alamat" class="form-control">
        </div>
        <div class="form-group">
          <label>Foto Dosen</label>
          <input type="file" name="foto_dosen" class="form-control">
        </div>
        <button type="submit" name="tambah" class="btn btn-primary btn-md">Tambah</button>
      </form>
    </div>
  </div>
</div>


<?php 
if (isset($_POST['tambah'])){
  $nama_dosen = $_POST['nama_dosen'];
  $nidn_dosen = $_POST['nidn_dosen'];
  $jabatan = $_POST['jabatan'];
  $alamat = $_POST['alamat'];
  $originalname = $_FILES['foto_dosen']['name'];
  $lokasi = $_FILES['foto_dosen']['tmp_name'];
  $size = $_FILES['foto_dosen']['size'];
  $filename = time(). "_" . $originalname;
  // echo $filename;
  // die();

$tambah = $koneksi->query("INSERT INTO tb_dosen(nama_dosen, nidn_dosen, jabatan, alamat, foto_dosen) VALUES ('$nama_dosen', '$nidn_dosen', '$jabatan', '$alamat', '$filename')");

  if ($tambah == True) {
    move_uploaded_file($lokasi, '../../asset/img/'.$filename);
    echo "<script>
              alert('Data berhasil disimpan')
              window.location.href = 'index.php?page=dosen/index'
          </script>";
  }else{
    echo 'gagal';
  }
}
?>
