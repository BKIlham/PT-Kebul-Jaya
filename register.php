<?php
include 'koneksi.php';
session_start();
 
if (isset($_SESSION['name'])) {
    header("Location: index.php");
    exit();
}
 
if (isset($_POST['submit'])) {
    $username = $_POST['name'];
    $email = $_POST['email'];
    $password = hash('sha256', $_POST['password']); // Hash the input password using SHA-256
    $cpassword = hash('sha256', $_POST['cpassword']); // Hash the input confirm password using SHA-256
 
    if ($password == $cpassword) {
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($conn, $sql);
        if (!$result->num_rows > 0) {
            $sql = "INSERT INTO users (namename, email, password)
                    VALUES ('$username', '$email', '$password')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo "<script>alert('Selamat, registrasi berhasil!')</script>";
                $username = "";
                $email = "";
                $_POST['password'] = "";
                $_POST['cpassword'] = "";
            } else {
                echo "<script>alert('Woops! Terjadi kesalahan.')</script>";
            }
        } else {
            echo "<script>alert('Woops! Email Sudah Terdaftar.')</script>";
        }
    } else {
        echo "<script>alert('Password Tidak Sesuai')</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="icon" href="/favicon.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="#000000" />
    <title>Register</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins%3A400%2C500%2C700"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro%3A400%2C500%2C700"/>
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link href="https://fonts.cdnfonts.com/css/gafata" rel="stylesheet">
    <link rel="stylesheet" href="./styles/register.css"/>

    <link rel="stylesheet" href="register.css">
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
<div class="content">
<p class="title-content">Register</p>
<div class="mid-content">
    <div class="login-layout">
    <div class="form">
        <form>
        <label>Nama</label><br>
        <input type="text"><br>
        <label>Email</label><br>
        <input type="email"><br>
        <label>Password</label><br>
        <input type="password"><br>
        <label>Konfirmasi Password</label><br>
        <input type="password"><br>
        <button>Register</button>
        </form>
    </div>
    <div class="remember-layout">
        <div class="remember">
        <input type="checkbox" name="remember" checked/> Remember Me </div>
        <p class="lupa-pass">Forgot Password?</p>
    </div>
    <p class="or-login-with-eoF">or login with</p>
    <div class="loginwith-layout">
        <div class="google-layout">
        <div class="google-set">
            <img class="googleglogo-1-Zoj" src="./assets/googleglogo-1-tVT.png"/>
        </div>
        <p class="sign-in-with-google-5GH">Sign in with Google</p>
        </div>
        <div class="facebook-layout">
        <div class="facebook-set">
            <img class="facebook-2-logo-png-transparent-1-PwB" src="./assets/facebook-2-logo-png-transparent-1-PQZ.png"/>
        </div>
        <p class="sign-in-with-facebook-iyT">Sign in with Facebook</p>
        </div>
    </div>
    </div>
    <div class= "img-side">
    <img src="assets/register.jpg"/>
    </div>
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