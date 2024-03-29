<?php
include "koneksi.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>About Us</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/ptkebuljaya.png" rel="icon">
    <link href="assets/img/ptkebuljaya.png" rel="apple-touch-icon">


    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/about-us.css" rel="stylesheet">
</head>

<body>

<!-- ======= Header ======= -->
<header id="header" class="fixed-top ">
<div class="container d-flex align-items-center">
    <a href="index.php" class="logo me-auto"><img src="assets/img/logoPt.png" alt="" class="img-fluid"></a>

    <nav id="navbar" class="navbar">
    <ul>
        <li><a class="nav-link" href="index.php">Home</a></li>
        <li><a class="nav-link" href="about-us.php">About</a></li>
        <li><a class="nav-link" href="artikel.php">Artikel</a></li>
        <li><a class="nav-link  " href="galeri.php">Galeri</a></li>
        <li><a class="nav-link" href="forum.php">Forum Diskusi</a></li>
        <?php
                    // Check if the user is logged in
                    if (isset($_SESSION['user_id'])) {
                        $user_id = $_SESSION['user_id'];
                    
                        // Fetch user data from the database based on user ID
                        $user_query = "SELECT * FROM user WHERE id_user = $user_id";
                        $user_result = $conn->query($user_query);
                    
                        if ($user_result && $user_result->num_rows > 0) {
                            $user_data = $user_result->fetch_assoc();
                            $username = $user_data['username'];
                    
                            // Display the customized profile link with the fetched username
                            echo '<li><a class="getstarted" href="profile.php"><i class="bi bi-person" style="font-size: 17px;"></i> ' . $username . '</a></li>';
                        }
                    } else {
                        // If not logged in, display the "Sign In" link
                        echo '<li><a class="getstarted" href="signin.php">Sign In</a></li>';
                    }
                    ?>
    </ul>
    <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->

</div>
</header><!-- End Header -->

<!-- ======= About Us Section ======= -->
<section id="about" class="about">
    <div class="container" data-aos="fade-up">

    <div class="section-title">
        <h2>Privacy policy</h2>
    </div>

    <div class="row content">
        <img src="assets/img/ptkebuljaya.png">
        <p class="tulisan">
            <span class="tulisan-sub-0">
                Kebijakan Privasi
                <br />
        
            </span>
            <span class="tulisan-sub-1">
        
                <br />
                Selamat datang di situs/web kami! Kami menghargai dan menjaga privasi pengunjung kami dengan sepenuh hati. Dalam
                teks ini, kami menjelaskan bagaimana kami mengumpulkan, menggunakan, dan melindungi informasi pribadi Anda saat
                mengunjungi situs ini.
                <br />
        
                <br />
        
            </span>
            <span class="tulisan-sub-2">
                Informasi yang Kami Kumpulkan:
                <br />
        
            </span>
            <span class="tulisan-sub-3">
        
                <br />
                1. Informasi Pribadi:
                <br />
                Saat Anda menggunakan situs kami, mungkin kami meminta Anda untuk memberikan informasi tertentu yang dapat
                diidentifikasi secara pribadi. Ini termasuk nama, alamat email, nomor telepon, dan informasi lainnya yang
                relevan.
                <br />
        
                <br />
                2. Log Files:
                <br />
                Seperti banyak situs web lainnya, kami menggunakan log files. Informasi dalam log files mencakup alamat IP,
                jenis browser, ISP (Internet Service Provider), tanggal dan waktu, serta halaman yang Anda kunjungi di situs
                kami.
                <br />
        
                <br />
                3. Cookies:
                <br />
                Kami menggunakan cookies untuk menyimpan informasi tentang preferensi pengunjung, mengikuti data lalu lintas di
                situs, dan mempersonalisasi pengalaman pengguna.
                <br />
        
                <br />
        
            </span>
            <span class="tulisan-sub-4">
                Penggunaan Informasi:
                <br />
        
            </span>
            <span class="tulisan-sub-5">
        
                <br />
                1. Meningkatkan Layanan:
                <br />
                Informasi yang kami kumpulkan digunakan untuk meningkatkan layanan kami, mempersonalisasi pengalaman pengguna,
                dan merespons permintaan pelanggan dengan lebih efektif.
                <br />
        
                <br />
                2. Keamanan:
                <br />
                Kami berkomitmen untuk menjaga keamanan informasi pribadi pengunjung. Tindakan keamanan telah diimplementasikan
                untuk mencegah akses tidak sah atau pengungkapan informasi tanpa izin.
                <br />
        
                <br />
                3. Pemberitahuan Perubahan:
                <br />
                Setiap kali kami memutuskan untuk mengubah kebijakan privasi, perubahan tersebut akan segera diberitahukan di
                halaman ini.
                <br />
        
                <br />
        
            </span>
            <span class="tulisan-sub-6">
                Keamanan Informasi:
                <br />
        
            </span>
            <span class="tulisan-sub-7">
        
                <br />
                Kami memprioritaskan keamanan informasi pribadi Anda. Kami menggunakan langkah-langkah fisik, elektronik, dan
                administratif yang sesuai untuk melindungi informasi pribadi yang kami kumpulkan dari akses yang tidak sah atau
                pengungkapan.
                <br />
        
                <br />
        
            </span>
            <span class="tulisan-sub-8">
                Hak Anda:
                <br />
        
            </span>
            <span class="tulisan-sub-9">
        
                <br />
                Anda memiliki hak untuk mengetahui informasi apa yang kami simpan tentang Anda dan bagaimana informasi tersebut
                digunakan. Jika Anda memiliki pertanyaan atau kekhawatiran tentang kebijakan privasi kami, jangan ragu untuk
                menghubungi kami.
                <br />
        
                <br />
                Terima kasih telah membaca Kebijakan Privasi kami. Kami berharap penjelasan ini memberikan gambaran yang jelas
                tentang cara kami melindungi dan menggunakan informasi pribadi pengunjung kami.
                <br />
        
            </span>
        </p>
    </div>

    </div>
</section><!-- End About Us Section -->

<footer id="footer">

    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-6 footer-contact">
                    <h3>Kebul Jaya</h3>
                    <p>
                        Jalan HM. Bachrun No.31, Tambaknegara, <br>
                        Kec. Rawalo, Kabupaten Banyumas, <br>
                        Jawa Tengah 53172 <br>
                        <strong>Phone:</strong> 081327951200<br>
                        <strong>Email:</strong> kebuljaya@gmail.com<br>
                    </p>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="index.php">Home</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="about-us.php">About us</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="galeri.php">Galeri</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="privacy.php">Privacy policy</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Our Services</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="data.php">Data Kemiskinan</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="forum.php">Forum</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="artikel.php">Artikel</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="galeri.php">Galeri</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Our Social Networks</h4>
                    <p>Ikuti jaringan sosial kami untuk mendapatkan pembaruan terkini dan terhubung dengan komunitas
                        kami.</p>
                    <div class="social-links mt-3">
                        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="container footer-bottom clearfix">
        <div class="copyright">
            &copy; 2024 Copyright <strong><span>PT Kebul Jaya</span></strong>. All Rights Reserved
        </div>
    </div>
</footer><!-- End Footer -->

<div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>

</body>

</html>