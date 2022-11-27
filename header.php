<?php

include_once('./includes/autoLoadClassesMain.inc.php');
$controller = new Controller();
$controller->redirectForeignUser();
$view = new View();
$profileName = $view->getUserDetails();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/homePage.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/editTask.css">
    <title>Personal student record</title>
</head>
<body class='body'>
<div class="side_nav">
            <div class="dashboard">
                <button class="btn__dashboard">Dashboard</button>
            </div>
            <div class="student_list">
                <button class="btn__student_list">Student List</button>
            </div>
            <div class="logout">
                <form action="./includes/logout.inc.php" method="post">
                    <button name="logout">Logout</button>
                </form>
            </div>
        </div>
    <div class="container_body">
        <?php include_once('header.php'); ?>

        <div class="profile_photo">
            <div class="container_first">
                <div class="prof_photo">
                    <img src="./images/Profile.jpg" alt="Profile Photo">
                    <div class="container_name">
                        <span id="name"><?php echo $profileName['firstname'] . " " . $profileName['lastname']; ?></span>
                        <span id="email"><?php echo $profileName['email']; ?></span>
                        <span id="caption">Beautiful day</span>
                    </div>
                </div>
                
                <div class="menu-btn">
                    <div class="menu-btn__burger"></div>
                </div>
            </div>

            <div class="container_second">
                <h1>PERSONAL STUDENT RECORD</h1>
                <div class="page_name">
                    <h5><?php echo $controller->getPageName(); ?></h5>
                </div>
            </div>
        </div>
    <div class="container-content">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="./js/header.js"></script>