    <?php include 
    "koneksi.php"; 
    $qberita = "select * from berita";
    $data_berita = $conn->query($qberita);
    ?>

    <!DOCTYPE html>
    <html>
    <head>
    <meta charset="utf-8" />
    <link rel="icon" href="/favicon.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="#000000" />
    <title>Berita</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins%3A400%2C500%2C700"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro%3A400%2C500%2C700"/>
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link href="https://fonts.cdnfonts.com/css/gafata" rel="stylesheet">
    <link rel="stylesheet" href="./styles/berita.css"/>

    <link rel="stylesheet" href="berita.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    </head>

    <body>
    <nav>
        
        <div>
        
        <img src="assets/ptkebuljaya.png" alt="logo">
        
        <ul>
        <li><a class="active" href="homepage.html">Home</a></li>
        <li><a href="data.html">Data Kemiskinan</a></li>
        <li><a href="about-us.html">About Us</a></li>
        <li><a href="login.html">Login</a></li>
        </ul>
        </div>
    </nav>
    <div class="content-body">
    
    <div class="content">
        <div class="content-title-layout">
            <p class="title">Berita</p>
            <div class="searchbox">
            <input type="text" placeholder="Search...">
            <button type="submit"><i class="fa fa-search"></i></button>
            </div>
        </div>
        <div class="kategori-box">
            <div class="login-PbK">
            </div>
            <div class="login-7nD">
            </div>
            <div class="login-T5P">
            </div>
            <div class="login-Zu7">
            </div>
            <div class="login-iX7">
            </div>
            <div class="login-45B">
            </div>
        </div>
        <?php while ($row = $data_berita->fetch_assoc()) : ?>
            <div class="sub-content">
                <p class="berita-title"><?php echo $row['judul_berita']; ?></p>
                <div class="penulis-berita">
                    <div class="rectangle-32-E5T"></div>
                    <p class="sandya-naufal-NSZ"><?php echo $row['penulis_berita']; ?></p>
                </div>
                <div class="desk">
                    <p class="deskrip"><?php echo $row['isi_berita']; ?></p>
                    <img class="ph-heart-bold-ZUR" src="./assets/ph-heart-bold-ZND.png"/>
                </div>
                <div class="line"></div>
            </div>
        <?php endwhile; ?>
    </div>
        <div class="footer">
        <div class="footer-content">
            <div class="line1-col">
                
                <div class="logo1">
                <img src="assets/ptkebuljaya.png" alt="logo">
                <p class="desk">
                    <br>Jl. Pangandaran Serayu </br>
                    <br>Kab.Purbalingga </br>
                    <br>Jawa Tengah </br>
                </p>
                </div>
            </div>
            <div class="line1-col">
                <div class="tentang">
                    <h3>Resources</h3>
                    <ul>
                        <li><a href="about-us.html">About Us</a></li>
                        <li><a href="homepage.html">Home</a></li>
                        <li><a href="contact-us.html">Contact Us</a></li>
                        <li><a href="kisah-sukses.html">Kisah Sukses</a></li>
                    </ul>
                </div>
            </div>
            <div class="line1-col">
                <div class="Important">
                    <h3>Important</h3>
                    <ul>
                        <li><a href="faq.html">FAQ</a></li>
                        <li><a href="privacy.html">Privacy</a></li>
                        <li><a href="menu.html">Services</a></li>
                    </ul>
                </div>
            </div>
            <div class="line1-col">
                <div class="Useful-Links">
                    <h3>Useful Links</h3>
                    <ul>
                        <li><a href="login.html">Login</a></li>
                        <li><a href="register.html">Sign Up</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="line2-col">
            <div class="subs">
            <h3>NEWSLETTER</h3>
            <p>Sign up to our newsletter to get recent updates and happenings</p>
            <form>
                <input type="email">
                <button>Subscribe</button>
            </form>
            </div>
            <div class="line1-col">
            <div class="mid">
                <div class="sosmed">
                    <p class="followus">Follow Us</p>
                    <div class="icon-sosmed">
                        <img src="assets/facebook.png" alt="Facebook"/>
                        <img src="assets/twitter-sign.png" alt="Twitter"/>
                        <img src="assets/instagram.png" alt="Instagram"/>
                    </div>
                    <div class="notelp">
                        <p>Call Us</p>
                        <p>085762382649</p>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <div class="watermark">© 2023 PT.Kebul Jaya. All Rights Reserved.</div>
        </div>
    </div>
    </body>