<?php
include 'koneksi.php';
session_start();

if (isset($_SESSION['username'])){
    header("Location: sukses_login.php");
    exit();
}

if (isset($_POST['submit'])){
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $password = hash('sha256', $_POST['password']);//Hash the input password using SHA-256

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($koneksi, $sql);

    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        header("Location: sukses_login.php");
        exit();
    } else{
        echo "<script>alert('Email atau password Anda salah. Silahkan coba lagi')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p> <!-- Fixed typo in "2ron" to "2rem" -->
            <div class="input-group">
                <input type="email" placeholder="Email" name="email" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Password" name="password" required>
            </div>
            <div class="input-group">
                <button type="submit" name="submit" class="btn">Login</button>
            </div>
            <p class="login-registrasi-text">Belum punya akun? <a href="register.php">Register</a></p> <!-- Fixed typo in "registrasi" to "register" -->
        </form>
    </div>
</body>
</html>