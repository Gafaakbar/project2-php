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
          <input type="tect" name="username" class="form-control">
        </div>
        <div class="form-group">
          <label>Password</label>
          <input type="password" name="password" class="form-control">
        </div>
        <div class="form-group">
          <label>Nama Lengkap</label>
          <input type="text" name="nama_lengkap" class="form-control">
        </div>
        <div class="form-group">
          <label>Email</label>
          <input type="text" name="email" class="form-control">
        </div>
        <div class="form-group">
          <label>No Telepon</label>
          <input type="number" name="no_telp" class="form-control">
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

$tambah = $koneksi->query("INSERT INTO tb_admin(username, password, nama_lengkap, email, no_telp) VALUE ('$username', '$password', '$nama_lengkap', '$email', '$no_telp')");

  if ($tambah) {
    echo "<script>
              alert('Data berhasil disimpan')
              window.location.href = 'index.php?page=admin/index'
          </script>";
  }else{
    echo 'gagal';
  }
}
?>
