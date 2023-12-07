<!-- Navbar start -->
    <nav class="navbar">
        <a href="#" class="navbar-logo">Cafe<span>Ujung Pandang</span></a>

        <div class="navbar-nav">
            <a href="#home">Home</a>
            <a href="#about">About Us</a>
            <a href="#menu">Menu</a>
            <a href="#contact">Kontak</a>
            <?php if (isset($_SESSION["pelanggan"])): ?>
                <a href="logout.php">Logout</a>
      
            <?php else: ?>
                <a href="login.php">Login</a>
                <a href="daftar.php">Daftar</a>

            <?php endif ?>
            
        </div>

        <div class="navbar-extra">
            <button id="keranjang" onclick="window.location.href='keranjang.php'" name="keranjang"
                type="button">Keranjang</button>
        </div>
    </nav>

<!-- Navbar end -->