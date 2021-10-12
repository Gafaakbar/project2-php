<?php 
$id_jurusan = $_GET['id']; 
$jurusan = $koneksi->query("SELECT * FROM tb_jurusan WHERE id_jurusan='$id_jurusan'")->fetch_array();
?>

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Form Data</h1>

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-info">Tambah Data Jurusan</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
    <form action="" method="POST" enctype="multipart/form-data">

      <input type="hidden" name="id_jurusan" value="<?= $jurusan['id_jurusan']; ?>">

        <div class="form-group">
          <label>Nama Jurusan</label>
          <input type="text" name="tnamajurusan" class="form-control" value="<?= $jurusan['nama_jurusan'] ?>">
        </div>
        

        <div class="form-group">
          <img src="../../asset/img/<?= $jurusan['foto_jurusan'] ?>" alt="foto" width="80px" height="40px">
        </div>

        <div class="form-group">
          <input type="hidden" name="tfotojurusan_lama" class="form-control" value="<?= $jurusan['foto_jurusan'] ?>">
        </div>

        <div class="form-group">
          <label>Foto Jurusan</label>
          <input type="file" name="tfotojurusan" class="form-control" value="<?= $jurusan['foto_jurusan'] ?>">
        </div>

        <div class="form-group">
          <label>Deskripsi</label>
          <input type="text" name="tdeskripsi" class="form-control" value="<?= $jurusan['deskripsi'] ?>">
        </div>

        <button type="submit" name="update" class="btn btn-primary btn-md">Update</button>
      </form>
    </div>
  </div>
</div>


<?php 

if (isset($_POST['update'])){
  $nama_jurusan = $_POST['tnamajurusan'];
  $deskripsi = $_POST['tdeskripsi'];
  
  
  $fotolama       = $_POST['tfotojurusan'];
  $originalname   = $_FILES['tfotojurusan']['name'];
  $lokasi         = $_FILES['tfotojurusan']['tmp_name'];
  $size           = $_FILES['tfotojurusan']['size'];
  $filename       = time() . "_" . $originalname;

 

  if ($size > 1000000) {
    echo "<script>
            alert('data Max 1 Mb')
            window.location='?page=jurusan/edit&id=" . $id_jurusan . "'
          <script/>";
  } else {
    if (!empty($lokasi)) {
      unlink("../../asset/img/" . $fotolama);
      move_uploaded_file($lokasi, "../../asset/img/" . $filename);

      $update = $koneksi->query("UPDATE tb_jurusan SET nama_jurusan='$nama_jurusan', foto_jurusan='$filename', deskripsi='$deskripsi' WHERE id_jurusan='$id_jurusan'");

    } else {

      // untuk foto lama, maksudnya jika user tidak update foto
      $filename = $_POST['tfotojurusan_lama'];

      $update = $koneksi->query("UPDATE tb_jurusan SET nama_jurusan='$nama_jurusan', foto_jurusan='$filename', deskripsi='$deskripsi' WHERE id_jurusan='$id_jurusan'");

    }
    if ($update) {
      echo "<script>
              alert('Data Berhasil Diedit')
              window.location='?page=jurusan/index'
            </script>";
    } else {
      echo "<script>
              alert('Data Gagal Diedit')
              window.location='?page=jurusan/edit&id=" . $id_jurusan . "'
            </script>";
    } 
    
    }
  }

?>
