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
  <title>Login Pelanggan</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap"
    rel="stylesheet" />

  <!-- My Style -->
  <link rel="stylesheet" href="CSS/login.css" />
</head>

<body>
  
  <?php include 'navbar.php'; ?>

  <section class="hero" id="home"></section>
  <div class="container">
    <h1>Login</h1>
    <form method="post"><br>
      <label>Email </label>
      <input type="email" name="email" id="email">
      <label>Password </label>
      <input type="password" name="password" id="password">
      <button name="login" id="login"   onclick="Swal.fire('Selamat Datang')" >Login</button>
    </form>
  </div>
  
  <?php
    if (isset($_POST["login"]))
    {
      $email = $_POST["email"];
      $password = $_POST["password"];

      $ambil = $koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan='$email' AND password_pelanggan='$password'");

      $akunyangcocok = $ambil->num_rows;

      if ($akunyangcocok==1)
      {
        $akun = $ambil->fetch_assoc();
        $_SESSION["pelanggan"] = $akun;
        echo "<script>alert('anda sukses login');</script>";
        echo "<script>location='checkout.php';</script>";
      }
      else
      {
        echo "<script>alert('anda gagal login, periksa akun anda');</script>";
        echo "<script>location='login.php';</script>";
      }

    }

  ?>

</body>


</html>