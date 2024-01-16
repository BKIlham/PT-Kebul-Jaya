<?php
include "koneksi.php";
session_start();
if(isset($_GET['order'])) {
    // Mendapatkan ID artikel dari parameter URL
    $order = $_GET['order'];
} else {
    $order = 1;
}
$success_message = '';
if (isset($_GET['success'])) {
    if ($_GET['success'] === 'create') {
        $success_message = 'Topik berhasil dibuat.';
    } elseif ($_GET['success'] === 'update') {
        $success_message = 'Topik berhasil diubah.';
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

    
    <div class="container forum">
        <div class="main-body p-0">
            <div class="inner-wrapper">
    
                <div class="inner-sidebar">
                <?php
                if (isset($_SESSION['user_id'])) {
                ?>
                    <div class="inner-sidebar-header justify-content-center">
                        <button class="btn btn-primary has-icon btn-block" type="button" data-toggle="modal" style="background-color:#3d4d6a;border-color:#3d4d6a"
                            data-target="#threadModal">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-plus mr-2">
                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                            </svg>
                            NEW DISCUSSION
                        </button>
                    </div>
                <?php
                }
                ?>
    
    
                    <div class="inner-sidebar-body p-0">
                        <div class="p-3 h-100" data-simplebar="init">
                            <div class="simplebar-wrapper" style="margin: -16px;">
                                <div class="simplebar-height-auto-observer-wrapper">
                                    <div class="simplebar-height-auto-observer"></div>
                                </div>
                                <div class="simplebar-mask">
                                    <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                        <div class="simplebar-content-wrapper"
                                            style="height: 100%; overflow: hidden;">
                                            <div class="simplebar-content" style="padding: 16px;">
                                                <nav class="nav nav-pills nav-gap-y-1 flex-column">
                                                    <a href="forum.php?order=1" class="nav-link nav-link-faded has-icon<?php if ($order==1): ?> active <?php endif; ?>">All Threads</a>
                                                    <a href="forum.php?order=2" class="nav-link nav-link-faded has-icon<?php if ($order==2): ?> active <?php endif; ?>">Popular this week</a>
                                                    <a href="forum.php?order=3" class="nav-link nav-link-faded has-icon<?php if ($order==3): ?> active <?php endif; ?>">Popular all time</a>
                                                    <a href="forum.php?order=4" class="nav-link nav-link-faded has-icon<?php if ($order==4): ?> active <?php endif; ?>">No replies yet</a>
                                                </nav>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="simplebar-placeholder" style="width: 234px; height: 292px;"></div>
                            </div>
                            <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                                <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
                            </div>
                            <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
                                <div class="simplebar-scrollbar"
                                    style="height: 151px; display: block; transform: translate3d(0px, 0px, 0px);"></div>
                            </div>
                        </div>
                    </div>
    
                </div>
    
    
                <div class="inner-main">
                    <div class="inner-main-body p-2 p-sm-3 collapse forum-content show">
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
                        <?php
                        // Fetch forum data
                        if ($order == 1){
                            $sql = "SELECT user.username as user_username, user.email as user_email, user.foto as user_foto,
                                   Topik.id_topik as topik_id, Topik.judul as topik_judul, LEFT(Topik.deskripsi, 75) as topik_deskripsi,
                                   (SELECT COUNT(*) FROM Balasan WHERE Balasan.id_topik = Topik.id_topik) as reply_count,
                                   (SELECT user.username FROM user 
                                    JOIN Balasan ON user.id_user = Balasan.id_user 
                                    WHERE Balasan.id_topik = Topik.id_topik 
                                    ORDER BY Balasan.waktu_dibuat DESC LIMIT 1) as last_replier_username,
                                   (SELECT Balasan.waktu_dibuat FROM Balasan 
                                    WHERE Balasan.id_topik = Topik.id_topik 
                                    ORDER BY Balasan.waktu_dibuat DESC LIMIT 1) as last_reply_time
                            FROM Topik
                            JOIN user ON Topik.id_user = user.id_user
                            ORDER BY Topik.waktu_dibuat DESC";
                        }elseif ($order == 2){
                            $sql = "SELECT user.username as user_username, user.email as user_email, user.foto as user_foto,
                                   Topik.id_topik as topik_id, Topik.judul as topik_judul, LEFT(Topik.deskripsi, 75) as topik_deskripsi,
                                   (SELECT COUNT(*) FROM Balasan WHERE Balasan.id_topik = Topik.id_topik) as reply_count,
                                   (SELECT user.username FROM user 
                                    JOIN Balasan ON user.id_user = Balasan.id_user 
                                    WHERE Balasan.id_topik = Topik.id_topik 
                                    ORDER BY Balasan.waktu_dibuat DESC LIMIT 1) as last_replier_username,
                                   (SELECT Balasan.waktu_dibuat FROM Balasan 
                                    WHERE Balasan.id_topik = Topik.id_topik 
                                    ORDER BY Balasan.waktu_dibuat DESC LIMIT 1) as last_reply_time
                            FROM Topik
                            JOIN user ON Topik.id_user = user.id_user
                            WHERE Topik.waktu_dibuat >= DATE_SUB(NOW(), INTERVAL 1 WEEK)
                            ORDER BY reply_count DESC";
                        }elseif ($order == 3){
                            $sql = "SELECT user.username as user_username, user.email as user_email, user.foto as user_foto,
                                   Topik.id_topik as topik_id, Topik.judul as topik_judul, LEFT(Topik.deskripsi, 75) as topik_deskripsi,
                                   (SELECT COUNT(*) FROM Balasan WHERE Balasan.id_topik = Topik.id_topik) as reply_count,
                                   (SELECT user.username FROM user 
                                    JOIN Balasan ON user.id_user = Balasan.id_user 
                                    WHERE Balasan.id_topik = Topik.id_topik 
                                    ORDER BY Balasan.waktu_dibuat DESC LIMIT 1) as last_replier_username,
                                   (SELECT Balasan.waktu_dibuat FROM Balasan 
                                    WHERE Balasan.id_topik = Topik.id_topik 
                                    ORDER BY Balasan.waktu_dibuat DESC LIMIT 1) as last_reply_time
                            FROM Topik
                            JOIN user ON Topik.id_user = user.id_user
                            ORDER BY reply_count DESC";
                        }elseif ($order == 4){
                            $sql = "SELECT user.username as user_username, user.email as user_email, user.foto as user_foto,
                                   Topik.id_topik as topik_id, Topik.judul as topik_judul, LEFT(Topik.deskripsi, 75) as topik_deskripsi,
                                   0 as reply_count,
                                   NULL as last_replier_username,
                                   NULL as last_reply_time
                            FROM Topik
                            JOIN user ON Topik.id_user = user.id_user
                            WHERE Topik.id_topik NOT IN (SELECT id_topik FROM Balasan)
                            ORDER BY Topik.waktu_dibuat DESC";
                        }else{
                            $sql = "SELECT user.username as user_username, user.email as user_email, user.foto as user_foto,
                                   Topik.id_topik as topik_id, Topik.judul as topik_judul, LEFT(Topik.deskripsi, 75) as topik_deskripsi,
                                   (SELECT COUNT(*) FROM Balasan WHERE Balasan.id_topik = Topik.id_topik) as reply_count,
                                   (SELECT user.username FROM user 
                                    JOIN Balasan ON user.id_user = Balasan.id_user 
                                    WHERE Balasan.id_topik = Topik.id_topik 
                                    ORDER BY Balasan.waktu_dibuat DESC LIMIT 1) as last_replier_username,
                                   (SELECT Balasan.waktu_dibuat FROM Balasan 
                                    WHERE Balasan.id_topik = Topik.id_topik 
                                    ORDER BY Balasan.waktu_dibuat DESC LIMIT 1) as last_reply_time
                            FROM Topik
                            JOIN user ON Topik.id_user = user.id_user
                            ORDER BY Topik.waktu_dibuat DESC";
                        }
                        
                        $result = $conn->query($sql);
                        
                        // Display forum data
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                ?>
                                <div class="card mb-2">
                                    <div class="card-body p-2 p-sm-3">
                                        <div class="media forum-item">
                                            <a href="#" data-toggle="collapse" data-target=".forum-content"><img
                                                    src="img/user/<?=$row['user_foto']?>"
                                                    class="mr-3 rounded-circle" width="50" alt="User" /></a>
                                            <div class="media-body">
                                                <h6><a href="forumread.php?id=<?=$row['topik_id']?>" class="text-body"><?=$row['topik_judul']?></a></h6>
                                                <p class="text-secondary">
                                                    <?=$row['topik_deskripsi']?>...
                                                </p>
                                                <span class="text-muted">From : <?=$row['user_username']?></span>
                                                <p class="text-muted"><a href="javascript:void(0)"><?=$row['last_replier_username']?></a><span
                                                        class="text-secondary font-weight-bold"><?= time_elapsed_string($row['last_reply_time'])?></span></p>
                                            </div>
                                            <div class="text-muted small text-center align-self-center">
                                                <span><i class="far fa-comment ml-2"></i> <?=$row['reply_count']?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        } else {
                            echo "No topics found.";
                        }
                        
                        // Function to calculate time elapsed
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
                        
                            $result = " replied ". implode(', ', $string) . ' ago';
                        
                            // Handle the case when the time is less than a minute
                            if ($diffInSeconds < 60) {
                                $result = 'just now';
                            }
                            if ($diffInSeconds <= 0) {
                                $result = 'Belum Dikomentari';
                            }
                        
                            return $result;
                        }
                        
                        
                        ?>
                        </div>
                    </div>
    
    
                </div>
    
            </div>
    
            <div class="modal fade" id="threadModal" tabindex="-1" role="dialog" aria-labelledby="threadModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <form action="createtopic.php" method="post">
                            <div class="modal-header d-flex align-items-center bg-primary text-white" style="background-color:#3d4d6a!important;>
                                <h6 class="modal-title mb-0" id="threadModalLabel" style="background-color:#3d4d6a;border-color:#3d4d6a">New Discussion</h6>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" style="color:white">x</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="threadTitle">Judul Topik</label>
                                    <input type="text" class="form-control" id="threadTitle" name="judul" placeholder="" autofocus />
                                </div>
                            
                                <div class="form-group">
                                    <label for="threadDescription">Deskripsi</label>
                                    <textarea class="form-control summernote" id="threadDescription" name="deskripsi"></textarea>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary" style="background-color:#3d4d6a!important;border-color:#3d4d6a;">Post</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
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