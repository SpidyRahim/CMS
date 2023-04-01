<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Police Sign Up</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <style>
        body {
            background-color: #00203FFF;
        }

        .container {
            max-width: 600px;
            margin-top: 100px;
        }
        .card{
            background-color: #ADEFD1FF;
            border-radius: 15px;
        }
        .form-control {
            border-radius: 15px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3><center>Police Sign Up</center></h3>
            </div>
            <div class="card-body">
                <form action="signup_process.php" method="POST">
                    <div class="form-group">
                        <label for="username">Email:</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
                </form>
                <p class="text-center mt-3">Already have an account? <a href="signin.php">Sign In</a></p>
            </div>
        </div>
    </div>
</body>

</html>