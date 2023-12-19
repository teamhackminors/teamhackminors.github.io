<?php

include "configASL.php";
session_start();

if (!empty($_POST)) {
    $roll = $_POST['roll'];
    $sub = $_POST['subject'];
    $faculty_id = $_POST['faculty_id'];
    $q1 = $_POST['q1'];
    $q2 = $_POST['q2'];
    $q3 = $_POST['q3'];
    $q4 = $_POST['q4'];
    $q5 = $_POST['q5'];
    $q6 = $_POST['q6'];
    $total = $q1 + $q2 + $q3 + $q4 + $q5 + $q6;
    $per = ($total / 30) * 100;

    $x = mysqli_query($al, "insert into feeds(faculty_id,roll,name,subject,q1,q2,q3,q4,q5,q6,total,percent) values('" . $faculty_id . "','$roll','" . $_SESSION['name'] . "','$sub','$q1','$q2','$q3','$q4','$q5','$q6','$total','$per')");
    mysqli_query($al, "INSERT INTO comments(faculty_id,comment) VALUES('" . $faculty_id . "','" . $_POST['comment'] . "')");

    if ($x == true) {
        // This JavaScript code will run when the page is loaded
        echo '<script type="text/javascript">
            alert("Feedback successfully submitted");
            window.location = "feedback.php";
        </script>';
    }
}
?>
<!doctype html>
<html>
<head>
    <title>Feedback - SOUTH POINT HIGH SCHOOL EXHIBITION</title>
</head>
<body><!--<div>Feedback successfully submitted! <a href="feedback.php">Click Here</a> to repoll.</div>-->
<script>
    alert("Feedback successfully submitted");
    window.location = "feedback.php";
</script>
</body>
</html>