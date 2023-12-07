<?php
session_start();

include 'koneksi.php';

if (!isset($_SESSION["pelanggan"]))
{
    echo "<script>alert('silahkan login');</script>";
    echo "<script>location='login.php';</script>";
}
if (empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"]))
{
    echo "<script>alert('keranjang kosong, silahkan belanja dulu');</script>";
    echo "<script>location='index.php';</script>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Checkout</title>

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
    <link rel="stylesheet" href="CSS/checkout.css" />
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
                    </tr>
                </thead>
                <tbody>
                    <?php $nomor=1; ?>
                    <?php $totalpembelian = 0; ?>
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
                      
                    </tr>
                    <?php $nomor++; ?>
                    <?php $totalpembelian+=$subharga; ?>
                    <?php endforeach ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th colspan="4">Total Belanja</th>
                    <th>Rp. <?php echo number_format($totalpembelian) ?></th>
                  </tr>
                </tfoot>
            </table>

            <form method="post">

              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <input type="text" readonly value="<?php echo $_SESSION["pelanggan"]['nama_pelanggan'] ?>" class="form-control">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <input type="text" readonly value="<?php echo $_SESSION["pelanggan"]['telepon_pelanggan'] ?>" class="form-control">
                  </div>
                </div>
              </div>
              <button class="btn btn-primary" name="checkout">Checkout</button> 
            </form>

            <?php
            if (isset($_POST["checkout"]))
            {
              $id_pelanggan = $_SESSION["pelanggan"]["id_pelanggan"];
              $tanggal_pembelian = date("Y-m-d");

              $total_pembelian = $totalpembelian;

              // menyimpan data ke tabel pembelian
              $koneksi->query("INSERT INTO pembelian (id_pelanggan,tanggal_pembelian,total_pembelian) VALUES ('$id_pelanggan','$tanggal_pembelian','$total_pembelian') ");

              // update id_pembelian terbaru
              $id_pembelian_barusan = $koneksi->insert_id;

              foreach ($_SESSION["keranjang"] as $id_menu => $jumlah)
              {
                $koneksi->query("INSERT INTO pembelian_menu (id_pembelian,id_menu,jumlah) VALUES ('$id_pembelian_barusan','$id_menu','$jumlah') ");
              }

              // kosong keranjangg yaa
              unset($_SESSION["keranjang"]);

              // selesaiiiiiii
              echo "<script>alert('Pembelian Sukses Kawannn');</script>";
              echo "<script>location='index.php';</script>";
            }

            ?>

          </div>
    </section>

</body>
</html>
