<h2>Tambah Menu</h2> <br>


<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control">
    </div>
    <div class="form-group">
        <label>Harga (Rp)</label>
        <input type="number" name="harga" class="form-control">
    </div>
    <div class="form-group">
        <label>Deskripsi</label>
        <textarea name="deskripsi" class="form-control" rows="10"></textarea>
    </div>
    <div class="form-group">
        <label>Foto</label>
        <input type="file" name="foto" class="form-control" width="100">    
    </div>
    <button class="btn btn-primary" name="save">Simpan</button>
</form>
<?php 
if (isset($_POST['save']))
{
    $namafoto = $_FILES['foto']['name'];
    $lokasifoto = $_FILES['foto']['tmp_name'];
    move_uploaded_file($lokasifoto, "../../img/".$namafoto);
    $koneksi->query("INSERT INTO menu (nama_menu,harga_menu,deskripsi_menu,gambar)
        VALUES ('$_POST[nama]','$_POST[harga]','$_POST[deskripsi]','$namafoto')");


    echo "<div class='alert alert-info'>Data tersimpan</div>";
    echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=menu'>";
}

?>