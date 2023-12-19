<?php
include "configASL.php";
session_start();

$sql=mysqli_query($al,"select * from feeds where roll='".mysqli_real_escape_string($al,$_POST['roll'])."' AND name='".mysqli_real_escape_string($al,$_POST['faculty'])."' AND subject='".mysqli_real_escape_string($al,$_POST['subject'])."'");


if(isset($_POST['roll']))
{
	$_SESSION['roll']=$_POST['roll'];
}

if(isset($_POST['faculty_id']))
{
	$_SESSION['faculty_id']=$_POST['faculty_id'];
}

if(isset($_POST['subject']))
{
	$_SESSION['subject']=$_POST['subject'];
}
//Fetch Questions
$q = mysqli_fetch_array(mysqli_query($al, "SELECT * FROM questions WHERE id = '1'"));
$parameters = array("Poor","Fair","Good","Very Good","Excellent");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Feedback - SOUTH POINT HIGH SCHOOL EXHIBITION</title>
<link href="style.css" rel="stylesheet" type="text/css"/>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
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
<span class="SubHead">Step III</span>
<form method="post" action="feedback_step_5.php" >
<div id="table"> 
    <div class="tr">
		<div class="td">
        	<label>Person : </label>
        </div>
        <div class="td">
			<input type="text" disabled size="25" value="<?php echo $_SESSION['roll'];?>" />
            <input type="hidden" value="<?php echo $_SESSION['roll'];?>" name="roll" />
        </div>
    </div>
     <div class="tr">
     <div class="td">
        	<label>Faculty : </label>
        </div>
        

     <div class="td">
			<input type="text" disabled size="25" value="<?php echo $_SESSION['name'];?>" />
            <input type="hidden" value="<?php echo $_SESSION['faculty_id'];?>" name="faculty_id" />
            
        </div>
      </div>
      
      
      <div class="tr">
     <div class="td">
        	<label>Subject : </label>
        </div>
        

     <div class="td">
			<input type="text" disabled size="25" value="<?php echo $_SESSION['subject'];?>"/>
            <input type="hidden" value="<?php echo $_SESSION['subject'];?>" name="subject" />
        </div>
      </div>
      
</div>
<hr style="width:100%;">

	<?php
		for($i=1;$i<=6;$i++)
		{
			?>
            <div class="tddd" style="font-size: larger;">
				<span class="text"><?php echo $i;?>. <?php echo  $q['q'.$i];?> : <br>
                <?php 
						for($j=1;$j<=5;$j++)
						{
							?>
                        <input type="radio" required value="<?php echo $j;?>" name="q<?php echo $i;?>" /><?php echo $parameters[$j-1];?>&nbsp;&nbsp;
                        <?php } ?> </span>
                        				</div>
                                        	<hr style="width:100%;"> <?php } ?>
                                            <div class="tddd" style="width: 250px; margin-top: 10px;">
    <textarea name="comment" cols="40" placeholder="Enter Comments" style="width: 100%; padding: 10px; font-size: 16px; border: 2px solid #2c3e50; border-radius: 5px; background-color: #34495e; color: #ecf0f1;"></textarea>
</div>
<div class="tddd">
    <div class="g-recaptcha" data-sitekey="6LeMYTYpAAAAABPZAytMc7w5XSnksQ7y1uahR32W" data-callback="recaptchaCallback"></div>
                        </div>
<input type="button" onClick="window.location='feedback_step_3.php'" value="BACK" style="    font-family: 'Roboto', sans-serif;
    font-size: 18px;
    background: linear-gradient(to right, #3498db, #2980b9);
    color: #fff;
    padding: 16px 24px;
    border: 2px solid #2980b9;
    border-radius: 8px;
    cursor: pointer;
    transition: background 0.3s ease-in-out;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="SUBMIT" onClick="return confirm('Are you sure?')" />
            <br>
<br>

        </div>
   
    <br>
</div>
</form>
<br>
<script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
<script>
        var typed= new Typed(".head", {
        strings: ["Welcome to the Platinum Exhibition of...", "SOUTH POINT SCHOOL", "SOUTH POINT HIGH SCHOOL"],
        typeSpeed: 70,
        backSpeed: 30,
        loop: true
    })

        function recaptchaCallback() {
            var response = grecaptcha.getResponse();
            if (response.length === 0) {
                alert("Please complete the reCAPTCHA.");
            }
        }

</script>
<!--
</body>
</html>