<?php
    include("assets/php/session.php");
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

<body class="white-bg">
    
    <?php include("assets/php/header.php");?>
    
    
    <div class="vertical-padding-40 white-txt primary-bg primary-bg center-txt">
        <h1 class='heading'>Alerts</h1>
    </div>

    <a href="createAlert.php"><div class="alt-bg title extra-small-size extra-small-line-height absolute z-10 padding-10 white-txt center-txt  shadow right-20 bottom-30 circle">+</div></a>
    
</body>
</html>