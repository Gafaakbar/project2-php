<?php 
$kontak = $koneksi->query('SELECT * FROM tb_kontak WHERE id_kontak=1')->fetch_array();
 ?>

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Halaman Kontak</h1>

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
      			<label>Nama Kontak</label>
      			<input type="text" name="tnama" class="form-control" value="<?= $kontak['nama']; ?>">
      		</div>
      	</div>
        <div class="col-md-12">
      		<div class="form-group">
      			<label>E-Mail</label>
      			<input type="email" name="temail" class="form-control" value="<?= $kontak['email']; ?>">
      		</div>
      	</div>
        <div class="col-md-12">
      		<div class="form-group">
      			<label>Nomor HP</label>
      			<input type="text" name="tnohp" class="form-control" value="<?= $kontak['nohp']; ?>">
      		</div>
      	</div>
        <div class="col-md-12">
      		<div class="form-group">
      			<label>Tanggal</label>
      			<input type="date" name="ttanggal" class="form-control" value="<?= $kontak['tanggal']; ?>">
      		</div>
      	</div>
       
      	<div class="col-md-12">
      		<div class="form-group">
      			<label>Deksripsi</label>
      			<textarea rows="10" cols="10" class="form-control" name="tdeskripsi"><?= $kontak['deskripsi']; ?></textarea>
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
  $nama = $_POST['tnama'];
  $email = $_POST['temail'];
  $nohp = $_POST['tnohp'];
  $tanggal = $_POST['ttanggal'];
  $deskripsi= $_POST['tdeskripsi'];

$kontak = $koneksi->query("UPDATE tb_kontak SET nama ='$nama', email = '$email', nohp = '$nohp', tanggal = '$tanggal', deskripsi='$deskripsi' WHERE id_kontak=1");

if ($kontak) {
  
  echo "<script>
  window.location='index.php?page=kontak/tampil_kontak'
  </script>";

  }else{
    echo 'gagal';
  }
}

 ?>