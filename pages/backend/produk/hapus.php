<?php 
$id_produk = $_GET['id']; 

$hapus = $koneksi->query("DELETE FROM tb_produk WHERE id_produk='$id_produk'");

if ($hapus) {
	
echo "<script>
alert('data berhasil di hapus')
window.location='index.php?page=produk/index'
</script>";

}else{
	echo 'gagal';
}

?>