
<?php

include_once('autoLoadClasses.inc.php');

$controller = new View();

if(!isset($_POST['student-id'])){
    header("LOCATION: ./");
    exit(0);
} else {
    $studentId = htmlspecialchars($_POST['student-id']);
    $controller->getStudentRecord($studentId);
}