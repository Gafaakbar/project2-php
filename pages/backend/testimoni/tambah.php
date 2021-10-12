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
          <label>Nama</label>
          <input type="text" name="tnama" class="form-control">
        </div>

        <div class="form-group">
          <label>Foto</label>
          <input type="file" name="tfoto" class="form-control">
        </div>

        <div class="form-group">
          <label>Pekerjaan</label>
          <input type="text" name="tpekerjaan" class="form-control">
        </div>

        <div class="form-group">
          <label>Deskripsi</label> <br>
          <textarea name="tdeskripsi" id="ckeditor" cols="70" rows="9"></textarea>
        </div>
        
        <button type="submit" name="tambah" class="btn btn-primary btn-md">Tambah</button>
      </form>
    </div>
  </div>
</div>


<?php 
if (isset($_POST['tambah'])){
  $nama = $_POST['tnama'];
  $pekerjaan = $_POST['tpekerjaan'];
  $deskripsi = $_POST['tdeskripsi'];
 
  $originalname = $_FILES['tfoto']['name'];
  $lokasi = $_FILES['tfoto']['tmp_name'];
  $size = $_FILES['tfoto']['size'];
  $filename = time(). "_" . $originalname;
  // echo $filename;
  // die();

$tambah = $koneksi->query("INSERT INTO tb_testimoni(nama, foto, pekerjaan, deskripsi) VALUE ('$nama', '$filename', '$pekerjaan', '$deskripsi')");

  if ($tambah == True) {
    move_uploaded_file($lokasi, '../../asset/img/'.$filename);
    echo "<script>
              alert('Data berhasil disimpan')
              window.location.href = 'index.php?page=testimoni/index'
          </script>";
  }else{
    echo 'gagal';
  }
}
?>
