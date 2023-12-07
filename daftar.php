<?php
session_start();

include 'koneksi.php';

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Daftar Pelanggan</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap"
    rel="stylesheet" />

  <!-- My Style -->
  <link rel="stylesheet" href="CSS/daftar.css" />
</head>

<body>
  
  <?php include 'navbar.php'; ?>

  <section class="hero" id="home"></section>
  <div class="container">
    <h1>Daftar</h1>
    <form method="post"><br>
      <label>Nama </label>
      <input type="text" name="nama" id="nama" required>
      <label>Email </label>
      <input type="email" name="email" id="email" required>
      <label>Password </label>
      <input type="text" name="password" id="password" required>
      <label>Telp/HP </label>
      <input type="text" name="telepon" id="telepon" required>
      <button name="daftar" id="daftar" >Daftar</button>
    </form>
  </div>
  
     <?php
    if (isset($_POST["daftar"]))
     {
          $nama = $_POST["nama"];
          $email = $_POST["email"];
          $password = $_POST["password"];
          $telepon = $_POST["telepon"];

          $ambil = $koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan='$email'");
          
          $yangcocok = $ambil->num_rows;
          if ($yangcocok==1)
          {
               echo "<script>alert('pendaftaran gagal, email sudah digunakan');</script>";
               echo "<script>location='daftar.php';</script>";
          }
          else
          {
               $koneksi->query("INSERT INTO pelanggan (nama_pelanggan,email_pelanggan,password_pelanggan,telepon_pelanggan) 
               VALUES ('$nama','$email','$password','$telepon') ");
               
               echo "<script>alert('pendaftaran sukses, silahkan login');</script>";
               echo "<script>location='login.php';</script>";
          }

     }

     ?>

</body>
</html>