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
    <title>HOME</title>
</head>

<body style="background-color: skyblue; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; ">
    
    <?php include("assets/php/header.php");?>
    
    <div class="vertical-padding-40 white-txt" style="background-color: skyblue; text-align: center">
        <h1 class="title center-txt bold">HOME</h1>
     </div>
    <div style="background-color:white">
    <div class='center-txt padding-20 vertical-padding-10 max-width'>
    <div class="sideMenu">
    <a href="index.php">Home</a>
    <br>
    <br>
    <a href="profile.php">Profile</a>
    <br>
    <br>
    <a href="preferences.php">Preferences</a>
    <br>
    <br>
    <a href="logout.php">Logout</a>
    <br>
    <br>
    </div>
    <div class="bodyHome">
        <form method="post" action="" name="choice">
            <img class="small-width small-height" src='assets/media/images/event-icon.jpg'>
            <input class="button left-txt" type="submit" value="Events" name="events" />
            <br><br><br><br>
            <img class="small-width small-height" src='assets/media/images/alert-icon.png'>
            <input class="button center-txt" type="submit" value="Alerts" name="alerts" />
        </form>
        </body>
    </div>
</div>
</html>