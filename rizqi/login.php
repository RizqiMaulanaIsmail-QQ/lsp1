<?php
session_start();
require 'function.php';

// cek cookie
if( isset($_COOKIE['id']) && isset($_COOKIE['key']) ) {
  $id = $_COOKIE['id'];
  $key = $_COOKIE['key'];

  // ambil username berdasarkan id
  $result = mysqli_query($conn,"SELECT username FROM user WHERE id  = $id");
  $row = mysqli_fetch_assoc($result);

  // cek cookie dan username
  if( $key === hash('sha256', $row['username']) ) {
    $_SESSION['login'] = true;
  }
}

if( isset($_SESSION["login"]) ) {
  header("Location: index.php");
  exit;
}  

if( isset($_POST["login"]) ) {

  $username = $_POST["username"];
  $password = $_POST["password"];

  $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

  // cek username
  if( mysqli_num_rows($result) === 1) {

    // cek password
    $row = mysqli_fetch_assoc($result);
    if( password_verify($password, $row["password"]) ) {
      // set session  
      $_SESSION["login"] = true;

      // cek remember me
      if( isset($_POST['remember']) ) {
        // buat cookie
        setcookie('id', $row['id'], time()+60);
        setcookie('key',hash('sha256', $row['username']), time()+60);
      }

      header("Location: index.php");
      exit;
    }
  
  }
  $error = true;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div>
        <form action="" method="post" class="form">
            <img src="img/book.png" alt="">
            <p class="text">Login to your account</p>
            <div>
              <ul class="in">
                <li>
                  <label for="username" class="label">Username </label>
                  <input type="text" name="username" id="username" class="input" placeholder="Enter your username">
                </li>
                <li>
                  <label for="password" class="label">Password </label>
                  <input type="password" name="password" id="password" class="input" placeholder="Enter Password">
                </li>
                <?php if( isset($error) ) : ?>
                <p class="p">username / password salah</p>
                <?php endif; ?>
                <li>
                  <button type="submit" name="login" class="button">Login</button>
                </li>
                
                 <p class="signup">Don’t have an account? <a href="signup.php"> Sign Up</a></p>
                
              </ul>
              </div>
            </form>
    </div>
</body>
</html>