<?php
session_start();

include 'koneksi.php';


if (empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"]))
{
    echo "<script>alert('keranjang kosong, silahkan order dulu');</script>";
    echo "<script>location='index.php';</script>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Keranjang Belanja</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap"
        rel="stylesheet" />

    <!-- animasi -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>

    <!-- My Style -->
    <link rel="stylesheet" href="CSS/keranjang.css" />
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css"/>
    
</head>

<body>
    <?php include 'navbar.php'; ?>

    <section class="konten">
        <div class="container">
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <h1>Keranjang Belanja</h1>
            <br>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Menu</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Subharga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nomor=1; ?>
                    <?php foreach ($_SESSION["keranjang"] as $id_menu => $jumlah): ?>
                    <?php
                    $ambil = $koneksi->query("SELECT * FROM menu WHERE id_menu='$id_menu'");
                    $pecah = $ambil->fetch_assoc();
                    $subharga = $pecah["harga_menu"]*$jumlah;
                    ?>

                    <tr>
                        <td><?php echo $nomor; ?></td>
                        <td><?php echo $pecah["nama_menu"]; ?></td>
                        <td>Rp. <?php echo number_format($pecah["harga_menu"]); ?></td>
                        <td><?php echo $jumlah; ?></td>
                        <td>Rp. <?php echo number_format($subharga); ?></td>
                        <td>
                          <a href="hapuskeranjang.php?id=<?php echo $id_menu ?>" class="btn btn-danger btn-xs">hapus</a>
                        </td>
                    </tr>
                    <?php $nomor++; ?>
                    <?php endforeach ?>
                </tbody>
            </table>

            <a href="index.php" class="btn btn-primary">Lanjutkan Belanja</a>
            <a href="checkout.php" class="btn btn-primary">Checkout</a>
            
        </div>
    </section>
</body>

</html>
