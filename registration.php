<?php include("assets/php/session.php");

if($_SESSION['auth'] == true){
    //user is logged in. Redirect to home
    header("Location: home.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Register</title>
        <?php
            include 'assets/php/dependencies.php';
        ?>
    </head>
        <body style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">
        <div class="vertical-padding-40 white-txt" style="background-color: skyblue; text-align: center">
            <h1 class='title'>INFORM</h1>
            <h2 class='book'>Community Notice System</h2>
        </div>

        <div class='center-txt padding-20 vertical-padding-30 max-width'>
            <h1 class="heading">SIGN UP</h1>
            <p class="book">Enter your credentials below<br>to sign up.</p>
            <form class="left-txt vertical-padding-10">
                Full Name
                <input class="inputField" type="text" name="fullName" required>
                Email
                <input class="inputField" type="email" name="emailAddress" required>
                Password
                <input class="inputField" type="password" name="password" required>
                Confirm Password
                <input class="inputField" type="password" name="confirmPassword" required>
                <input type="checkbox" name="organisation"> As Organisation
                <div  class="center-txt">
                <input class="button" type="button" value="Login" name="login" />
                <br>
                 <div style="text-align: center; color: skyblue">Already registered? <a href="login.php">Sign in</a> now.</div></div>
            </form>
        </div>
        </body>
</html>
