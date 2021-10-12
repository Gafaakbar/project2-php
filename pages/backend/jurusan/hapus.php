<?php 
$id_jurusan = $_GET['id']; 

$hapus = $koneksi->query("DELETE FROM tb_jurusan WHERE id_jurusan='$id_jurusan'");

if ($hapus) {
	
echo "<script>
		alert('Data berhasil di hapus')
		window.location='index.php?page=jurusan/index'
	  </script>";

}else{
	echo 'gagal';
}

?>