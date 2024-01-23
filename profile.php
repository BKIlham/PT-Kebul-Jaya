<?php
session_start();
include 'koneksi.php';

// Check if the user is logged in
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    // Fetch user data from the database based on user ID
    $query = "SELECT * FROM user WHERE id_user = $user_id";
    $result = mysqli_query($conn, $query);

    // Check if the query was successful
    if ($result) {
        $user_dataya = mysqli_fetch_assoc($result);

    } else {
        // Handle query error
        echo "Error: " . mysqli_error($conn);
    }
} else {
    // Redirect to the login page if the user is not logged in
    header("Location: login.php");
    exit();
}
$isEdit = isset($_GET['edit']);
$success_message = $error_message = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Mengambil data dari formulir
    $new_username = $_POST['username'];
    $new_first_name = $_POST['first_name'];
    $new_last_name = $_POST['last_name'];
    $new_email = $_POST['email'];

    // Mengelola pembaruan foto profil jika diunggah
    if ($_FILES['profile_picture']['error'] === 0) {
        // Menghapus foto profil lama jika ada
        if ($user_data['foto'] !== 'user.jpg') {
            $old_profile_picture_path = 'img/user/' . $user_data['foto'];
            unlink($old_profile_picture_path);
        }

        // Mengelola unggahan foto profil baru
        $new_profile_picture_name = $user_id . '.jpg';
        $new_profile_picture_path = 'img/user/' . $new_profile_picture_name;
        move_uploaded_file($_FILES['profile_picture']['tmp_name'], $new_profile_picture_path);

        // Mengupdate nama file foto profil di database
        $update_foto_query = "UPDATE user SET foto = '$new_profile_picture_name' WHERE id_user = $user_id";
        $update_foto_result = mysqli_query($conn, $update_foto_query);

        if (!$update_foto_result) {
             $error_message = "Database query failed while updating profile picture: " . mysqli_error($conn);
        }
    }

    // Mengupdate data pengguna ke database
    $update_user_query = "UPDATE user SET username = '$new_username', first_name = '$new_first_name', last_name = '$new_last_name', email = '$new_email' WHERE id_user = $user_id";
    $update_user_result = mysqli_query($conn, $update_user_query);

    if ($update_user_result) {
        // Pembaruan berhasil
        $success_message = "Berhasil Merubah";
        header('Location: profile.php?edit');
        exit();
    } else {
        // Mengatasi kesalahan kueri
        $error_message = "Database query failed while updating user: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">


    <title>Kebul Jaya</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/styleprofile.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

</head>

<body style="background-color: hsl(0, 0%, 96%);">

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center" style="height: 59.9844px">
        <a href="index.php" class="logo me-auto"><img src="assets/img/logoPt.png" alt="" class="img-fluid"></a>

        <nav id="navbar" class="navbar" style="font-family: Open Sans, sans-serif;vertical-align: middle;padding-bottom: 8px;padding-left: 16px;padding-right: 16px;padding-top: 8px;margin-top:25px">
            <ul>
                <li><a class="nav-link" href="index.php" style="text-decoration:none;">Home</a></li>
                <li><a class="nav-link" href="about-us.php" style="text-decoration:none;">About</a></li>
                <li><a class="nav-link" href="artikel.php" style="text-decoration:none;">Artikel</a></li>
                <li><a class="nav-link" href="galeri.php" style="text-decoration:none;">Galeri</a></li>
                <li><a class="nav-link" href="forum.php" style="text-decoration:none;">Forum Diskusi</a></li>
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
                ?>
                <?php
                        // Display the customized profile link with the fetched username
                        echo '<li><a class="getstarted" href="profile.php"><i class="bi bi-person"></i> ' . $username . '</a></li>';
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

    <div class="container bootstrap snippets bootdey" style="margin-top: 120px; margin-bottom: 25px;">
    <div class="row" style="background-color:white">
        <div class="profile-nav col-md-3">
            <div class="panel">
                <div class="user-heading round">
                    <a href="#">
                        <img src="img/user/<?= $user_data['foto']?>" alt="">
                    </a>
                    <h1><?= $user_data['username']?></h1>
                    <p><?= $user_data['email']?></p>
                </div>

                <ul class="nav nav-pills nav-stacked">
                    <li style="width:100%"<?php if (!$isEdit): ?> class="active" <?php endif; ?>><a href="profile.php"> <i class="fa fa-user"></i> Profile</a></li>
                    <li style="width:100%"<?php if ($isEdit): ?> class="active" <?php endif; ?>><a href="?edit"> <i class="fa fa-edit"></i> Edit profile</a></li>
                    <li style="width:100%"><a href="logout.php"> <i class="bi bi-box-arrow-right"></i> Log Out</a></li>
                </ul>
            </div>
        </div>
        <div class="profile-info col-md-9">
            <div class="panel">
                <div class="bio-graph-heading">
                    Bersyukur adalah cara terbaik agar merasa cukup, bahkan ketika berkekurangan. Jangan berharap lebih sebelum berusaha lebih.
                </div>
                <div class="panel-body bio-graph-info">
                    <?php if ($isEdit): ?>
                    <div class="container">
                        <h2>Edit Profile</h2>
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
                        <form action="profile.php?edit" method="post" enctype="multipart/form-data">
                            <!-- Username -->
                            <div class="form-group">
                                <label for="username">Username:</label>
                                <input type="text" class="form-control" style="max-width:500px" id="username" name="username" value="<?= $user_data['username']?>" required>
                            </div>
                
                            <!-- First Name -->
                            <div class="form-group">
                                <label for="first_name">First Name:</label>
                                <input type="text" class="form-control"  style="max-width:500px"  id="first_name" name="first_name" value="<?= $user_data['first_name']?>" required>
                            </div>
                
                            <!-- Last Name -->
                            <div class="form-group">
                                <label for="last_name">Last Name:</label>
                                <input type="text" class="form-control"  style="max-width:500px"  id="last_name" name="last_name" value="<?= $user_data['last_name']?>" required>
                            </div>
                
                            <!-- Email -->
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control"  style="max-width:500px"  id="email" name="email" value="<?= $user_data['email']?>" required>
                            </div>
                
                            <!-- Profile Picture -->
                            <div class="form-group">
                                <label for="profile_picture">Profile Picture:</label>
                                <input type="file" class="form-control-file" id="profile_picture" name="profile_picture">
                            </div>
                
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </form>
                    </div>
                    <?php else: ?>
                    <h1>Bio Graph</h1>
                    <div class="row">
                        <div class="bio-row">
                            <p><span>Username </span>: <?= $user_data['username']?></p>
                        </div>
                        <div class="bio-row">
                            <p><span>First Name </span>: <?= $user_data['first_name']?></p>
                        </div>
                        <div class="bio-row">
                            <p><span>Email </span>: <?= $user_data['email']?></p>
                        </div>
                        <div class="bio-row">
                            <p><span>Last Name </span>: <?= $user_data['last_name']?></p>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    </div>

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

    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</body>
</html>