<?php
    include("assets/php/session.php");
    include("assets/php/server.php");

if($_SESSION['auth'] == true){
    //user is logged in. Redirect to home
    header("Location: home.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
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
            <h1 class="heading">SIGN IN</h1>
            <p class="book">Enter your credentials below<br>to sign in.</p>
            <form method="post" action="./" class="left-txt vertical-padding-10">
                Email
                <input class="inputField" type="email" name="emailAddress" required>
                Password
                <input class="inputField" type="password" name="password" required>
                <div  class="center-txt">
                <input class="button" type="submit" value="Login" name="login" />
                <br>
                 <div style="text-align: center; color: skyblue">Not registered? <a href="registration.php">Sign up</a> now.</div></div>
            </form>
        </div>
    </body>
    <script>
        var password = document.getElementById("password"), confirm_password = document.getElementById("confirm_password");
        function validatePassword()
        {
            if(password.value != confirm_password.value) 
            {
                confirm_password.setCustomValidity("Passwords Don't Match");
            } 
            else 
            {
                confirm_password.setCustomValidity('Passwords Match.');
            }
        }
        password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword;
    </script>
</html>
