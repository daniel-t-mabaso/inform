<?php include("assets/php/session.php");

if($_SESSION['auth']!= true){
    
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html>
    <body style="background-color: skyblue; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; ">
    <a href="preferences.php">Preferences</a><br>
    <a href="profile.php">Profile</a><br>
    <a href="logout.php">logout</a>
    </body>
</html>