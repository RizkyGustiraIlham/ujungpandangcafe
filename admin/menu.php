<h2>Data Menu</h2> <br>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>no</th>
            <th>nama</th>
            <th>harga</th>
            <th>foto</th>
            <th>aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $nomor=1; ?>
        <?php $ambil=$koneksi->query("SELECT * FROM menu"); ?>
        <?php while($pecah = $ambil->fetch_assoc()){ ?>
        <tr>
            <td><?php echo $nomor; ?></td>
            <td><?php echo $pecah['nama_menu']; ?></td>
            <td><?php echo $pecah['harga_menu']; ?></td>
            <td>
                <img src="../../img/<?php echo $pecah['gambar']; ?>" width="100">
            </td>
            <td>
                <a href="index.php?halaman=hapusmenu&id=<?php echo $pecah['id_menu']; ?>" class="btn-danger btn">hapus</a>
                <a href="index.php?halaman=ubahmenu&id=<?php echo $pecah['id_menu']; ?>" class="btn btn-warning">ubah</a>
            </td>
        </tr>
        <?php $nomor++; ?>
        <?php } ?>
    </tbody>

</table>
<a href="index.php?halaman=tambahmenu" class="btn btn-primary" >Tambah Menu</a>