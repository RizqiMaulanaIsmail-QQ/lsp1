<?php
session_start();

if( !isset($_SESSION["login"]) ) {
  header("Location: login.php");
  exit;
}

require 'function.php';
$user = query("SELECT * FROM user");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@700&family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="CSS/index.css">
</head>
<body>
    <nav>
        <div class="logo">
            <h4>E-book</h4>
            <img src="img/open-book.png" alt="">
        </div>
        
        <ul>
            <li><a href="admin.php">Admin</a></li>
            <li><a href="index.php">Beranda</a></li>
            <li><a href="profile.php">Profil</a></li>
            <li><a href="">Kategori</a></li>
            <li><a href="aktivitas.php">Aktivitas</a></li>
            
            <li><a href="logout.php" class="button">Logout</a></li>
        </ul>

    </nav>
    <div class="text">
        <div class="img">
            <img src="img/book 1.png" alt="">
        </div>
        <div class="title">
            <h1>E-book</h1>
            <p>Selamat datang di E-book silakan baca untuk <br>meningkatkan kualitas literasi</p>
        </div>
    </div>

</body>
</html>