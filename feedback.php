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
<span class="SubHead" style="color: #384ef0;">Feedback Step I</span>
<form method="post" action="feedback_step_2.php" >
<div id="table">
	
    
    
    <div class="tr">
		<div class="td">
        	<label>Who are you? : </label>
        </div><br>
        <div class="td">
        <select name="roll" id="roll" required style="width: 250px; padding: 10px; font-size: 16px; border: 2px solid #2c3e50; border-radius: 5px; background-color: #34495e; color: #ecf0f1;">
    <option value="NA" disabled selected style="background-color: #2c3e50; color: #ecf0f1;"> - - Select who you are. - -</option>
    <option value="Guardian" style="background-color: #2c3e50; color: #ecf0f1;" data-description="Guardian Description">Guardian</option>
    <option value="Ex-Student" style="background-color: #2c3e50; color: #ecf0f1;" data-description="Ex-Student Description">Ex-Student</option>
    <option value="Student" style="background-color: #2c3e50; color: #ecf0f1;" data-description="Student Description">Student</option>
    <option value="Teacher" style="background-color: #2c3e50; color: #ecf0f1;" data-description="Teacher Description">Teacher</option>
    <option value="Other Guest" style="background-color: #2c3e50; color: #ecf0f1;" data-description="Other Guest Description">Other Guest</option>
</select>



        </div>
        <style>
/* Style for the select element in dark theme */
.custom-select.dark-theme {
    width: 250px;
    padding: 10px;
    font-size: 16px;
    border: 2px solid #2c3e50;
    border-radius: 5px;
    background-color: #34495e;
    color: #ecf0f1;
}

/* Style for the options in dark theme */
.custom-option {
    background-color: #2c3e50;
    color: #ecf0f1;
}

/* Style for the selected option in dark theme */
.custom-select.dark-theme option:checked {
    background-color: #3498db;
    color: #fff;
}

/* Optional: Style for the description of each option in dark theme */
.custom-option::after {
    content: attr(data-description);
    display: block;
    font-size: 14px;
    color: #bdc3c7;
}



        </style>
    </div>
</div><br>
		       <input type="submit" value="NEXT" />
        </div>
    
    <br>
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