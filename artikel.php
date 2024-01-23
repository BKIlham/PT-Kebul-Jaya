<?php
include 'koneksi.php';
session_start();
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

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="assets/css/styleberita.css" rel="stylesheet">
</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top " style="background-color: #3d4d6a;">
        <div class="container d-flex align-items-center">
            <a href="index.php" class="logo me-auto"><img src="assets/img/logoPt.png" alt="" class="img-fluid"></a>
    
            <nav id="navbar" class="navbar">
                <ul>
                <li><a class="nav-link" href="index.php">Home</a></li>
                <li><a class="nav-link " href="data.php">Data</a></li>
                <li><a class="nav-link active" href="artikel.php">Artikel</a></li>
                <li><a class="nav-link  " href="galeri.php">Galeri</a></li>
                <li><a class="nav-link" href="forum.php">Forum Diskusi</a></li>
                <li><a class="nav-link" href="about-us.php">About</a></li>
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


    <!-- Featured News Slider Start -->
    <div class="container-fluid pt-5 mb-3" style="margin-top: 90px;">
    <div class="container mt-4">
    <?php
     if (isset($_SESSION['user_id'])) {
                        $user_id = $_SESSION['user_id'];
                    
                        // Fetch user data from the database based on user ID
                        $user_query = "SELECT * FROM user WHERE id_user = $user_id";
                        $user_result = $conn->query($user_query);
                    
                        if ($user_result && $user_result->num_rows > 0) {
                        ?>
                        <div class="jumbotron" style="background-color:white">
                          <h1 class="display-4">Punya Kisah Sukses?</h1>
                          <p class="lead">Bagikan kisah sukses Anda dan inspirasi orang lain! Kirimkan cerita Anda dan biarkan dunia tahu perjalanan luar biasa Anda.</p>
                          <hr class="my-4">
                          <p>Ini adalah kesempatan untuk memotivasi dan memberikan inspirasi kepada orang lain. Yuk, bagikan kisah sukses Anda sekarang!</p>
                          <a class="btn btn-primary btn-lg" href="UpKisahSukses.php" role="button">Submit Kisah Sukses</a>
                        </div>
                      </div>
                        <?php
                        }
                    }
    ?>
        <div class="container">
            <div class="section-title">
                <h4 class="m-0 text-uppercase font-weight-bold">Rekomendasi Artikel</h4>
            </div>
            <div class="owl-carousel news-carousel carousel-item-4 position-relative">
                <?php
                    $sql = "SELECT a.id_artikel, SUBSTRING(a.judul, 1, 35) AS judul_pendek, a.kategori, a.id_user, SUBSTRING(a.isi, 1, 35) AS isi_pendek, a.waktu_dibuat, f.id_foto, f.nama 
                    FROM Artikel a
                    LEFT JOIN foto_artikel f ON a.id_artikel = f.id_artikel
                    ORDER BY a.waktu_dibuat DESC";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                         while ($row = $result->fetch_assoc()) {
                ?>
                <div class="position-relative overflow-hidden" style="height: 300px;">
                    <img class="img-fluid h-100" src="img/<?= $row["nama"] ?>" style="object-fit: cover;">
                    <div class="overlay">
                        <div class="mb-2">
                            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                href=""><?= $row["kategori"] ?></a>
                            <a class="text-white" href=""><small><?= $row["waktu_dibuat"] ?></small></a>
                        </div>
                        <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold" href="artikelread.php?id=<?= $row["id_artikel"] ?>"><?= $row["judul_pendek"] ?>...</a>
                    </div>
                </div>
                <?php
                         }
                    }
                ?>
            </div>
        </div>
    </div>
    <!-- Featured News Slider End -->


    <!-- News With Sidebar Start -->
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-12">
                            <div class="section-title">
                                <h4 class="m-0 text-uppercase font-weight-bold">Artikel Terbaru</h4>
                            </div>
                        </div>
                        <?php
                            $sql = "SELECT a.id_artikel, SUBSTRING(a.judul, 1, 35) AS judul_pendek, a.kategori, a.id_user, p.username, p.foto AS user_foto, SUBSTRING(a.isi, 1, 70) AS isi_pendek, a.waktu_dibuat, a.kehangatan, f.id_foto, f.nama AS foto_artikel
                            FROM artikel a
                            JOIN user p ON a.id_user = p.id_user
                            LEFT JOIN foto_artikel f ON a.id_artikel = f.id_artikel
                            ORDER BY a.waktu_dibuat DESC";

                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                 while ($row = $result->fetch_assoc()) {
                        ?>
                        <div class="col-lg-6">
                            <div class="position-relative mb-3">
                                <img class="img-fluid w-100" src="img/<?=  $row["foto_artikel"] ?>" style="object-fit: cover;">
                                <div class="bg-white border border-top-0 p-4">
                                    <div class="mb-2">
                                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                            href=""><?= $row["kategori"] ?></a>
                                        <a class="text-body" href=""><small><?= $row["waktu_dibuat"] ?></small></a>
                                    </div>
                                    <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold"
                                        href="artikelread.php?id=<?= $row["id_artikel"] ?>"><?= $row["judul_pendek"] ?>...</a>
                                    <p class="m-0"><?= $row["isi_pendek"] ?>...</p>
                                </div>
                                <div class="d-flex justify-content-between bg-white border border-top-0 p-4">
                                    <div class="d-flex align-items-center">
                                        <img class="rounded-circle mr-2" src="img/user/<?= $row["user_foto"] ?>" width="25" height="25"
                                            alt="">
                                        <small><?= $row["username"] ?></small>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <small class="ml-3"><i class="far fa-eye mr-2"></i><?= $row["kehangatan"] ?></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                                 }
                            }
                        ?>
                       
                    </div>
                </div>

                <div class="col-lg-4">
                    

                    <!-- Popular News Start -->
                    <div class="mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold">Terpopuler</h4>
                        </div>
                        <div class="bg-white border border-top-0 p-3">
                            <?php
                            $sql = "SELECT a.id_artikel, SUBSTRING(a.judul, 1, 25) AS judul_pendek, a.kategori, a.id_user, p.username, p.foto AS user_foto, SUBSTRING(a.isi, 1, 25) AS isi_pendek, a.waktu_dibuat, a.kehangatan, f.id_foto, f.nama AS foto_artikel
                                FROM Artikel a
                                LEFT JOIN user p ON a.id_user = p.id_user
                                LEFT JOIN foto_artikel f ON a.id_artikel = f.id_artikel
                                ORDER BY a.kehangatan DESC";
                            
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                     while ($row = $result->fetch_assoc()) {
                            ?>
                            <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                                <img class="img-fluid" src="img/<?= $row["foto_artikel"] ?>" alt="" style="height: 110px; width: 110px; object-fit: cover;">
                                <div
                                    class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                    <div class="mb-2">
                                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2"
                                            href=""><?= $row["kategori"] ?></a>
                                        <a class="text-body" href=""><small><?= $row["waktu_dibuat"] ?></small></a>
                                    </div>
                                    <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="artikelread.php?id=<?= $row["id_artikel"] ?>"><?= $row["judul_pendek"] ?>...</a>
                                </div>
                            </div>
                            <?php
                                     }
                                }
                            ?>
                        </div>
                    </div>
                    <!-- Popular News End -->

                    
                        </div>
                    </div>
                    <!-- Tags End -->
                </div>
            </div>
        </div>
    </div>
    <!-- News With Sidebar End -->


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
    
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="assets/js/mainberita.js"></script>
</body>

</html>