<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: signin.php");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "password";
$database = "notes";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$current_user = $_SESSION['username'];
$sql = "SELECT * FROM users WHERE username = '$current_user';";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <style>
        body {
            background-color: #00203FFF;
        }

        .container {
            max-width: 600px;
            margin-top: 100px;
        }

        .card {
            background-color: #ADEFD1FF;
            border-radius: 10px;
            padding: 10px;
        }

        .form-control {
            border-radius: 10px;
        }

        .btn {
            border-radius: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card">
            <h1 class="text-center">Account Details</h1>
            <p><strong>Email:</strong>
                <?php echo $user['username']; ?>
            </p>
            <p><strong>Password:</strong>
                <?php echo $user['password']; ?>
            </p>
            <a href="index.php" class="btn btn-primary">Back to Home</a>
        </div>
    </div>
</body>

</html>