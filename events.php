<?php
    include("assets/php/session.php");
    include("assets/php/class_lib.php");
    if(!$_SESSION['auth']){
        header("Location: login.php");
    }
    else if(isset($_SESSION['user']) && $_SESSION['auth'] ){
        $user = unserialize($_SESSION['user']);
    }
?>
<?php
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
    <title>Events</title>
</head>

<body class="" onload="fetchPosts('events', 'loaded-events');">
    
    <?php include("assets/php/header.php");?>
    
    
        
    <div class="vertical-padding-40 fixed uninterupted-max-width shadow top-0 z-10 white-txt primary-bg center-txt">
        <h1 class='heading'>Events</h1>
    </div>
    <div class="vertical-padding-40 white-txt center-txt">
        <h1 class='heading'>Events</h1>
    </div>
    <div id="loaded-events" class="max-width center">
    </div>
<?php 
    if($user->get_type() == 'organisation' || $user->get_type() == 'local admin' || $user->get_type() == 'global admin'){ 
        echo '<a href="createEvent.php"><div class="alt-bg title extra-small-size extra-small-line-height fixed z-10 padding-10 white-txt center-txt  shadow right-20 bottom-30 circle">+</div></a>';
        }
    ?>
</body>
</html>