<?php
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

$sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

if (mysqli_query($conn, $sql)) {
    $message = "Account created successfully";
} else {
    $message = "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Account Creation</title>
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
            border-radius: 15px;
        }

        .message {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>
                    <center>Account Creation</center>
                </h3>
            </div>
            <div class="card-body">
                <p class="message">
                    <?php echo $message; ?>
                </p>
                <a href="signin.php" class="btn btn-primary btn-block">Back to Sing In</a>
            </div>
        </div>
    </div>
</body>

</html>