<?php
$jurusan = $koneksi->query('SELECT * FROM tb_jurusan');
?>


<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Daftar Jurusan</h1>
<a href="index.php?page=jurusan/tambah" class="btn btn-info btn-md">Tambah Data</a>
<br><br>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-info">Data Jurusan</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="table_dosen" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Jurusan</th>
            <th>Foto Jurusan</th>
            <th>Deksripsi</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; ?>
          <?php foreach ($jurusan as $key => $value) : ?>
            <tr>
              <td><?php echo $no++; ?></td>
              <td><?php echo $value['nama_jurusan']; ?></td>
              <td><img src="../../asset/img/<?= $value["foto_jurusan"]; ?>" alt="jurusan" width="80px" height="40px"></td>
              <td><?php echo $value['deskripsi']; ?></td>
              


              <td>
                <a href="?page=jurusan/edit&id=<?php echo $value['id_jurusan'] ?>" class="btn btn-warning btn-sm">Edit</a>
                <a onclick="return confirm('yakin di hapus?')" href="?page=jurusan/hapus&id=<?php echo $value['id_jurusan']; ?>" class="btn btn-danger btn-sm">Hapus</a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>


      </table>
    </div>

  </div>
</div>