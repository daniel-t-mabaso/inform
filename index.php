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
    <title>HOME</title>
</head>

<body class="primary-bg">
    
    <?php include("assets/php/header.php");?>
    
    
    <div class="vertical-padding-40 white-txt primary-bg center-txt">
            <h1 class='title'>INFORM</h1>
            <h2 class='book'>Community Notice System</h2>
        </div>
    <div class="white-bg large-medium-height">
    <div class='center-txt padding-20 vertical-padding-10 max-width'>
   
    <div class="max-height center max-width margin-20 center-txt">
            <a href="events.php"><div class="max-width vertical-margin-50 small-height small-width center small-height">
                <img class="max-width" src='assets/media/images/event-icon.png'>
                Events
            </div></a>
            <a href="alerts.php"><div class="max-width vertical-margin-40 small-height small-width center small-height">
                <img class="max-width" src='assets/media/images/alert-icon.png'>
                Alerts
            </div></a>
    </div>
</div>
</body>
</html>