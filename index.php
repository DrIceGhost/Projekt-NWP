<?php
session_start();

print '
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- End CSS -->
    
    <!-- meta elements -->
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="description" content="some description">
    <meta name="keywords" content="MK Zagorski Orlovi, Moto Check, Moto Specs">
    <meta name="author" content="antonio.kosutic1@tvz.hr">
    
    <!-- favicon meta -->
    <link rel="icon" href="img/favicon1.svg" type="image" />
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
    <!-- end favicon meta -->
    <!-- end meta elements -->

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Rajdhani" rel="stylesheet">
    <!-- End Google Fonts -->

    <title>Moto Check</title>
</head>

<body>
    <header>
        <div class="hero-image"></div>';
include 'menu.php';

print '
    </header>
    <main>';
if (isset($_SESSION['message'])) {
    print "<div style='color: green; border: 1px solid green; margin: 10px; padding: 10px;'>" . htmlspecialchars($_SESSION['message']) . "</div>";
    unset($_SESSION['message']); }

if (isset($_GET['menu'])) {
    $menu = basename($_GET['menu']);
    include $menu . '.php'; } else { include 'home.php';}

print '
    </main>
    <footer>
        <a href="https://www.facebook.com/antonio.kosutic/?_rdr" target="_blank"><img src="img/face.svg" alt="Facebook" title="Facebook" style="width: 26px; margin-top:0.4em"></a>
		<a href="https://www.instagram.com/antoniokosutic/" target="_blank"><img src="img/insta.svg" alt="Instagram" title="Instagram" style="width:26px; margin-top:0.4em"></a>
		<a href="https://github.com/DrIceGhost/Projekt-NWP" target="_blank"><img src="img/gith.svg" alt="GitHub" title="GitHub" style="width:24px; margin-top:0.4em"></a> 
        <p>Copyright &copy; ' . date("M,Y") . ' Antonio Košutić</p>
    </footer>
</body>

</html>';
?>
