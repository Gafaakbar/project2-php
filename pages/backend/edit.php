<?php

$id_menu = $_GET['id_menu'];
$hasil = $con->query("SELECT * FROM tbl_menu WHERE id_menu='$id_menu'")->fetch_assoc();
$kafe = $con->query("SELECT * FROM tbl_kafe");

?>
<div class="container" style="padding-top:150px;">
    <div class="row">
        <div class="col-lg-12">
            <h4>Edit Admin</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <form action="#" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Nama Kafe</label>
                    <select name="id_kafe" class="form-control" required>
                        <option value="">-pilih Nama kafe-</option>
                        <?php foreach ($kafe as $key => $value) : ?>
                            <option value="<?= $value['id_kafe'] ?>" <?= $value['id_kafe'] == $hasil['id_kafe'] ? 'selected' : '' ?>><?= $value['nama_kafe'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Nama Menu</label>
                    <input type="text" class="form-control" aria-describedby="emailHelp" name="nama_menu" value="<?= $hasil['nama_menu'] ?>">
                </div>
                <div class="form-group">
                    <label>Harga Menu</label>
                    <input type="text" class="form-control" aria-describedby="emailHelp" name="harga_menu" value="<?= $hasil['harga_menu'] ?>">
                </div>
                <div class="form-group">
                    <label>Foto Menu</label>
                    <img src="<?= 'assets/img/' . $hasil['foto_menu'] ?>" alt="" width="50em">
                    <input type="file" class="form-control" aria-describedby="emailHelp" name="foto_menu">
                </div>
                <button type="submit" class="btn btn-primary" name="edit">Update</button>
            </form>
        </div>
    </div>
</div>

<?php

if (isset($_POST['edit'])) {
    $id_kafe = $_POST['id_kafe'];
    $nama_menu = $_POST['nama_menu'];
    $harga_menu = $_POST['harga_menu'];
    $foto_lama = $hasil['foto_menu'];
    if ($_FILES['foto_menu']['name'] == "") {
        $foto_menu = $foto_lama;
    } else {
        if ($foto_lama != 'coffe.jpg') {
            unlink('assets/img/' . $foto_lama);
        }
        $foto_menu = $_FILES['foto_menu']['name'];
        $tmp_foto = $_FILES['foto_menu']['tmp_name'];
        move_uploaded_file($tmp_foto, 'assets/img/' . $foto_menu);
    }

    $update = $con->query("UPDATE tbl_menu SET id_kafe='$id_kafe',nama_menu='$nama_menu',harga_menu='$harga_menu',foto_menu='$foto_menu' WHERE id_menu='$id_menu'");
    if ($update) {
        echo "<script>
                alert('Berhasil Diupdate')
                window.location='?page=pages/menu_kafe/index'
              </script>";
    } else {
        echo "<script>
        alert('Gagal Diupdate')
        window.location='?page=pages/menu_kafe/index'
        </script>";
    }
}


?>