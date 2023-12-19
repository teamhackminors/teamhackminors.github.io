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
	$fc=$_POST['fc'];
	$sub=$_POST['sub'];
	$subb=$_POST['subb'];
	$faculty_id = uniqid();
	$u=mysqli_query($al,"insert into faculty(faculty_id,name,s1,s2) values('$faculty_id','$fc','$sub','$subb')");
	if($u==true)
	{
		?>
        <script type="application/javascript">
		alert('Successfully added');
		</script>
        <?php }
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
<span class="SubHead">Add Project</span>
<br>
<br>
<form method="post" action="" >
<div id="table">
	<div class="tr">
		<div class="td">
        	<label>Project : </label>
        </div>
        <div class="td">
			<input type="text" name="fc" size="25" required placeholder="Enter Project Name" />
        </div>
    </div>
    <div class="tr">
		<div class="td">
        	<label>Subject : </label>
        </div>
        <div class="td">
			<input type="text" name="sub" size="25" required placeholder="Enter Subject" />
        </div>
    </div>
    
</div>
		
        <div class="tdd">
        	<input type="submit" value="ADD FACULTY" />
        </div>
    
<br>
<br>

    
    
    
    <span class="SubHead">Manage Project</span>
    <br>
<br>

	<table border="0" cellpadding="3" cellspacing="3">
    <tr style="font-weight:bold;">
    <td>Sr. No.</td>
    <td>Name</td>
    <td>Subject</td>
    <td>Delete</td>
    
    </tr>
    <?php
	$sr=1;
	$h=mysqli_query($al,"select * from faculty");
	while($j=mysqli_fetch_array($h))
	{
		?>
        <tr>
        <td><?php echo $sr;$sr++;?></td>
        <td><?php echo $j['name'];?></td>
        <td><?php echo $j['s1'];?></td>
        <td align="center"><a href="delete.php?del=<?php echo $j['id'];?>" onClick="return confirm('Are you sure?')" style="text-decoration:none;font-size:18px;color:rgba(255,0,4,1.00);">[x]</a></td> 
        </tr>
     <?php } ?>
     </table>
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