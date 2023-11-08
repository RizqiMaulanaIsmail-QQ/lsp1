<?php
require 'function.php';

if( isset($_POST["register"]) ) {
	if( registrasi($_POST) > 0 ) {
		echo "<script>
				alert('user baru berhasil ditambahkan!');
			  </script>";
	} else {
		echo mysqli_error($conn);
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signup</title><link rel="stylesheet" href="css/signup.css">
</head>
<body>
    <form action="" method="post" class="form">
        <img src="img/logo.png" alt="">
        <p class="p">Making your account</p>
            <div>
            <ul class="ul">
                <li>
                    <label for="username" class="label">username </label>
                    <input type="text" name="username" id="username" class="input" placeholder="Enter your username">
                </li>
                <li>
                    <label for="password" class="label">password </label>
                    <input type="password" name="password" id="password" class="input" placeholder="Enter Password">
                </li>
                <li>
                    <label for="password2" class="label">Confrim password </label>
                    <input type="password" name="password2" id="password2" class="input" placeholder="Confrim Password">
                </li>
                <li>
                    <button type="submit" name="register" class="button">Sign Up</button>
                </li>
        
                <p class="register">Already have an account? <a href="login.php"> Login</a></p>
        
            </ul>
            </div>
        </form>
</body>
</html>