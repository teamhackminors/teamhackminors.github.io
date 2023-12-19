<?php
include("configASL.php");

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['faculty_id'])) {
        $facultyId = mysqli_real_escape_string($al, $_GET['faculty_id']);
        $query = "SELECT DISTINCT s1 FROM faculty WHERE faculty_id='$facultyId'";
        $result = mysqli_query($al, $query);

        $subjects = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $subjects[] = $row['s1'];
        }

        // Return subjects as JSON
        header('Content-Type: application/json');
        echo json_encode($subjects);
        exit;
    }
}
?>
