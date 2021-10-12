<?php 
$id_admin = $_GET['id']; 
$admin = $koneksi->query("SELECT * FROM tb_admin WHERE id_admin='$id_admin'")->fetch_array();
?>

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Form Data</h1>

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-info">Tambah Data</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <form action="" method="POST">
        <div class="form-group">
          <label>Username</label>
          <input type="text" name="username" class="form-control" value="<?= $admin['username'] ?>">
        </div>
        <div class="form-group">
          <label>Password</label>
          <input type="password" name="password" class="form-control" value="<?= $admin['password'] ?>">
        </div>
        <div class="form-group">
          <label>Nama Lengkap</label>
          <input type="text" name="nama_lengkap" class="form-control" value="<?= $admin['nama_lengkap'] ?>">
        </div>
        <div class="form-group">
          <label>Email</label>
          <input type="text" name="email" class="form-control" value="<?= $admin['email'] ?>">
        </div>
        <div class="form-group">
          <label>No Telepon</label>
          <input type="number" name="no_telp" class="form-control" value="<?= $admin['no_telp'] ?>">
        </div>
        <button type="submit" name="update" class="btn btn-primary btn-md">Update</button>
      </form>
    </div>
  </div>
</div>


<?php 
if (isset($_POST['update'])){
  $username = $_POST['username'];
  $password= $_POST['password'];
  $nama_lengkap = $_POST['nama_lengkap'];
  $email = $_POST['email'];
  $no_telp = $_POST['no_telp'];

  $ubah = $koneksi->query("UPDATE tb_admin SET username='$username', password='$password', nama_lengkap='$nama_lengkap', email='$email', no_telp='$no_telp' WHERE id_admin='$id_admin'");

  if ($ubah) {
    echo "<script>
              alert('Data berhasil diubah')
              window.location.href = 'index.php?page=admin/index'
          </script>";
  }else{
    echo 'gagal';
  }
}
?>
