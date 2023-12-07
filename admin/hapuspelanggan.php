<?php
// Koneksi ke database
$koneksi = new mysqli("localhost","root","","ujungpandang");


// Mendapatkan ID pelanggan dari parameter URL
$id_pelanggan = $_GET['id'];

// Menghapus pelanggan dari database
$hapus = $koneksi->query("DELETE FROM pelanggan WHERE id_pelanggan = '$id_pelanggan'");

echo "<script>alert('pelanggan berhasil dihapus');</script>";
echo "<script>location='index.php?halaman=pelanggan';</script>";

?>
