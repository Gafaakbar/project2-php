<?php
$dosen = $koneksi->query('SELECT * FROM tb_dosen');
?>


<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Tabel Data</h1>
<a href="index.php?page=dosen/tambah" class="btn btn-info btn-md">Tambah Data</a>
<br><br>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-info">Data Admin</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="table_dosen" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Dosen</th>
            <th>NIDN</th>
            <th>Jabatan</th>
            <th>Alamat</th>
            <th>Foto Dosen</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; ?>
          <?php foreach ($dosen as $key => $value) : ?>
            <tr>
              <td><?php echo $no++; ?></td>
              <td><?php echo $value['nama_dosen']; ?></td>
              <td><?php echo $value['nidn_dosen']; ?></td>
              <td><?php echo $value['jabatan']; ?></td>
              <td><?php echo $value['alamat']; ?></td>
              <td><img src="../../asset/img/<?= $value["foto_dosen"]; ?>" alt="dosen" width="80px" height="40px"></td>


              <td>
                <a href="?page=dosen/edit&id=<?php echo $value['id_dosen'] ?>" class="btn btn-warning btn-sm">Edit</a>
                <a onclick="return confirm('yakin di hapus?')" href="?page=dosen/hapus&id=<?php echo $value['id_dosen']; ?>" class="btn btn-danger btn-sm">Hapus</a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>


      </table>
    </div>

  </div>
</div>