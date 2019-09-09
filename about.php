<?php
    include("assets/php/session.php");
    include("assets/php/class_lib.php");
    if(!$_SESSION['auth']){
        header("Location: login.php");
    }
    else if(isset($_SESSION['user']) && $_SESSION['auth'] ){
        $user = unserialize($_SESSION['user']);
    }

if($_SESSION['auth']!= true){
    
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <?php
        include 'assets/php/dependencies.php';
    ?>
    <title>About</title>
</head>

<body class="alt-bg">
    
    <?php include("assets/php/header.php");?>
    
    
    <div class="vertical-padding-40 white-txt primary-bg center-txt">
            <h1 class='title'>ABOUT</h1>
            <h2 class='book'>Community Notice System</h2>
        </div>
    <div class="white-bg large-medium-height alt-bg ">
        <div class='center-txt padding-20 vertical-padding-10 max-width'>
    
        <div class="max-height centermax-width margin-20 center-txt">
                <p class='book vertical-padding-10'>Inform is a 3rd year UCT Computer Science project aimed at creating a community notice system.</p> 
                <p class='book vertical-padding-10'>The application was developed as a prototype for a fully functional system that would allow community member and non-profit organisations to post and view events, general alerts, notifications, general news and much more.</p>
                <p class='book vertical-padding-10'>We developed the app as a web app to allow for it to be tested and used by, not only Android OS users, but by anyone with an internet connection, although the app was primarily deployed on the Android platform.</p>
                <p class='book vertical-padding-10'>The app is the proud work of three students, <a class='underline' target="_blank" href='http://www.linkedin.com/in/'>Motshabi Shuping</a>, <a class='underline' target="_blank" href='http://www.linkedin.com/in/'>Thami Mlotshwa</a> and <a class='underline' target="_blank" href='http://www.linkedin.com/in/daniel-t-mabaso'>Daniel Mabaso</a>.</p>
                <p class='footnote italic vertical-padding-10'><b>Released 10/09/2019</b><br>Version 1.0.0</p>
        </div>
    </div>
</body>
</html>