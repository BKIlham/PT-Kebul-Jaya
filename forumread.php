<?php
include "koneksi.php";
session_start();
function time_elapsed_string($datetime, $full = false)
{
    $now = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
    $ago = new DateTime($datetime, new DateTimeZone('Asia/Jakarta'));

    $diff = $now->diff($ago);

    $diffInSeconds = $diff->s + $diff->i * 60 + $diff->h * 3600 + $diff->days * 86400;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );

    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . ($diff->$k > 1 ? $v . 's' : $v);
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) {
        $string = array_slice($string, 0, 1);
    }

    $result = implode(', ', $string) . ' ago';

    // Handle the case when the time is less than a minute
    if ($diffInSeconds < 60) {
        $result = 'just now';
    }

    return $result;
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
    <link href="assets/css/forum.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css"
    integrity="sha256-46r060N2LrChLLb5zowXQ72/iKKNiw/lAmygmHExk/o=" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background-color: #f3f5fa;">

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top ">
        <div class="container d-flex align-items-center">
            <a href="index.php" class="logo me-auto"><img src="assets/img/logoPt.png" alt="" class="img-fluid"></a>

            <nav id="navbar" class="navbar" style="font-family: Open Sans, sans-serif;">
                <ul>
                    <li><a class="nav-link" href="index.php">Home</a></li>
                    <li><a class="nav-link " href="data.php">Data</a></li>
                    <li><a class="nav-link" href="artikel.php">Artikel</a></li>
                    <li><a class="nav-link  " href="galeri.php">Galeri</a></li>
                    <li><a class="nav-link active" href="forum.php">Forum Diskusi</a></li>
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

    
    <div class="container forum" style="margin-top:100px">
    
                    <div class="inner-main-body p-2 p-sm-3 collapse forum-content show">
                        <?php
                        if (isset($_GET['id'])) {
                            $topic_id = $_GET['id'];
                        
                            // Fetch topic details
                            $topic_sql = "SELECT user.username as creator_username, user.foto as creator_foto,
                                                  Topik.judul as topik_judul, Topik.deskripsi as topik_deskripsi,
                                                  Topik.waktu_dibuat as topik_waktu_dibuat
                                           FROM Topik
                                           JOIN user ON Topik.id_user = user.id_user
                                           WHERE Topik.id_topik = $topic_id";
                        
                            $topic_result = $conn->query($topic_sql);
                        
                            if ($topic_result->num_rows > 0) {
                                $topic_row = $topic_result->fetch_assoc();
                                ?>
                                <div class="card mb-2">
                                    <div class="card-body p-2 p-sm-3">
                                        <div class="media forum-item">
                                            <a href="#" data-toggle="collapse" data-target=".forum-content"><img
                                                    src="img/user/<?=$topic_row['creator_foto']?>"
                                                    class="mr-3 rounded-circle" width="50" alt="User" /></a>
                                            <div class="media-body">
                                                <h6><?=$topic_row['topik_judul']?></h6>
                                                <p class="text-secondary">
                                                    <?=$topic_row['topik_deskripsi']?>
                                                </p>
                                                <p class="text-muted"><span class="text-secondary font-weight-bold"><?= time_elapsed_string($topic_row['topik_waktu_dibuat'])?></span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                // Fetch replies
                                $replies_sql = "SELECT user.username as replier_username, user.foto as replier_foto,
                                                        Balasan.isi_balasan as balasan_isi, Balasan.waktu_dibuat as balasan_waktu
                                                 FROM Balasan
                                                 JOIN user ON Balasan.id_user = user.id_user
                                                 WHERE Balasan.id_topik = $topic_id
                                                 ORDER BY Balasan.waktu_dibuat ASC";
                        
                                $replies_result = $conn->query($replies_sql);
                        
                                if ($replies_result->num_rows > 0) {
                                    echo "<h3>Replies:</h3>";
                        
                                    while ($reply_row = $replies_result->fetch_assoc()) {
                                        ?>
                                        <div class="card mb-2">
                                            <div class="card-body p-2 p-sm-3">
                                                <div class="media forum-item">
                                                    <a href="#" data-toggle="collapse" data-target=".forum-content"><img
                                                            src="img/user/<?=$reply_row['replier_foto']?>"
                                                            class="mr-3 rounded-circle" width="50" alt="User" /></a>
                                                    <div class="media-body">
                                                        <p class="text-secondary">
                                                            <?=$reply_row['balasan_isi']?>
                                                        </p>
                                                        <p class="text-muted"><span class="text-secondary font-weight-bold"><?= time_elapsed_string($reply_row['balasan_waktu'])?></span></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                } else {
                                    echo "<p>No replies yet.</p>";
                                }
                            } else {
                                echo "Topic not found.";
                            }
                        } else {
                            echo "Topic ID not provided.";
                        }
                        ?>
                    </div>
        <form action="createbalasan.php" method="post">
            <div class="modal-body">
                <input type="hidden" value="<?=$topic_id?>" name="id_topik">
                <div class="form-group">
                    <label for="threadDescription">Deskripsi</label>
                    <textarea class="form-control summernote" id="threadDescription" name="deskripsi"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" style="background-color:#3d4d6a!important;border-color:#3d4d6a;">Post</button>
                </div>
            </div>
        </form>
    </div>
    </div>
    
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
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>