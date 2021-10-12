<?php 
$id_testimoni = $_GET['id']; 
$testimoni = $koneksi->query("SELECT * FROM tb_testimoni WHERE id_testimoni='$id_testimoni'")->fetch_array();
?>

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Form Data</h1>

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-info">Edit Data</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
    <form action="" method="POST" enctype="multipart/form-data">

      <input type="hidden" name="id_testimoni" value="<?= $testimoni['id_testimoni']; ?>">

        <div class="form-group">
          <label>Nama</label>
          <input type="text" name="tnama" class="form-control" value="<?= $testimoni['nama']; ?>">
        </div>
        
        <div class="form-group">
          <img src="../../asset/img/<?= $testimoni['foto']; ?>" alt="foto" width="80px" height="40px">
        </div>

        <div class="form-group">
          <input type="hidden" name="tfoto_lama" class="form-control" value="<?= $testimoni['foto']; ?>">
        </div>

        <div class="form-group">
          <label>Foto</label>
          <input type="file" name="tfoto" class="form-control" value="<?= $testimoni['foto']; ?>">
        </div>

        <div class="form-group">
          <label>Pekerjaan</label>
          <input type="text" name="tpekerjaan" class="form-control" value="<?= $testimoni['pekerjaan']; ?>">
        </div>

        <div class="form-group">
          <label>Deskripsi</label>
          <input type="text" name="tdeskripsi" class="form-control" value="<?= $testimoni['deskripsi']; ?>">
        </div>
        <button type="submit" name="update" class="btn btn-primary btn-md">Update</button>
      </form>
    </div>
  </div>
</div>


<?php 

if (isset($_POST['update'])){
  $nama = $_POST['tnama'];
  $pekerjaan= $_POST['tpekerjaan'];
  $deskripsi = $_POST['tdeskripsi'];
  
  $fotolama       = $_POST['tfoto_lama'];
  $originalname   = $_FILES['tfoto']['name'];
  $lokasi         = $_FILES['tfoto']['tmp_name'];
  $size           = $_FILES['tfoto']['size'];
  $filename       = time() . "_" . $originalname;

  // $ubah = $koneksi->query("UPDATE tb_dosen SET nama_dosen='$nama_dosen', nidn_dosen='$nidn_dosen', alamat='$alamat', foto_dosen='$filename' WHERE id_dosen='$id_dosen'");

  if ($size > 1000000) {
    echo "<script>
            alert('data Max 1 Mb')
            window.location='?page=testimoni/edit&id=" . $id_testimoni . "'
          <script/>";
  } else {
    if (!empty($lokasi)) {
      unlink("../../asset/img/" . $fotolama);
      move_uploaded_file($lokasi, "../../asset/img/" . $filename);

      $update = $koneksi->query("UPDATE tb_testimoni SET nama='$nama', foto='$filename', pekerjaan = '$pekerjaan', deskripsi='$deskripsi' WHERE id_testimoni='$id_testimoni'");

    } else {

      // untuk foto lama
      $filename = $_POST['tfoto_lama'];

      $update = $koneksi->query("UPDATE tb_testimoni SET nama='$nama', foto='$filename', pekerjaan = '$pekerjaan', deskripsi='$deskripsi' WHERE id_testimoni='$id_testimoni'");

      
    }
    if ($update) {
      echo "<script>
              alert('Data Berhasil Diedit')
              window.location='?page=testimoni/index'
            </script>";
    } else {
      echo "<script>
              alert('Data Gagal Diedit')
              window.location='?page=testimoni/edit&id=" . $id_testimoni . "'
    </script>";
    } 
    
    }
  }

?>
