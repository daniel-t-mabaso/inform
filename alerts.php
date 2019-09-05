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
    <title>Alerts</title>
</head>

<body class="white-bg" onload="fetchPosts('alerts', 'loaded-events');">
    
    <?php include("assets/php/header.php");?>
    
    
    <div class="vertical-padding-50 fixed uninterupted-max-width shadow top-0 z-10 white-txt primary-bg center-txt">
        <h1 class='heading'>Alerts</h1>
    </div>
    <div class="vertical-padding-50 white-txt center-txt">
        <h1 class='heading'>Alerts</h1>
    </div>

    <div id="loaded-events" class="max-width center">
    </div>
    <a href="createAlert.php"><div class="secondary-bg white-txt title clickable extra-small-size extra-small-line-height fixed z-10 padding-10 center-txt  shadow right-20 bottom-30 circle">+</div></a>
    
</body>
</html>