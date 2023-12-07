<?php
session_start();

$koneksi = new mysqli("localhost","root","","ujungpandang");

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login Admin</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap"
    rel="stylesheet" />

  <!-- My Style -->
  <link rel="stylesheet" href="CSS/loginAdmin.css" />
</head>

<body>

  <section class="hero" id="home"></section>
  <div class="container">
    <h1>Admin</h1>
    <form method="post"><br>
      <label>User </label>
      <input type="text" name="user" id="user">
      <label>Password </label>
      <input type="password" name="pass" id="pass">
      <button name="login" id="login">Login</button>
    </form>

    <?php
    if (isset($_POST['login']))
      {
        $ambil = $koneksi->query("SELECT * FROM admin WHERE username ='$_POST[user]' AND password ='$_POST[pass]'");
        $yangcocok = $ambil->num_rows;
        if ($yangcocok==1)
        {
            $_SESSION['admin'] = $ambil->fetch_assoc();
            echo "<div class='alert alert-info'>Login Sukses</div>";
            echo "<meta http-equiv='refresh' content='1;url=index.php'>";
        }
        else
        {
            echo "<div class='alert alert-danger'>Login Gagal</div>";
            echo "<meta http-equiv='refresh' content='1;url=login.php'>";
        }
      }
    ?>
  </div>
  
</body>


</html>

       
