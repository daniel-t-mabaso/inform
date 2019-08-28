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
    <title>Events</title>
</head>

<body class="">
    
    <?php include("assets/php/header.php");?>
    
    
    <div class="vertical-padding-40 white-txt primary-bg center-txt">
        <h1 class='heading'>Events</h1>
    </div>
    
</body>
</html>