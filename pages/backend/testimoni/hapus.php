<?php 
$id_testimoni = $_GET['id']; 

$hapus = $koneksi->query("DELETE FROM tb_testimoni WHERE id_testimoni='$id_testimoni'");

if ($hapus) {
	
echo "<script>
alert('data berhasil di hapus')
window.location='index.php?page=testimoni/index'
</script>";

}else{
	echo 'gagal';
}

?>