<?php 
$id_berita = $_GET['id']; 

$hapus = $koneksi->query("DELETE FROM tb_berita WHERE id_berita='$id_berita'");

if ($hapus) {
	
echo "<script>
alert('data berhasil di hapus')
window.location='index.php?page=berita/berita'
</script>";

}else{
	echo 'gagal';
}

?>