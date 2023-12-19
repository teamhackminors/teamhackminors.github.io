<?php
include "configASL.php";
session_start();
if(isset($_POST['roll']))
{
	$_SESSION['roll']=$_POST['roll'];
}

if(isset($_POST['faculty_id']))
{
	$_SESSION['faculty_id']=$_POST['faculty_id'];
}
//Fetch Faculty Name
$nm = mysqli_fetch_array(mysqli_query($al, "SELECT * FROM faculty WHERE faculty_id='".$_SESSION['faculty_id']."'"));
$_SESSION['name'] = $nm['name'];
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
<span class="SubHead" style="color: #384ef0;">Step III</span>
<form method="post" action="feedback_step_4.php" >
<div id="table"> 
    <div class="tr">
		<div class="td">
        	<label>Person : </label>
        </div>
        <div class="td">
			<input type="text" disabled size="25" value="<?php echo $_SESSION['roll'];?>" style="color: #eee; background-color: #333; padding: 8px; border: 1px solid #555; border-radius: 5px;">
<input type="hidden" value="<?php echo $_SESSION['roll'];?>" name="roll" />

        </div>
    </div>
     <div class="tr">
     <div class="td">
        	<label>Project : </label>
        </div>
        

     <div class="td">
			<input type="text" disabled size="25" value="<?php echo $_SESSION['name'];?>" style="color: #eee; background-color: #333; padding: 8px; border: 1px solid #555; border-radius: 5px;">
<input type="hidden" value="<?php echo $_SESSION['faculty_id'];?>" name="faculty_id" />

        </div>
      </div>
      
      
      <div class="tr">
     <div class="td">
        	<label>Subject : </label>
        </div>
        

     <div class="td">
     <select name="subject" required style="width: 250px; padding: 10px; font-size: 16px; border: 2px solid #2c3e50; border-radius: 5px; background-color: #34495e; color: #ecf0f1;">
    <option value="NA" disabled selected style="background-color: #2c3e50; color: #ecf0f1;"> - - Select Subject - -</option>
    <?php
    $x = mysqli_query($al, "select distinct s1, s2 from faculty WHERE faculty_id='" . $_SESSION['faculty_id'] . "'");
    while ($y = mysqli_fetch_array($x)) {
    ?>
        <option value="<?php echo $y['s1']; ?>" style="background-color: #2c3e50; color: #ecf0f1;"><?php echo $y['s1']; ?></option>
    <?php } ?>
</select>

        </div><br>
      </div>
      
      
</div>

		
        <div class="tdd">
        	<input type="button" onClick="window.location='feedback_step_2.php'" value="BACK" style="    font-family: 'Roboto', sans-serif;
    font-size: 18px;
    background: linear-gradient(to right, #3498db, #2980b9);
    color: #fff;
    padding: 16px 24px;
    border: 2px solid #2980b9;
    border-radius: 8px;
    cursor: pointer;
    transition: background 0.3s ease-in-out;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="NEXT" />
        </div>
   
    <br>
</div>
</form>
<br>
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