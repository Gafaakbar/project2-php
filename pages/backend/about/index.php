<?php 
$about = $koneksi->query('SELECT * FROM tb_about WHERE id_about=1')->fetch_array();
 ?>

<!-- untuk membuat ck editor -->
<script src="https://cdn.ckeditor.com/4.7.3/standard/ckeditor.js"></script>

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Halaman About</h1>

<div class="row">
<div class="col-md-12">
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-info">About</h6>
    </div>
    <div class="card-body">
      <form method="POST" action="">
      	<div class="row">
      	<div class="col-md-12">
      		<div class="form-group">
      			<label>Judul About</label>
      			<input type="text" name="tjudul" class="form-control" value="<?= $about['judul_about']; ?>">
      		</div>
      	</div>
      	<div class="col-md-12">
      		<div class="form-group">
      			<label>Deskripsi About</label>
      			<textarea class="ckeditor" name="tdeskripsi"><?= $about['deskripsi_about']; ?></textarea>
      		</div>
      		<button type="submit" name="update" class="btn btn-info btn-md">Update</button>
      	</div>
      </div>
   	 </div>
     </form>
  </div>
</div>
</div>

<?php 
if(isset($_POST['update'])){
  $judul = $_POST['tjudul'];
  $deskripsi = $_POST['tdeskripsi'];

$about = $koneksi->query("UPDATE tb_about SET judul_about='$judul', deskripsi_about='$deskripsi' WHERE id_about=1");

if ($about) {
  
  echo "<script>
            alert('Data Berhasil diubah')
            window.location='index.php?page=about/index'
        </script>";

  }else{
    echo "<script>
              alert('Data Berhasil diubah')
              window.location='index.php?page=about/index'
          </script>";
  }
}

 ?>