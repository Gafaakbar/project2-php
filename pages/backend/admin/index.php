<?php 
$admin = $koneksi->query('SELECT * FROM tb_admin');
 ?>
      

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Tabel Data</h1>
<a href="index.php?page=admin/tambah" class="btn btn-info btn-md">Tambah Data</a>
<br><br>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-info">Data Admin</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No</th>
            <th>Username</th>
            <th>Password</th>
            <th>Nama Lengkap</th>
            <th>Email</th>
            <th>No Telepon</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; ?>
          <?php foreach ($admin as $key => $value) : ?>
          <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $value['username']; ?></td>
            <td><?php echo $value['password']; ?></td>
            <td><?php echo $value['nama_lengkap']; ?></td>
            <td><?php echo $value['email']; ?></td>
            <td><?php echo $value['no_telp']; ?></td>
            <td>
              <a href="?page=admin/edit&id=<?php echo $value['id_admin'] ?>" class="btn btn-warning btn-sm">Edit</a>
              <a onclick="return confirm('yakin di hapus?')" href="?page=admin/hapus&id=<?php echo $value['id_admin']; ?>" class="btn btn-danger btn-sm">Hapus</a>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

