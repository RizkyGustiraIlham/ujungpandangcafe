<?php
session_start();
//koneksi ke database
include 'koneksi.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cafe Ujung Pandang</title>

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
    <link rel="stylesheet" href="CSS/style.css" />
    
</head>

<body>
    <?php include 'navbar.php'; ?>

    <!-- Hero  Section start-->
    <section class="hero" id="home">
        <main class="content">
            <h4>Wellcome to</h4>
            <h1>Restaurant & Cafe </h1>
            <p>Tasty, delicious food ready in restaurant. We respect your test review.</p>
            <button id="order" onclick="window.location.href='#contact'" name="order" type="button"
                onclick="Swal.fire('Selamat Datang')">Contact us</button>
        </main>
    </section>
    <!-- Hero  Section end-->

    <!-- About Section start -->
    <section id="about" class="about">
        <h2 data-aos="flip-left" data-aos-duration="2500"><span>About</span> Us</h2>

        <div class="row">
            <div class="about-img" data-aos="fade-right" data-aos-duration="2000">
                <img src="img/about .jpg" alt="about us" />
            </div>
            <div class="content">
                <h3 data-aos="fade-up" data-aos-duration="1000">Kenapa memilih kopi kami ?</h3>
                <p data-aos="fade-up" data-aos-duration="2000">
                    Kopi adalah minuman stimulan yang mengandung kafein. Kandungan
                    tersebut dapat meningkatkan energi, kewaspadaan, suasana hati, serta
                    fungsi otak.
                </p>
                <p data-aos="fade-up" data-aos-duration="3000">
                    Manfaat kopi yang paling populer di kalangan masyarakat adalah
                    penghilang rasa kantuk. Namun, tahukah kamu bahwa minuman dengan
                    rasa pahit ini juga menyimpan berbagai khasiat lain untuk kesehatan.
                </p>
            </div>
        </div>
    </section>
    <!-- About Section end -->

    <!-- Menu Section start -->
    <section id="menu" class="menu">
        <h2 data-aos="flip-left" data-aos-duration="2000"><span>Menu</span> Kami</h2>
        <p>this is our menu</p>

        <div class="row">

        <?php
        $ambil = $koneksi->query("SELECT * FROM menu");
        while ($permenu = $ambil->fetch_assoc()) {
        $gambar = $permenu['gambar']; // Ambil nilai gambar dari field "gambar"
        ?>
            <div class="menu-card" data-aos="zoom-in" data-aos-duration="1000">
                <img src="img/<?php echo $gambar; ?>" alt="<?php echo $permenu['nama_menu']; ?>"
                    class="menu-card-img" />
                <h3 class="menu-card-title">-<?php echo $permenu['nama_menu']; ?>-</h3>
                <p class="menu-card-price">Rp. <?php echo $permenu['harga_menu']; ?></p>
                <a href="order.php?id=<?php echo $permenu['id_menu']; ?>" class="btn btn-primary order-btn" id="order">Order</a>

            </div>
<?php } ?>


        </div>
    </section>

    <!-- Menu Section end -->

    <!-- Contact Section start -->
    <section id="contact" class="contact">
        <h2 data-aos="flip-left" data-aos-duration="2000"><span>Kontak</span> Kami</h2>
        <p>
            Get in touch
        </p>

        <div class="row">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d45134.9884112577!2d100.35691320853712!3d-0.8226785779822194!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2fd4c55f3123127b%3A0x90b5bcfaeffe6804!2sUjung%20pandang!5e0!3m2!1sid!2sid!4v1685104604304!5m2!1sid!2sid"
                width="700" height="700" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                data-aos="zoom-in-right" data-aos-duration="1000">
            </iframe>

            <form action="">
                <div class="input-group" data-aos="fade-left" data-aos-duration="800">
                    <h3><i data-feather="map-pin" id="map"></i>Our Office Address</h3>
                    <p data-aos="fade-up-right" data-aos-duration="800">
                        59P9+VJX, Jl. IAIN BARU, Balai Gadang, Kec. Koto Tangah, Kota Padang, Sumatera Barat 25586
                    </p>
                </div>
                <div class="input-group" data-aos="fade-left" data-aos-duration="1200">
                    <h3><i data-feather="mail" id="map"></i>General Enquiries</h3>
                    <p data-aos="fade-up-right" data-aos-duration="1200">
                        ujungpandang@gmail.com
                    </p>
                </div>
                <div class="input-group" data-aos="fade-left" data-aos-duration="1500">
                    <h3><i data-feather="phone" id="map"></i>Call Us</h3>
                    <p data-aos="fade-up-right" data-aos-duration="1500">
                        089687024672
                    </p>
                </div>
                <div class="input-group" data-aos="fade-left" data-aos-duration="1900">
                    <h3><i data-feather="clock" id="map"></i>Our Timing</h3>
                    <p data-aos="fade-up-right" data-aos-duration="1900">
                        Mon - Sun : 08:00 AM - 22:00 PM
                    </p>
                </div>
            </form>
        </div>
    </section>

    <!-- Contact Section end -->

    <!-- Footer start -->
    <footer>
        <div class="socials">
            <a href="#"><img src="img/fb.ico"><i class="fb"></i></a>
            <a href="https://instagram.com/ujungpandangcoffee?igshid=MzRlODBiNWFlZA=="><img src="img/ig.ico"><i
                    class="ig"></i></a>
            <a href="#"><img src="img/tw.ico"><i class="wa"></i></a>
        </div>

        <div class="links">
            <a href="#home">Home</a>
            <a href="#about">About Us</a>
            <a href="#menu">Menu</a>
            <a href="#contact">Kontak</a>
        </div>

        <div class="credit">
            <p>Created by <a href="">rizkyilham</a>. | &copy; 2023.
            </p>
        </div>
    </footer>

    <!-- Footer end -->

    <!-- Feather Icons -->
    <script>
    feather.replace();
    </script>

    <!-- My javascript -->
    <script src="js/script.js"></script>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
    AOS.init();
    </script>
</body>

</html>