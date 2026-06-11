<?php 
    include 'config/koneksi.php';

    $query = mysqli_query($koneksi, "SELECT * FROM kendaraan");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- FONT START -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <!-- FONT END -->

    <!-- FEATER ICON START -->
    <script src="https://unpkg.com/feather-icons"></script>
    <!-- FEATER ICON END -->
    
    <link rel="stylesheet" href="assets/css/style.css" />
    <title>Rental Kendaraan</title>
</head>
<body>
    <!-- NAVBAR START -->
    <nav class="navbar-coustem">
        <div class="Logo">RENTAL KENDARAN</div>
            <div class="navbar-nav">
                <a href="#home" class="active">HOME</a>
                <a href="#about">TENTANG</a>
                <a href="#kendaraan">KENDARAAN</a>
            </div>
            <div class="btn-login">
                <a href="coustemer/login/register.php"><i data-feather="user"></i> Login -></a>
            </div>
    </nav>
    <!-- NAVBAR END -->

    <!-- HERO SECTION START -->
    <section class="hero" id="home">
        <main class="content"> 
            <h1>SEWA MOBIL</h1>
            <h2>DENGAN SYARAT MUDAH</h2>
            <p>Temukan berbagai pilihan kendaraan yang nyaman, terawat, <br> dan siap menemani perjalanan anda</p>
            <a href="#coustemer/login/register.php" class="cta">SEWA SEKARANG ></a>
            <div class="imgHero"><img src="assets/img/hero.png" alt="FOTO"></div>
        </main>
    </section>
    <!-- HERO SECTION END -->
    
    <!-- ABOUT START -->
    <section class="about" id="about">
        <h2>TENTANG KAMI</h2>
        <p>Rental Mobil menyediakan kendaraan yang nyaman, aman, dan terpercaya untuk berbagai kebutuhan perjalanan</p>
        <div class="card-container">
            <div class="card">
                <h2>Armada berkualitas</h2>
                <img src="assets/img/1car.png" alt="card-card">
                <p>Nikmati berbagai pilihan kendaraan yang selalu dirawat secara berkala untuk memastikan kenyamanan dan kemanan selama perjalanan</p>
            </div>
            <div class="card2">
                <h2>Harga terjangkau</h2>
                <img src="assets/img/money.png" alt="">
                <p>Nikmati layanan rental dengan harga yang kompetitif dan transparan tanpa biaya tambahan yang tersembunyi</p>
            </div>
            <div class="card2">
                <h2>Booking Mudah</h2>
                <img src="assets/img/booking.png" alt="">
                <p>Proses pemesanan cepat dan praktis. pilih kendaraan, tentukan tanggal sewa lalu lakukan pemesanan.</p>
            </div>
            <div class="card2">
                <h2>Layanan terpercaya</h2>
                <img src="assets/img/CS.png" alt="">
                <p>Didukung pelayanan yang ramah dan profoesional untuk membantu kebutuhan perjalanan anda kapan saja</p>
            </div>
        </div>
    </section>
    <!-- ABOUT END -->

    <!-- KENDARAAN PAGE START -->
    <section class="kendaraan" id="kendaraan">
        <h2>KENDARAAN KAMI</h2>
        <p>Pilih kendaraan yang sesuai dengan kebutuhan perjalanan anda, mulai dari mobil keluarga hingga kendaraan untuk keperluan bisnis.</p>
        <div class="card-kendaraan-container">
            <div class="card-kendaraan">
                <h2>ALPHARD</h2>
                <img src="assets/img/alphard.png" alt="">
                <p>MPV premium dengan kabin luas dan kenyamanan maksimal, cocok untuk perjalanan keluarga, tamu VIP, maupun kebutuhan bisnis.</p>
            </div>
            <div class="card-kendaraan">
                <h2>Avanza</h2>
                <img src="assets/img/avanza.png" alt="">
                <p>Kendaraan keluarga yang irit, nyaman, dan serbaguna. Cocok untuk perjalanan harian, wisata, maupun keperluan bersama keluarga.</p>
            </div>
            <div class="card-kendaraan">
                <h2>Civic</h2>
                <img src="assets/img/civic.png" alt="">
                <p>Sedan modern dengan desain sporty dan performa responsif, memberikan pengalaman berkendara yang nyaman dan berkelas</p>
            </div>
            <div class="card-kendaraan">
                <h2>BMW</h2>
                <img src="assets/img/bmw.png" alt="" class="bmw">
                <p>Mobil mewah dengan teknologi canggih, performa tinggi, dan kenyamanan premium untuk menunjang perjalanan yang eksklusif.</p>
            </div>
        </div>
    </section>
    <!-- KENDARAAN PAGE END -->

    <!-- feather icons -->
    <script> feather.replace(); </script>
    <!-- end feather icon js -->
    
    <!-- JavaScript start -->
    <script src="JavaScript/script.js"></script>
    <!-- JavaScript end -->
</body>
</html>