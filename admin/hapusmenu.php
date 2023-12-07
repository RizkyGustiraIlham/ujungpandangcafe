<?php

$ambil = $koneksi->query("SELECT * FROM menu WHERE id_menu='$_GET[id]'");
$pecah = $ambil->fetch_assoc();
$gambar = $pecah['gambar'];
if (file_exists("../../img/$gambar"))
{
    unlink("../../img/$gambar");
}

$koneksi->query("DELETE FROM menu WHERE id_menu='$_GET[id]'");

echo "<script>alert('menu terhapus');</script>";
echo "<script>location='index.php?halaman=menu';</script>";

?>
