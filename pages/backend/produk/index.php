<?php 
$produk = $koneksi->query('SELECT * FROM tb_produk');
 ?>

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Tabel Data</h1>
<button type="button" class="btn btn-info btn-sm mb-2" data-toggle="modal" data-target="#tambah"><i class="fas fa-plus-square"></i> Tambah Data</button>
<br><br>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-info">Data Produk</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Stok</th>
            <th>Harga</th>
            <th>Deskripisi Produk</th>
            <th>Foto Produk</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; ?>
          <?php foreach ($produk as $key => $value) : ?>
          <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $value['nama_produk']; ?></td>
            <td><?php echo $value['stok']; ?></td>
            <td><?php echo $value['harga']; ?></td>
            <td><?php echo $value['deskripsi_produk']; ?></td>
            <td>
              <img src="../../asset/img/<?= $value['foto_produk']; ?>" alt="fotoproduk" width="80px" height="40px">
            </td>
            <td>
              <a href="?page=produk/edit&id=<?php echo $value['id_produk'] ?>" class="btn btn-warning btn-sm">Edit</a>
              <a onclick="return confirm('yakin di hapus?')" href="?page=produk/hapus&id=<?php echo $value['id_produk'] ?>" class="btn btn-danger btn-sm">Hapus</a>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
  <div class="container my-auto">
    <div class="copyright text-center my-auto">
      <span>Copyright &copy; Your Website 2019</span>
    </div>
  </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->



 <!-- Modal -->
 <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Tambah Data Produk</h5>
                 <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">x</button>
             </div>
             <div class="modal-body">
                 <form action="#" method="POST" enctype="multipart/form-data">
                     <div class="form-group">
                         <label for="">Nama Produk</label>
                         <input type="text" name="nama_produk" class="form-control form-control-sm">
                     </div>
                     <div class="form-group">
                         <label for="">Stok</label>
                         <input type="text" name="stok" class="form-control form-control-sm">
                     </div>
                     <div class="form-group">
                         <label for="">Harga</label>
                         <input type="text" name="harga" class="form-control form-control-sm">
                     </div>
                     <div class="form-group">
                         <label for="">Deskripsi Produk</label>
                         <input type="text" name="deskripsi_produk" class="form-control form-control-sm">
                     </div>
                     <div class="form-group">
                         <label for="">Foto Produk</label>
                         <input type="file" name="foto_produk" class="form-control form-control-sm">
                     </div>
                     <div class="modal-footer">
                         <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                         <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                     </div>
                 </form>

                 <?php 
                 
                    if(isset($_POST['simpan'])) {

                        $nama_produk = $_POST['nama_produk'];
                        $stok = $_POST['stok'];
                        $harga = $_POST['harga'];
                        $deskripsi_produk = $_POST['deskripsi_produk'];

                        $originalname = $_FILES['foto_produk']['name'];
                        $lokasi = $_FILES['foto_produk']['tmp_name'];
                        $size = $_FILES['foto_produk']['size'];
                        $filename = time(). "_" . $originalname;

                        $simpan = $koneksi->query("INSERT INTO tb_produk (id_produk, nama_produk, stok, harga, deskripsi_produk, foto_produk)
                        VALUES ('$id_produk', '$nama_produk', '$stok', '$harga', '$deskripsi_produk', '$filename') ");



                        if ($simpan == True) {
                            move_uploaded_file($lokasi, '../../asset/img/'. $filename);
                            echo "<script>
                                     alert('Data Berhasil Disimpan')
                                     window.location='index.php?page=produk/index'
                                  </script>";
                        } else {
                            echo "<script>
                                     alert('Data Gagal Disimpan')
                                     window.location='index.php?page=produk/index'
                                  </script>";
                        }
                    }
                 ?>                 

                 
               
             </div>

         </div>
     </div>
 </div>