<?php 
$testimoni = $koneksi->query('SELECT * FROM tb_testimoni');
 ?>

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Tabel Data</h1>
<a href="index.php?page=testimoni/tambah" class="btn btn-info btn-md">Tambah Data Testimoni</a>
<br><br>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-info">Data Testimoni</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Foto</th>
            <th>Pekerjaan</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; ?>
          <?php foreach ($testimoni as $key => $value) : ?>
          <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $value['nama']; ?></td>
            <td><img src="../../asset/img/<?= $value['foto'];?>" alt="foto" width="80px" height="40px"></td>
            <td><?php echo $value['pekerjaan']; ?></td>
            <td><?php echo $value['deskripsi']; ?></td>
            <td>
              <a href="?page=testimoni/edit&id=<?php echo $value['id_testimoni']; ?>" class="btn btn-warning btn-sm">Edit</a>
              <a onclick="return confirm('yakin di hapus?')" href="?page=testimoni/hapus&id=<?php echo $value['id_testimoni']; ?>" class="btn btn-danger btn-sm">Hapus</a>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

