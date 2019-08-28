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
        <form method="post" action="" name="choice" class="right-txt vertical-padding-10">
            <input class="button" type="submit" value="Events" name="events" />
            <input class="button" type="submit" value="Alerts" name="alerts" />
        </form>
    </div>
    </body>
</html>