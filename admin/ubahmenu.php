<h2>Ubah Menu</h2> <br>

<?php
$ambil=$koneksi->query("SELECT * FROM menu WHERE id_menu='$_GET[id]'");
$pecah = $ambil->fetch_assoc();


?>

<form method="post" enctype="multipart/form-data" >
    <div class="form-group">
        <label>Id Menu</label>
        <input type="text" name="id" class="form-control" value="<?php echo $pecah['id_menu']; ?>">
    </div>
    <div class="form-group">
        <label>Nama Menu</label>
        <input type="text" name="nama" class="form-control" value="<?php echo $pecah['nama_menu']; ?>">
    </div>
    <div class="form-group">
        <label>Harga Rp</label>
        <input type="number" name="harga" class="form-control" value="<?php echo $pecah['harga_menu']; ?>">
    </div>
    <div class="form-group">
        <label>Deskripsi Menu</label>
        <textarea name="deskripsi" class="form-control" rows="10"><?php echo $pecah['deskripsi_menu']; ?></textarea>
    </div>
    <div class="form-group">
        <img src="../../img/<?php echo $pecah['gambar'] ?>" width="100">
    </div>
    <div class="form-group">
        <label>Ganti Foto</label>
        <input type="file" name="foto" class="form-control">
    </div>
    <button class="btn btn-primary" name="ubah">Ubah</button>
</form>

<?php
if (isset($_POST['ubah']))
{
    $namafoto = $_FILES['foto']['name'];
    $lokasifoto = $_FILES['foto']['tmp_name'];

    if (!empty("lokasifoto"))
    {
        move_uploaded_file($lokasifoto, "../../img/$namafoto");

        $koneksi->query("UPDATE menu SET nama_menu='$_POST[nama]',harga_menu='$_POST[harga]',deskripsi_menu='$_POST[deskripsi]',gambar='$namafoto'
        WHERE id_menu='$_GET[id]'");
    }
    else
    {
        $koneksi->query("UPDATE menu SET nama_menu='$_POST[nama]',harga_menu='$_POST[harga]',deskripsi_menu='$_POST[deskripsi]' WHERE id_menu='$_GET[id]'");    
    }

    echo "<script>alert('data menu telah diubah');</script>";
    echo "<script>location='index.php?halaman=menu';</script>";

}

?>