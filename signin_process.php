<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "password";
$database = "notes";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $_SESSION['username'] = $username;
    header("Location: index.php");
} else {
    echo "Invalid username or password";
}

mysqli_close($conn);
?>