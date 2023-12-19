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

if(!empty($_POST))
{
	$faculty_id=$_POST['faculty_id'];
	//Fetch Name
	$name = mysqli_fetch_array(mysqli_query($al,"SELECT * FROM faculty WHERE faculty_id='".$faculty_id."'"));
	$subject=$_POST['subject'];
	$sql=mysqli_query($al,"select * from feeds where faculty_id='$faculty_id' AND subject='$subject'");
	while($z=mysqli_fetch_array($sql))
	{
		$q1 = $q1 + $z['q1'];
		$q2 = $q2 + $z['q2'];
		$q3 = $q3 + $z['q3'];
		$q4 = $q4 + $z['q4'];
		$q5 = $q5 + $z['q5'];
		$q6 = $q6 + $z['q6'];
		$total = $q1 + $q2 + $q3 + $q4 + $q5 + $q6;
		$s++;
		
	}
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
<span class="SubHead">Feedback</span>
<br>
<br>

<table border="0" cellpadding="4" cellspacing="4">
<tr><td style="font-weight:bold;">Faculty Name : </td><td><?php echo $name['name'];?></td></tr>
<tr><td style="font-weight:bold;">Subject : </td><td><?php echo $subject;?></td></tr>
<tr><td style="font-weight:bold;">1. Topic Selection :</td><td><?php echo $q1;?></td></tr>
<tr><td style="font-weight:bold;">2. Communication & Presentation Skills : </td><td><?php echo $q2;?></td></tr>
<tr><td style="font-weight:bold;">3. Originality & Creativity: </td><td><?php echo $q3;?></td></tr>
<tr><td style="font-weight:bold;">4. Clarity : </td><td><?php echo $q4;?></td></tr>
<tr><td style="font-weight:bold;">5. Enthusiasm for the subject : </td><td><?php echo $q5;?></td></tr>
<tr><td style="font-weight:bold;">6. Overall rating : </td><td><?php echo $q6;?></td></tr>
<tr><td style="font-weight:bold;">Total People :</td><td><?php echo $s;?></td></tr>
<tr><td style="font-weight:bold;">Total :</td><td><?php echo $total;?></td></tr>
<tr><td style="font-weight:bold;" colspan="2" align="center">Comments</td></tr>
	<tr><td colspan="2">
            <?php
            $cc = mysqli_query($al, "SELECT * FROM comments WHERE faculty_id = '".$faculty_id."' ORDER BY id DESC");

            if (mysqli_num_rows($cc) > 0) {
                while ($pr = mysqli_fetch_array($cc)) {
                    echo "~" . $pr['comment'] . "~";
                }
            } else {
                echo "N/A";
            }
            ?>
    </td>
    </tr>
</table>
<br>
<br>
<input type="button" onClick="window.print();" value="PRINT" style="    font-family: 'Roboto', sans-serif;
    font-size: 18px;
    background: linear-gradient(to right, #3498db, #2980b9);
    color: #fff;
    padding: 16px 24px;
    border: 2px solid #2980b9;
    border-radius: 8px;
    cursor: pointer;
    transition: background 0.3s ease-in-out;">&nbsp;<input type="button" onClick="window.location='feeds.php'" value="BACK" style="    font-family: 'Roboto', sans-serif;
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