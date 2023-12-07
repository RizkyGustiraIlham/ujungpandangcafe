<h2>Detail Pembelian</h2> <br>
<?php
$ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan
    ON pembelian.id_pelanggan=pelanggan.id_pelanggan
    WHERE pembelian.id_pembelian='$_GET[id]'");
$detail = $ambil->fetch_assoc();
?>

<strong><?php echo $detail['nama_pelanggan']; ?></strong> <br>
<p>  
    <?php echo $detail['telepon_pelanggan']; ?> <br>
    <?php echo $detail['email_pelanggan']; ?>
</p>   

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Id Pembelian</th>
            <th>Tanggal</th>
            <th>Harga</th>
        </tr>
    </thead>
    <tbody>
        <?php $nomor=1; ?>
        <?php $ambil=$koneksi->query("SELECT * FROM pembelian"); ?>
        <?php while($detail = $ambil->fetch_assoc()){ ?>

        
        <tr>
            <td><?php echo $nomor; ?></td>
            <td><?php echo $detail['id_pembelian']; ?></td>
            <td><?php echo $detail['tanggal_pembelian']; ?></td>
            <td><?php echo $detail['total_pembelian']; ?></td>
        </tr>
            <?php $nomor++; ?>
        <?php } ?>
    </tbody>
</table>
