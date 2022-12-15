<?php

include_once('autoLoadClasses.inc.php');

$controller = new Controller();


if(!isset($_POST['student-id'])){
    header("Location: ../status403.php");
    exit(0);
} else {
    $studentId = htmlspecialchars($_POST['student-id']);
        exit(json_encode($controller->deleteStudentRecord($studentId)));
    }
?>