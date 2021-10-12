<?php 
$id_dosen = $_GET['id']; 

$hapus = $koneksi->query("DELETE FROM tb_dosen WHERE id_dosen='$id_dosen'");

if ($hapus) {
	
echo "<script>
alert('data berhasil di hapus')
window.location='index.php?page=dosen/index'
</script>";

}else{
	echo 'gagal';
}

?>