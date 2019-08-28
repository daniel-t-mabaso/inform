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
    <a href="index.php">Home</a><br>
    <a href="profile.php">Profile</a><br>
    <a href="preferences.php">Preferences</a><br>
    <a href="logout.php">Logout</a>
    </div>
    <div class="bodyHome">
        <textarea>Hello what is going on here</textarea>
    </div>
    </body>
</html>