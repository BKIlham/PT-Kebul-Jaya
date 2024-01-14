<?php
// Menggabungkan file koneksi.php
include 'koneksi.php';

// Query untuk mengambil data nama foto, judul artikel, dan ID artikel
$sql = "SELECT a.id_artikel, a.judul, f.nama AS foto_artikel
        FROM artikel a
        LEFT JOIN foto_artikel f ON a.id_artikel = f.id_artikel
        ORDER BY a.waktu_dibuat DESC";

$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Kebul Jaya</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/ptkebuljaya.png" rel="icon">
    <link href="assets/img/ptkebuljaya.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

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

</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top "style="background-color: #3d4d6a;">
        <div class="container d-flex align-items-center">
            <a href="index.php" class="logo me-auto"><img src="assets/img/logoPt.png" alt="" class="img-fluid"></a>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link" href="index.php">Home</a></li>
                    <li><a class="nav-link" href="about-us.php">About</a></li>
                    <li><a class="nav-link" href="artikel.php">Artikel</a></li>
                    <li><a class="nav-link active" href="galeri.php">Galeri</a></li>
                    <li><a class="nav-link" href="forum.php">Forum Diskusi</a></li>
                    <li><a class="getstarted" href="signin.php">Sign In</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
        <div class="container" data-aos="fade-up">
    
            <div class="section-title" style="margin-top: 100px;">
                <h2>Galeri</h2>
                <p>Potret kehidupan sehari-hari masyarakat yang terpengaruh oleh kemiskinan. Setiap gambar menceritakan kisah,
                menggambarkan perjuangan, ketahanan, dan keberanian individu dan keluarga yang berusaha mengatasi keterbatasan ekonomi.</p>
            </div>
    
            <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
                <?php
                if ($result->num_rows > 0) {
                    // Output data of each row
                    while ($row = $result->fetch_assoc()) {
                ?>
                <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                    <div class="portfolio-img"><img src="img/<?= $row["foto_artikel"] ?>" class="img-fluid" alt="">
                    </div>
                    <div class="portfolio-info">
                        <h4><?= $row["judul"] ?></h4>
                        <a href="img/<?= $row["foto_artikel"] ?>" data-gallery="portfolioGallery"
                            class="portfolio-lightbox preview-link" title="<?= $row["judul"] ?>"><i class="bx bx-plus"></i></a>
                        <a href="artikelread.php?id=<?= $row["id_artikel"] ?>" class="details-link" title="More Details"><i
                                class="bx bx-link"></i></a>
                    </div>
                </div>
                <?php
                    }
                }
                ?>
    
            </div>
    
        </div>
    </section><!-- End Portfolio Section -->



    <!-- ======= Footer ======= -->
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
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

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