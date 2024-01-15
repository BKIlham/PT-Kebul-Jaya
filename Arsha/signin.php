<?php
include "koneksi.php";
// Initialize session
session_start();
if (isset($_SESSION['user_id'])) {
    header("Location: profile.php");
    exit();
}
// Define variables to store success and error messages
$success_message = $error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate input fields (check if they are not empty)
    if (empty($email) || empty($password)) {
        $error_message = "Semua kolom harus diisi";
    } else {
        // Check if the user with the given email exists
        $check_user_query = "SELECT * FROM user WHERE email = '$email'";
        $result = $conn->query($check_user_query);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            // Verify the password
            if (password_verify($password, $row['password'])) {
                // Set session variables
                $_SESSION['user_id'] = $row['id_user'];
                $_SESSION['username'] = $row['username'];

                $success_message = "Login berhasil";
                // Redirect to the user's dashboard or any other page after successful login
                header("Location: profile.php");
                exit();
            } else {
                $error_message = "Password salah";
            }
        } else {
            $error_message = "Email tidak terdaftar";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Sign In</title>
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

<body style="background-color: hsl(0, 0%, 96%);">

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top "style="background-color: #3d4d6a;">
        <div class="container d-flex align-items-center">
            <a href="index.php" class="logo me-auto"><img src="assets/img/logoPt.png" alt="" class="img-fluid"></a>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link" href="index.php">Home</a></li>
                    <li><a class="nav-link" href="about-us.php">About</a></li>
                    <li><a class="nav-link" href="artikel.php">Artikel</a></li>
                    <li><a class="nav-link" href="galeri.php">Galeri</a></li>
                    <li><a class="nav-link" href="forum.php">Forum Diskusi</a></li>
                    <li><a class="getstarted" href="signin.php">Sign In</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <!-- Section: Design Block -->
    <section class="">
        <!-- Jumbotron -->
        <div class="px-4 py-5 px-md-5 text-center text-lg-start" style="background-color: hsl(0, 0%, 96%);margin-top: 50px;">
            <div class="container">
                <div class="row gx-lg-5 align-items-center">
                    <div class="col-lg-6 mb-5 mb-lg-0">
                        <h1 class="my-5 display-3 fw-bold ls-tight">
                            Pantau Data Kemiskinan<br />
                            <span class="text-primary">di Indonesia</span>
                        </h1>
                        Dengan Sign In, Anda akan membuka akses ke informasi terkini tentang tingkat kemiskinan di Indonesia.
                        Temukan data yang relevan, bergabung dalam diskusi forum, dan baca berita terbaru untuk mendapatkan wawasan menyeluruh.
                        Ayo bersama-sama berkontribusi melawan kemiskinan.
                        </p>
                    </div>
    
                    <div class="col-lg-6 mb-5 mb-lg-0">
                        <div class="card">
                            <div class="card-body py-5 px-md-5">
                                <!-- Display success message -->
                                <?php if (!empty($success_message)) : ?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert" style="background-color: #0d6efd; color: white;">
                                        <?php echo $success_message; ?>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php endif; ?>
                                
                                <!-- Display error message -->
                                <?php if (!empty($error_message)) : ?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert" style="background-color: #dc3545; color: white;">
                                        <?php echo $error_message; ?>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php endif; ?>

                                <!-- Section: Design Block -->
                                <form action="signin.php" method="post">
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example3">Email address</label>
                                        <input type="email" id="form3Example3" name="email" class="form-control" />
                                    </div>
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example4">Password</label>
                                        <input type="password" id="form3Example4" name="password" class="form-control" />
                                    </div>
                                    <div class="d-flex justify-content-center mb-4">
                                        <button type="submit" class="btn btn-primary btn-block mb-4">
                                            Sign In
                                        </button>
                                    </div>
                                    <div class="text-center">
                                        <p>Butuh Akun ?</p>
                                        <a href="signup.php">Sign Up</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Jumbotron -->
    </section>
    <!-- Section: Design Block -->



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