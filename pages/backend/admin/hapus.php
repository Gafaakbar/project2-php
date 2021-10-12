<?php 
$id_admin = $_GET['id']; 

$hapus = $koneksi->query("DELETE FROM tb_admin WHERE id_admin='$id_admin'");

if ($hapus) {
	
echo "<script>
alert('data berhasil di hapus')
window.location='index.php?page=admin/index'
</script>";

}else{
	echo 'gagal';
}

?>