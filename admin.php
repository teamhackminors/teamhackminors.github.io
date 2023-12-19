<?php
include("configASL.php");
session_start();

// Check if the session token is already set
if (isset($_SESSION['aid'])) {
    // Check if the one-time token is not set
    if (!isset($_SESSION['token'])) {
        // Generate a one-time token
        $_SESSION['token'] = bin2hex(random_bytes(16));
    } else {
        // One-time token is set, log out and redirect to login page
        session_unset();
        session_destroy();
        header("location:admin.php");
        exit();
    }
}

if (!empty($_POST)) {
    $aid = mysqli_real_escape_string($al, $_POST['aid']);
    $pass = mysqli_real_escape_string($al, sha1($_POST['pass']));
    $sql = mysqli_query($al, "SELECT * FROM admin WHERE aid='$aid' AND password='$pass'");
    if (mysqli_num_rows($sql) == 1) {
        // Set session token and clear one-time token
        $_SESSION['aid'] = $aid;
        unset($_SESSION['token']);
        header("location:home.php");
        exit();
    } else {
        ?>
        <script type="text/javascript">
            alert("Incorrect Admin ID or Password");
        </script>
        <?php
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <style>
        #topHeader {
            width: 100%;
            height: 120px; /* Taller header */
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            background: linear-gradient(to right, #191714, #2234AE); /* Dark blue gradient */
            color: #fff;
            font-size: 28px;
            text-align: center;
            line-height: 120px; /* Centered vertically */
            font-family: cursive;
        }

        body {
            background: #222D32;
            font-family: 'Roboto', sans-serif;
        }

        .login-box {
            margin-top: 75px;
            height: auto;
            background: #1A2226;
            text-align: center;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
        }

        .login-key {
            height: 100px;
            font-size: 80px;
            line-height: 100px;
            background: -webkit-linear-gradient(#27EF9F, #0DB8DE);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .login-title {
            margin-top: 15px;
            text-align: center;
            font-size: 30px;
            letter-spacing: 2px;
            margin-top: 15px;
            font-weight: bold;
            color: #ECF0F5;
        }

        .login-form {
            margin-top: 25px;
            text-align: left;
        }

        input[type=text], input[type=password] {
            background-color: #1A2226;
            border: none;
            border-bottom: 2px solid #0DB8DE;
            border-top: 0px;
            border-radius: 0px;
            font-weight: bold;
            outline: 0;
            margin-bottom: 20px;
            padding-left: 0px;
            color: #ECF0F5;
        }

        .form-group {
            margin-bottom: 40px;
            outline: 0px;
        }

        .form-control:focus {
            border-color: inherit;
            -webkit-box-shadow: none;
            box-shadow: none;
            border-bottom: 2px solid #0DB8DE;
            outline: 0;
            background-color: #1A2226;
            color: #ECF0F5;
        }

        input:focus {
            outline: none;
            box-shadow: 0 0 0;
        }

        label {
            margin-bottom: 0px;
        }

        .form-control-label {
            font-size: 10px;
            color: #6C6C6C;
            font-weight: bold;
            letter-spacing: 1px;
        }

        .btn-outline-primary {
            border-color: #0DB8DE;
            color: #0DB8DE;
            border-radius: 0px;
            font-weight: bold;
            letter-spacing: 1px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
        }

        .btn-outline-primary:hover {
            background-color: #0DB8DE;
            right: 0px;
        }

        .login-btm {
            float: left;
        }

        .login-button {
            padding-right: 0px;
            text-align: right;
            margin-bottom: 25px;
        }

        .login-text {
            text-align: left;
            padding-left: 0px;
            color: #A2A4A4;
        }

        .loginbttm {
            padding: 0px;
        }
    </style>
</head>
<body>
<div id="topHeader">
    <img src="logo.png" height="105vh" width="125vh" style="float: left; margin-right: 10px;">
    <span class="head"></span><br />
    <span class="tag"></span>
</div>
<br>
<div class="container" >
    <div class="row">
        <div class="col-lg-3 col-md-2"></div>
        <div class="col-lg-6 col-md-8 login-box">
            <div class="col-lg-12 login-key">
                <i class="fa fa-key" aria-hidden="true"></i>
            </div>
            <div class="col-lg-12 login-title">
                ADMIN PANEL
            </div>
            <div class="col-lg-12 login-form">
                <form method="post" action="">
                    <div class="form-group">
                        <label class="form-control-label">USERNAME</label>
                        <input type="text" name="aid" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">PASSWORD</label>
                        <input type="password" name="pass" id="password" class="form-control" required>

                    </div>
                    <div class="col-lg-12 loginbttm">
                        <div class="col-lg-6 login-btm login-text">
                            <!-- Error Message -->
                        </div>
                        <div class="col-lg-6 login-btm login-button">
                            <button type="submit" class="btn btn-outline-primary">LOGIN</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-3 col-md-2"></div>
    </div>
</div>

<script src="typing.js"></script>

<script>
    // Add this script after your password input field
    document.addEventListener('DOMContentLoaded', function () {
        var passwordInput = document.getElementById('password');
        passwordInput.setAttribute('autocomplete', 'new-password');

        //Typing animation
        var typed = new Typed(".head", {
            strings: ["Welcome to the Platinum Exhibition of...", "SOUTH POINT SCHOOL", "SOUTH POINT HIGH SCHOOL"],
            typeSpeed: 70,
            backSpeed: 30,
            loop: true
    });

    }); // Add this closing brace
</script>
</body>
</html>
