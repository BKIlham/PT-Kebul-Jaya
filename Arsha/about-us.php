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
        <li><a class="nav-link " href="data.php">Data</a></li>
        <li><a class="nav-link" href="artikel.php">Artikel</a></li>
        <li><a class="nav-link  " href="galeri.php">Galeri</a></li>
        <li><a class="nav-link" href="forum.php">Forum Diskusi</a></li>
        <li><a class="nav-link active" href="about-us.php">About</a></li>
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
        <h2>About Us</h2>
    </div>

    <div class="row content">
        <img src="assets/img/ptkebuljaya.png">
        <p>
            PT Kebul Jaya adalah penyedia informasi terkemuka tentang profil kemiskinan di Indonesia. Kami berkomitmen
            menyediakan data kemiskinan yang terpercaya, analisis mendalam mengenai faktor penyebab, dan berupaya
            meningkatkan kesadaran masyarakat. Tujuan kami juga melibatkan kolaborasi dengan lembaga dan organisasi untuk
            bersama-sama mengatasi kemiskinan di Indonesia. Kami menjembatani kesenjangan informasi mengenai kemiskinan melalui pendekatan yang holistik. Dengan fokus
            pada edukasi dan pemahaman, kami berharap dapat memberikan wawasan yang bermakna untuk mendukung kebijakan dan
            tindakan berkelanjutan. 
        </p>
        <p>
            <strong>Visi</strong><br>
            Menjadi sumber informasi terkemuka yang memajukan kesadaran dan pemahaman mengenai kemiskinan di Indonesia, serta mendorong partisipasi aktif dalam upaya pengentasan kemiskinan.
            <br>
        </p>
        <p>
            <strong>Misi</strong><br>
            <ol>
                <li>Menyajikan Data Akurat: Kami berkomitmen untuk menyediakan data kemiskinan yang terpercaya dan akurat, memastikan bahwa pengguna kami dapat mengandalkan informasi yang kami berikan.</li>
                <li>Analisis Mendalam: Kami menyajikan analisis yang mendalam mengenai faktor-faktor yang menyebabkan dan mempengaruhi kemiskinan di Indonesia, memberikan wawasan yang bermakna untuk mendukung kebijakan dan tindakan berkelanjutan.</li>
                <li>Pendidikan dan Kesadaran: Kami memiliki tujuan untuk meningkatkan tingkat kesadaran masyarakat tentang realitas kemiskinan di Indonesia. Kami menyediakan materi edukatif dan informasi yang dapat membantu masyarakat memahami dampak dan solusi yang mungkin.</li>
                <li>Kolaborasi dan Keterlibatan: Kami berusaha untuk membangun kemitraan dengan lembaga-lembaga, pemerintah, dan organisasi nirlaba yang memiliki tujuan serupa dalam mengatasi kemiskinan. Kolaborasi ini diharapkan dapat menciptakan sinergi yang kuat dalam upaya pengentasan kemiskinan.</li>
            </ol>
            <br>
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