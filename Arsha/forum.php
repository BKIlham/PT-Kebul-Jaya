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

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link" href="index.php">Home</a></li>
                    <li><a class="nav-link" href="about-us.php">About</a></li>
                    <li><a class="nav-link" href="artikel.php">Artikel</a></li>
                    <li><a class="nav-link" href="galeri.php">Galeri</a></li>
                    <li><a class="nav-link active" href="forum.php">Forum Diskusi</a></li>
                    <li><a class="getstarted" href="signin.php">Sign In</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    
    <div class="container forum">
        <div class="main-body p-0">
            <div class="inner-wrapper">
    
                <div class="inner-sidebar">
    
                    <div class="inner-sidebar-header justify-content-center">
                        <button class="btn btn-primary has-icon btn-block" type="button" data-toggle="modal"
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
                                                    <a href="javascript:void(0)"
                                                        class="nav-link nav-link-faded has-icon active">All Threads</a>
                                                    <a href="javascript:void(0)"
                                                        class="nav-link nav-link-faded has-icon">Popular this week</a>
                                                    <a href="javascript:void(0)"
                                                        class="nav-link nav-link-faded has-icon">Popular all time</a>
                                                    <a href="javascript:void(0)"
                                                        class="nav-link nav-link-faded has-icon">Solved</a>
                                                    <a href="javascript:void(0)"
                                                        class="nav-link nav-link-faded has-icon">Unsolved</a>
                                                    <a href="javascript:void(0)" class="nav-link nav-link-faded has-icon">No
                                                        replies yet</a>
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
    
                    <div class="inner-main-header">
                        <a class="nav-link nav-icon rounded-circle nav-link-faded mr-3 d-md-none" href="#"
                            data-toggle="inner-sidebar"><i class="material-icons">arrow_forward_ios</i></a>
                        <select class="custom-select custom-select-sm w-auto mr-1">
                            <option selected>Latest</option>
                            <option value="1">Popular</option>
                            <option value="3">Solved</option>
                            <option value="3">Unsolved</option>
                            <option value="3">No Replies Yet</option>
                        </select>
                        <span class="input-icon input-icon-sm ml-auto w-auto">
                            <input type="text"
                                class="form-control form-control-sm bg-gray-200 border-gray-200 shadow-none mb-4 mt-4"
                                placeholder="Search forum" />
                        </span>
                    </div>
    
    
    
                    <div class="inner-main-body p-2 p-sm-3 collapse forum-content show">
                        <div class="card mb-2">
                            <div class="card-body p-2 p-sm-3">
                                <div class="media forum-item">
                                    <a href="#" data-toggle="collapse" data-target=".forum-content"><img
                                            src="https://bootdey.com/img/Content/avatar/avatar1.png"
                                            class="mr-3 rounded-circle" width="50" alt="User" /></a>
                                    <div class="media-body">
                                        <h6><a href="#" data-toggle="collapse" data-target=".forum-content"
                                                class="text-body">Realtime fetching data</a></h6>
                                        <p class="text-secondary">
                                            lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet
                                        </p>
                                        <p class="text-muted"><a href="javascript:void(0)">drewdan</a> replied <span
                                                class="text-secondary font-weight-bold">13 minutes ago</span></p>
                                    </div>
                                    <div class="text-muted small text-center align-self-center">
                                        <span class="d-none d-sm-inline-block"><i class="far fa-eye"></i> 19</span>
                                        <span><i class="far fa-comment ml-2"></i> 3</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-2">
                            <div class="card-body p-2 p-sm-3">
                                <div class="media forum-item">
                                    <a href="#" data-toggle="collapse" data-target=".forum-content"><img
                                            src="https://bootdey.com/img/Content/avatar/avatar2.png"
                                            class="mr-3 rounded-circle" width="50" alt="User" /></a>
                                    <div class="media-body">
                                        <h6><a href="#" data-toggle="collapse" data-target=".forum-content"
                                                class="text-body">Laravel 7 database backup</a></h6>
                                        <p class="text-secondary">
                                            lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet
                                        </p>
                                        <p class="text-muted"><a href="javascript:void(0)">jlrdw</a> replied <span
                                                class="text-secondary font-weight-bold">3 hours ago</span></p>
                                    </div>
                                    <div class="text-muted small text-center align-self-center">
                                        <span class="d-none d-sm-inline-block"><i class="far fa-eye"></i> 18</span>
                                        <span><i class="far fa-comment ml-2"></i> 1</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-2">
                            <div class="card-body p-2 p-sm-3">
                                <div class="media forum-item">
                                    <a href="#" data-toggle="collapse" data-target=".forum-content"><img
                                            src="https://bootdey.com/img/Content/avatar/avatar1.png"
                                            class="mr-3 rounded-circle" width="50" alt="User" /></a>
                                    <div class="media-body">
                                        <h6><a href="#" data-toggle="collapse" data-target=".forum-content"
                                                class="text-body">Auth attempt returns false</a></h6>
                                        <p class="text-secondary">
                                            lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet
                                        </p>
                                        <p class="text-muted"><a href="javascript:void(0)">michaeloravec</a> replied <span
                                                class="text-secondary font-weight-bold">18 hours ago</span></p>
                                    </div>
                                    <div class="text-muted small text-center align-self-center">
                                        <span class="d-none d-sm-inline-block"><i class="far fa-eye"></i> 70</span>
                                        <span><i class="far fa-comment ml-2"></i> 3</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <ul class="pagination pagination-sm pagination-circle justify-content-center mb-0">
                            <li class="page-item disabled">
                                <span class="page-link has-icon"><i class="bx bx-chevron-left"></i></span>
                            </li>
                            <li class="page-item"><a class="page-link" href="javascript:void(0)">1</a></li>
                            <li class="page-item active"><span class="page-link">2</span></li>
                            <li class="page-item"><a class="page-link" href="javascript:void(0)">3</a></li>
                            <li class="page-item">
                                <a class="page-link has-icon" href="javascript:void(0)"><i class="bx bx-chevron-right"></i></a>
                            </li>
                        </ul>
                    </div>
    
    
                    <div class="inner-main-body p-2 p-sm-3 collapse forum-content">
                        <a href="#" class="btn btn-light btn-sm mb-3 has-icon" data-toggle="collapse"
                            data-target=".forum-content"><i class="fa fa-arrow-left mr-2"></i>Back</a>
                        <div class="card mb-2">
                            <div class="card-body">
                                <div class="media forum-item">
                                    <a href="javascript:void(0)" class="card-link">
                                        <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="rounded-circle"
                                            width="50" alt="User" />
                                        <small class="d-block text-center text-muted">Newbie</small>
                                    </a>
                                    <div class="media-body ml-3">
                                        <a href="javascript:void(0)" class="text-secondary">Mokrani</a>
                                        <small class="text-muted ml-2">1 hour ago</small>
                                        <h5 class="mt-1">Realtime fetching data</h5>
                                        <div class="mt-3 font-size-sm">
                                            <p>Hellooo :)</p>
                                            <p>
                                                I'm newbie with laravel and i want to fetch data from database in realtime
                                                for my dashboard anaytics and i found a solution with ajax but it dosen't
                                                work if any one have a simple solution it will be
                                                helpful
                                            </p>
                                            <p>Thank</p>
                                        </div>
                                    </div>
                                    <div class="text-muted small text-center">
                                        <span class="d-none d-sm-inline-block"><i class="far fa-eye"></i> 19</span>
                                        <span><i class="far fa-comment ml-2"></i> 3</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-2">
                            <div class="card-body">
                                <div class="media forum-item">
                                    <a href="javascript:void(0)" class="card-link">
                                        <img src="https://bootdey.com/img/Content/avatar/avatar2.png" class="rounded-circle"
                                            width="50" alt="User" />
                                        <small class="d-block text-center text-muted">Pro</small>
                                    </a>
                                    <div class="media-body ml-3">
                                        <a href="javascript:void(0)" class="text-secondary">drewdan</a>
                                        <small class="text-muted ml-2">1 hour ago</small>
                                        <div class="mt-3 font-size-sm">
                                            <p>What exactly doesn't work with your ajax calls?</p>
                                            <p>Also, WebSockets are a great solution for realtime data on a dashboard.
                                                Laravel offers this out of the box using broadcasting</p>
                                        </div>
                                        <button class="btn btn-xs text-muted has-icon"><i class="fa fa-heart"
                                                aria-hidden="true"></i>1</button>
                                        <a href="javascript:void(0)" class="text-muted small">Reply</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    
    
                </div>
    
            </div>
    
            <div class="modal fade" id="threadModal" tabindex="-1" role="dialog" aria-labelledby="threadModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <form>
                            <div class="modal-header d-flex align-items-center bg-primary text-white">
                                <h6 class="modal-title mb-0" id="threadModalLabel">New Discussion</h6>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="threadTitle">Title</label>
                                    <input type="text" class="form-control" id="threadTitle" placeholder="Enter title"
                                        autofocus />
                                </div>
                                <textarea class="form-control summernote" style="display: none;"></textarea>
                                <div class="custom-file form-control-sm mt-3" style="max-width: 300px;">
                                    <input type="file" class="custom-file-input" id="customFile" multiple />
                                    <label class="custom-file-label" for="customFile">Attachment</label>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-primary">Post</button>
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