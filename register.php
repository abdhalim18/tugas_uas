<?php
include 'koneksi.php';
session_start();

// Check if the user is already logged in
if (isset($_SESSION['username'])) {
    header("location: index.php");
    exit(); // Stop further execution
}

// Initialize variables
$username = $email = '';

// Check if the form is submitted
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = hash('sha256', $_POST['password']); // Hash the input using SHA-256
    $cpassword = hash('sha256', $_POST['cpassword']); // Hash the input password using SHA-256

    if ($password == $cpassword) {
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($koneksi, $sql);

        if (!$result || mysqli_num_rows($result) <= 0) {
            $sql = "INSERT INTO users (username, email, password) 
                    VALUES ('$username', '$email', '$password')";
            $result = mysqli_query($koneksi, $sql);

            if ($result) {
                echo "<script>alert('Selamat, registrasi berhasil!')</script>";
                $username = "";
                $email = "";
                $_POST['password'] = "";
                $_POST['cpassword'] = "";
            } else {
                echo "<script>alert('Woops! Terjadi Kesalahan.')</script>";
            }
        } else {
            echo "<script>alert('Woops! Email Sudah Terdaftar.')</script>";
        }
    } else {
        echo "<script>alert('Woops! Password tidak cocok.')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Daftar</title>
</head>
<body>
    <div class="container">
        <form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>
            <div class="input-group">
                <input type="text" placeholder="Username" name="username" value="<?php echo isset($username) ? $username : ''; ?>">
            </div>
            <div class="input-group">
                <input type="email" placeholder="Email" name="email" value="<?php echo isset($email) ? $email : ''; ?>">
            </div>
            <div class="input-group">
                <input type="password" placeholder="Password" name="password" value="<?php echo isset($_POST['password']) ? $_POST['password'] : ''; ?>" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Confirm password" name="cpassword" value="<?php echo isset($_POST['cpassword']) ? $_POST['cpassword'] : ''; ?>" required>
            </div>
            <div class="input-group">
                <button type="submit" name="submit" class="btn">Register</button>
            </div>
            <p class="login-register-text">Sudah punya akun? <a href="halaman_login.php">Login</a></p>
        </form>
    </div>
</body>
</html>