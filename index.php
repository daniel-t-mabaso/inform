<?php include("assets/php/session.php");

if($_SESSION['auth']!= true){
    
    header("Location: login.php");
}
?>

<?php
            include 'assets/php/dependencies.php';
?>

<!DOCTYPE html>
<html>
    <body style="background-color: skyblue; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; ">
    <form method="POST">
    <input type="submit" value="Logout" class="button center-txt" name="LOGOUT" >
    </form>
    <?php include("assets/php/session.php");
       if(isset($_POST['LOGOUT']))
       { 
        session_destroy();
       }
       ?> 
    </body>
</html>