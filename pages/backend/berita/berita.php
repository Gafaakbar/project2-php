<?php
$berita = $koneksi->query('SELECT * FROM tb_berita');
?>


<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Tabel Data</h1>
<a href="index.php?page=berita/tambah" class="btn btn-info btn-md">Tambah Data</a>
<br><br>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-info">Data Berita</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="table_dosen" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Foto</th>
            <th>Penulis</th>
            <th>Tanggal</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; ?>
          <?php foreach ($berita as $key => $value) : ?>
            <tr>
              <td><?php echo $no++; ?></td>
              <td><?php echo $value['judul']; ?></td>
              <td>
                  <img src="../../asset/img/<?= $value["foto"]; ?>" alt="foto_berita" width="80px" height="40px">
             
              </td>
                   
              <td><?php echo $value['penulis']; ?></td>
              <td><?php echo $value['tanggal']; ?></td>
              <td><?php echo $value['deskripsi']; ?></td>
              <td>
                <a href="?page=berita/edit&id=<?php echo $value['id_berita'] ?>" class="btn btn-warning btn-sm">Edit</a> <br>
                <br>
                <a onclick="return confirm('yakin di hapus?')" href="?page=berita/hapus&id=<?php echo $value['id_berita']; ?>" class="btn btn-danger btn-sm">Hapus</a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>


      </table>
    </div>

  </div>
</div>