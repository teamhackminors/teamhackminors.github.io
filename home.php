<?php
include("configASL.php");
session_start();

// Check if the session token is not set, redirect to login page
if (!isset($_SESSION['aid'])) {
    header("location:admin.php");
    exit();
}

$aid = $_SESSION['aid'];
$x = mysqli_query($al, "SELECT * FROM admin WHERE aid='$aid'");
$y = mysqli_fetch_array($x);
$name = $y['name'];
?>

<!doctype html>
<html>
<head>


    <meta charset="utf-8">
    <title>Feedback - SOUTH POINT HIGH SCHOOL EXHIBITION</title>
    <link href="style.css" rel="stylesheet" type="text/css" />
    <style>
        /* Add the new styles for the logout button */
        .button-logout {
            background: #FF4742;
            border: 1px solid #FF4742;
            border-radius: 6px;
            box-shadow: rgba(0, 0, 0, 0.1) 1px 2px 4px;
            box-sizing: border-box;
            color: #FFFFFF;
            cursor: pointer;
            display: inline-block;
            font-family: nunito, roboto, proxima-nova, "proxima nova", sans-serif;
            font-size: 16px;
            font-weight: 800;
            line-height: 16px;
            min-height: 40px;
            outline: 0;
            padding: 12px 14px;
            text-align: center;
            text-rendering: geometricprecision;
            text-transform: none;
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
            vertical-align: middle;
        }

        .button-logout:hover,
        .button-logout:active {
            background-color: initial;
            background-position: 0 0;
            color: #FF4742;
        }

        .button-logout:active {
            opacity: .5;
        }

        .button-85 {
            padding: 0.6em 2em;
            border: none;
            outline: none;
            color: rgb(255, 255, 255);
            background: #111;
            cursor: pointer;
            position: relative;
            z-index: 0;
            border-radius: 10px;
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
            text-decoration:none;
            
        }

        .button-85:before {
            content: "";
            background: linear-gradient(
                    45deg,
                    #ff0000,
                    #ff7300,
                    #fffb00,
                    #48ff00,
                    #00ffd5,
                    #002bff,
                    #7a00ff,
                    #ff00c8,
                    #ff0000
            );
            position: absolute;
            top: -2px;
            left: -2px;
            background-size: 400%;
            z-index: -1;
            filter: blur(5px);
            -webkit-filter: blur(5px);
            width: calc(100% + 4px);
            height: calc(100% + 4px);
            animation: glowing-button-85 20s linear infinite;
            transition: opacity 0.3s ease-in-out;
            border-radius: 10px;
            text-decoration:none;
        }

        @keyframes glowing-button-85 {
            0% {
                background-position: 0 0;
            }
            50% {
                background-position: 400% 0;
            }
            100% {
                background-position: 0 0;
            }
        }

        .button-85:after {
            z-index: -1;
            content: "";
            position: absolute;
            width: 100%;
            height: 100%;
            background: #222;
            left: 0;
            top: 0;
            border-radius: 10px;
            text-decoration:none;
        }

    </style>
</head>
<style>

    label{
        color: white;
    }
    </style>
<body>
<div id="topHeader">
    <img src="logo.png" height="100vh" width="120vh" style="float: left; margin-right: 10px;"><span class="head"></span><br />
</div>
<style>
    tr{
        text-align:center;
        width:40%;
    }
</style>
<br>
<br>
<br>
<br>

<div id="content" align="center" style="background-image: linear-gradient(to right bottom, #37054e, #32064e, #2d074e, #27074e, #21084e, #200c53, #1e0f58, #1b135d, #1c1a68, #1c2274, #1b2980, #17318c); color:white;">
    <br>
    <br>
    <span class="SubHead">Welcome Admin <?php echo $name;?></span>
    <br>
    <br>
<table>
    <!-- Updated "Check Feedback" button -->
    <tr><td><a href="feeds.php" class="button-85" style="display: inline-block; margin: 0 10px; padding: 12px 20px; background: linear-gradient(to right, #8e44ad, #9b59b6); color: #fff; text-decoration: none; border: 2px solid #9b59b6; border-radius: 5px; transition: background 0.3s ease-in-out; text-align:center;">Check Feedback</a><br><br></td>
    <td><a href="manageFaculty.php" class="button-85" style="display: inline-block; margin: 0 10px; padding: 12px 20px; background: linear-gradient(to right, #8e44ad, #9b59b6); color: #fff; text-decoration: none; border: 2px solid #9b59b6; border-radius: 5px; transition: background 0.3s ease-in-out; text-align:center;">Manage Faculty</a><br><br></td></tr>
    <tr><td><a href="changePass.php" class="button-85" style="display: inline-block; margin: 0 10px; padding: 12px 20px; background: linear-gradient(to right, #8e44ad, #9b59b6); color: #fff; text-decoration: none; border: 2px solid #9b59b6; border-radius: 5px; transition: background 0.3s ease-in-out;">Change Password</a></td>
    <td style="text-align:center;"><a href="logout.php" class="button-logout" >Logout</a></td></tr>
    </table>
    </div>
<script src="typing.js"></script>
<script>
    var typed= new Typed(".head", {
        strings: ["Welcome to the Platinum Exhibition of...", "SOUTH POINT SCHOOL", "SOUTH POINT HIGH SCHOOL"],
        typeSpeed: 70,
        backSpeed: 30,
        loop: true
    })
</script>
<!--
</body>
</html>
-->
