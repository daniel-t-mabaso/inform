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
    <title>Settings</title>
</head>

<body class="white-bg">
    
    <?php include("assets/php/header.php");?>
    
    
    <div class="vertical-padding-40 white-txt primary-bg primary-bg center-txt">
        <h1 class='heading'>Settings</h1>
    </div>
    
</body>
</html>