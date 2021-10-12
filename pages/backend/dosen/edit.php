<?php 
$id_dosen = $_GET['id']; 
$dosen = $koneksi->query("SELECT * FROM tb_dosen WHERE id_dosen='$id_dosen'")->fetch_array();
?>

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Form Data</h1>

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-info">Tambah Data</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
    <form action="" method="POST" enctype="multipart/form-data">

      <input type="hidden" name="id_dosen" value="<?= $dosen['id_dosen']; ?>">

        <div class="form-group">
          <label>Nama Dosen</label>
          <input type="text" name="tnama" class="form-control" value="<?= $dosen['nama_dosen'] ?>">
        </div>
        <div class="form-group">
          <label>NIDN Dosen</label>
          <input type="text" name="tnidn" class="form-control" value="<?= $dosen['nidn_dosen'] ?>">
        </div>
        <div class="form-group">
          <label>Jabatan</label>
          <input type="text" name="tjabatan" class="form-control" value="<?= $dosen['jabatan'] ?>">
        </div>
        <div class="form-group">
          <label>Alamat</label>
          <input type="text" name="talamat" class="form-control" value="<?= $dosen['alamat'] ?>">
        </div>

        <div class="form-group">
          <img src="../../asset/img/<?= $dosen['foto_dosen'] ?>" alt="foto" width="80px" height="40px">
        </div>

        <div class="form-group">
          <input type="hidden" name="tfoto_lama" class="form-control" value="<?= $dosen['foto_dosen'] ?>">
        </div>

        <div class="form-group">
          <label>Foto Dosen</label>
          <input type="file" name="tfoto" class="form-control" value="<?= $dosen['foto_dosen'] ?>">
        </div>
        <button type="submit" name="update" class="btn btn-primary btn-md">Update</button>
      </form>
    </div>
  </div>
</div>


<?php 

if (isset($_POST['update'])){
  $nama_dosen = $_POST['tnama'];
  $nidn_dosen= $_POST['tnidn'];
  $alamat = $_POST['talamat'];
  $jabatan = $_POST['tjabatan'];
  
  $fotolama       = $_POST['tfoto'];
  $originalname   = $_FILES['tfoto']['name'];
  $lokasi         = $_FILES['tfoto']['tmp_name'];
  $size           = $_FILES['tfoto']['size'];
  $filename       = time() . "_" . $originalname;

  // $ubah = $koneksi->query("UPDATE tb_dosen SET nama_dosen='$nama_dosen', nidn_dosen='$nidn_dosen', alamat='$alamat', foto_dosen='$filename' WHERE id_dosen='$id_dosen'");

  if ($size > 1000000) {
    echo "<script>
            alert('data Max 1 Mb')
            window.location='?page=dosen/edit&id=" . $id_dosen . "'
          <script/>";
  } else {
    if (!empty($lokasi)) {
      unlink("../../asset/img/" . $fotolama);
      move_uploaded_file($lokasi, "../../asset/img/" . $filename);

      $update = $koneksi->query("UPDATE tb_dosen SET nama_dosen='$nama_dosen', nidn_dosen='$nidn_dosen', jabatan = '$jabatan', alamat='$alamat', foto_dosen='$filename' WHERE id_dosen='$id_dosen'");

    } else {

      // untuk foto lama
      $filename = $_POST['tfoto_lama'];

      $update = $koneksi->query("UPDATE tb_dosen SET nama_dosen='$nama_dosen', nidn_dosen='$nidn_dosen', jabatan = '$jabatan', alamat='$alamat', foto_dosen='$filename' WHERE id_dosen='$id_dosen'");
      
    }
    if ($update) {
      echo "<script>
              alert('Data Berhasil Diedit')
              window.location='?page=dosen/index'
            </script>";
    } else {
      echo "<script>
      alert('Data Gagal Diedit')
      window.location='?page=dosen/edit&id=" . $id_dosen . "'
    </script>";
    } 
    
    }
  }



  

?>
