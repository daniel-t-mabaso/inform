<?php include("assets/php/session.php");

if($_SESSION['auth']!= true){
    
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html>
    <body style="background-color: skyblue; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; ">
    <a href="logout.php">logout</a>
    </body>
</html>