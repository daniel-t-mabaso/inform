<?php include("assets/php/session.php");
include("assets/php/class_lib.php");
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
            <div class="small-width center hide-overflow">
                <img class="max-width max-height" src='assets/media/images/event-icon.jpg'>
            </div>
            <input class="button" type="submit" value="Events" name="events" />
            <div class="small-width center hide-overflow">
                <img class="max-width max-height" src='assets/media/images/alert-icon.png'>
            </div>
            <input class="button" type="submit" value="Alerts" name="alerts" />
        </form>
    </div>
    </body>
</html>