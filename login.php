<?php
session_start();
include "connection.php";
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://fonts.googleapis.com/css?family=Play:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <style>
        body {
            background: #f8f9fa;
            font-family: 'Play', sans-serif;
        }

        .login-container {
            max-width: 400px;
            margin: 80px auto;
            padding: 20px;
            background: #ffffff;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .login-container h3 {
            margin-bottom: 20px;
            font-weight: 700;
            text-transform: uppercase;
            color: #333;
        }

        .form-control {
            border-radius: 20px;
            box-shadow: none;
            border: 1px solid #ced4da;
        }

        .loginbtn {
            border-radius: 20px;
            background-color: #007bff;
            color: #fff;
            font-weight: 700;
            text-transform: uppercase;
            transition: all 0.3s;
        }

        .loginbtn:hover {
            background-color: #0056b3;
            color: #fff;
        }

        .btn-default {
            border-radius: 20px;
            color: #007bff;
            border: 1px solid #007bff;
            background-color: transparent;
            text-transform: uppercase;
            transition: all 0.3s;
        }

        .btn-default:hover {
            background-color: #007bff;
            color: #fff;
        }

        .alert-danger {
            display: none;
            margin-top: 20px;
            border-radius: 20px;
            text-align: center;
            font-weight: 700;
        }
    </style>
</head>

<body>

    <div class="login-container">
        <div class="text-center">
            <h3>Login Form</h3>
        </div>
        <div>
            <form action="#" name="form1" method="post">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" placeholder="Username" required="" value="" name="username" id="username" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" placeholder="Password" required="" value="" name="password" id="password" class="form-control">
                </div>
                <button type="submit" name="login" class="btn btn-success btn-block loginbtn">Login</button>
                <a class="btn btn-default btn-block" href="register.php">Register</a>
                <div class="alert alert-danger" id="failure">
                    <strong>Does not match!</strong> Invalid username or password
                </div>
            </form>
        </div>
    </div>

    <?php
    if (isset($_POST["login"])) {
        $count = 0;
        $res = mysqli_query($link, "SELECT * from registration where username='$_POST[username]' && password='$_POST[password]'");
        $count = mysqli_num_rows($res);

        if ($count == 0) {
            echo '<script type="text/javascript">document.getElementById("failure").style.display="block";</script>';
        } else {
            $_SESSION["username"] = $_POST["username"];
            echo '<script type="text/javascript">window.location="select_exam.php";</script>';
        }
    }
    ?>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
