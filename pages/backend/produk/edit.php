<?php
$id_produk = $_GET['id'];
$produk = $koneksi->query("SELECT * FROM tb_produk WHERE id_produk='$id_produk'")->fetch_array();

?>

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Form Data</h1>

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-info">Edit Data</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <form action="#" method="POST" enctype="multipart/form-data">

        <input type="hidden" name="id_produk" value="<?= $produk['id_produk']; ?>">


        <div class="form-group">
          <label>Nama Produk</label>
          <input type="text" name="nama_produk" class="form-control" value="<?= $produk['nama_produk'] ?>">
        </div>
        <div class="form-group">
          <label>Stok</label>
          <input type="text" name="stok" class="form-control" value="<?= $produk['stok'] ?>">
        </div>
        <div class="form-group">
          <label>Harga</label>
          <input type="text" name="harga" class="form-control" value="<?= $produk['harga'] ?>">
        </div>
        <div class="form-group">
          <label>Deskripsi Produk</label>
          <input type="text" name="deskripsi_produk" class="form-control" value="<?= $produk['deskripsi_produk'] ?>">
        </div>

        <div class="form-group">
          <img src="../../asset/img/<?= $produk['foto_produk'] ?>" alt="foto_produk" width="80px" height="40px">
        </div>

        <div class="form-group">
          <input type="hidden" name="foto_produklama" class="form-control" value="<?= $produk['foto_produk'] ?>">
        </div>
        <div class="form-group">
          <label>Foto Produk</label>
          <input type="file" name="foto_produk" class="form-control">
        </div>
        <button type="submit" name="update" class="btn btn-primary btn-md">Update</button>
      </form>
    </div>
  </div>
</div>


<?php
if (isset($_POST['update'])) {

  $id_produk = $_POST['id_produk'];
  $nama_produk = $_POST['nama_produk'];
  $stok = $_POST['stok'];
  $harga = $_POST['harga'];

  $fotolama       = $_POST['foto_produklama'];
  $originalname   = $_FILES['foto_produk']['name'];
  $lokasi         = $_FILES['foto_produk']['tmp_name'];
  $size           = $_FILES['foto_produk']['size'];
  $filename       = time() . "_" . $originalname;

  $deskripsi_produk = $_POST['deskripsi_produk'];

  if ($size > 1000000) {
    echo "<script>
            alert('data Max 1 Mb')
            window.location='?page=produk/edit&id=" . $id_produk . "'
         </script>";
  } else {
    if (!empty($lokasi)) {
      unlink("../../asset/img/" . $fotolama);
      move_uploaded_file($lokasi, "../../asset/img/" . $filename);

      $update = $koneksi->query("UPDATE tb_produk SET nama_produk = '$nama_produk', stok = '$stok', harga = '$harga', foto_produk = '$filename', deskripsi_produk = '$deskripsi_produk' WHERE id_produk = '$id_produk'");
    } else {
      $update = $koneksi->query("UPDATE tb_produk SET nama_produk = '$nama_produk', stok = '$stok', harga = '$harga', foto_produk = '$filename', deskripsi_produk = '$deskripsi_produk' WHERE id_produk = '$id_produk'");
    }
    if ($update == True) {
      echo "<script>
              alert('Data Berhasil Diedit')
              window.location='?page=produk/index'
            </script>";
    } else {
      echo "<script>
      alert('Data Berhasil Diedit')
      window.location='?page=produk/edit&id=" . $id_produk . "'
    </script>";
    } 
    
    }
  }



  

?>