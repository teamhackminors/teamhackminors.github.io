<?php
include("configASL.php");
session_start();
if(!isset($_SESSION['aid']))
{
	header("location:index.php");
}
$aid=$_SESSION['aid'];
$x=mysqli_query($al,"select * from admin where aid='$aid'");
$y=mysqli_fetch_array($x);
$name=$y['name'];
$old=$y['password'];

if(!empty($_POST))
{
	$p1=sha1($_POST['p1']);
	$p2=sha1($_POST['p2']);
	if($old==$p1)
	{
		$u=mysqli_query($al,"update admin set password='$p2' where aid='$aid'");
	}
	if($u==true)
	{
		?>
        <script type="application/javascript">
		alert('Successfully changed password');
		</script>
        <?php } else { ?> <script type="application/javascript">
		alert('Incorrect old password');
		</script><?php }
}
		
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Feedback - SOUTH POINT HIGH SCHOOL EXHIBITION</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<style>

    label{
        color: white;
    }
    </style>
<body>
<div id="topHeader">
    <img src="logo.png" height="100vh" width="120vh" style="float: left; margin-right: 10px;"><span class="head"></span><br />
    <span class="tag">YOUR FEEDBACK IS VALUABLE TO US!</span>
</div>
<br>
<br>
<br>
<br>

<div id="content" align="center" style="background-image: linear-gradient(to right bottom, #37054e, #32064e, #2d074e, #27074e, #21084e, #200c53, #1e0f58, #1b135d, #1c1a68, #1c2274, #1b2980, #17318c); color:white;">
<br>
<br>
<span class="SubHead">Change Password</span>
<br>
<br>
<form method="post" action="" >
<div id="table">
	<div class="tr">
		<div class="td">
        	<label>Old Password : </label>
        </div>
        <div class="td">
			<input type="password" name="p1" size="25" required placeholder="Enter Old Password" />
        </div>
    </div>
    <div class="tr">
		<div class="td">
        	<label>New Password : </label>
        </div>
        
        <div class="td">
			<input type="password" name="p2" size="25" required placeholder="Enter New Password" />
        </div>
    </div>
</div>
		
        <div class="tdd">
        	<input type="submit" value="CHANGE PASSWORD" />
        </div>
    
<br>
<br>

     <br>

<input type="button" onClick="window.location='home.php'" value="BACK" style="    font-family: 'Roboto', sans-serif;
    font-size: 18px;
    background: linear-gradient(to right, #3498db, #2980b9);
    color: #fff;
    padding: 16px 24px;
    border: 2px solid #2980b9;
    border-radius: 8px;
    cursor: pointer;
    transition: background 0.3s ease-in-out;">
<br>
<br>
</div>
</form>


<br>
<br>
<br>

<br>
<br>

</div>
<script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
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