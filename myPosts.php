<?php
    include("assets/php/session.php");
    include("assets/php/class_lib.php");
    if(!$_SESSION['auth']){
        header("Location: login.php");
    }
    else if(isset($_SESSION['user']) && $_SESSION['auth'] ){
        $user = unserialize($_SESSION['user']);
        $com = unserialize($_SESSION['community']);
    }
?>
<!Doctype html>
<html>
    <head>
            <?php
                include 'assets/php/dependencies.php';
            ?>
        <title>Profile</title>
    </head>
    <body>
            
        <?php include("assets/php/header.php");?>
        <div class="vertical-padding-40 fixed uninterupted-max-width shadow top-0 z-10 white-txt primary-bg center-txt">
            <h1 class='heading'>My Posts</h1>
        </div>
        <div class="vertical-padding-40 white-txt center-txt">
            <h1 class='heading'>Events</h1>
        </div>
            
        
        <div id="my-posts-panel" class='center-txt padding-20 vertical-padding-30 max-width'>
            
    <div class="max-height center max-width margin-20 center-txt">
            <div onclick="fetchPosts('my-events', 'my-posts-panel'); enableThisDisableThat('my-events-button','my-alerts-button');" class="max-width vertical-margin-50 small-height small-width center small-height">
                <img class="max-width" src='assets/media/images/event-icon.jpg'>
                <br>My Events
            </div>

            <div onclick="fetchPosts('my-alerts', 'my-posts-panel'); enableThisDisableThat('my-alerts-button','my-events-button');" class="max-width vertical-margin-40 small-height small-width center small-height">
                <img class="max-width" src='assets/media/images/alert-icon.png'>
                <br>My Alerts
            </div>
    </div>
        </div>


        <div class="uninterupted-max-width fixed bottom-0 left-0 z-10">
            <div id="my-events-button" onclick="fetchPosts('my-events', 'my-posts-panel'); enableThisDisableThat('my-events-button','my-alerts-button');" class="half-width center-txt vertical-padding-15 alt-bg float-left">
                My Events
            </div>
            <div id="my-alerts-button" onclick="fetchPosts('my-alerts', 'my-posts-panel'); enableThisDisableThat('my-alerts-button','my-events-button');" class="half-width center-txt vertical-padding-15 alt-bg float-left">
                My Alerts
            </div>
        </div>
    </body>
</html>