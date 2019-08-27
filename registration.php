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
            <form method="post" action="./"  class="left-txt vertical-padding-10">
                Full Name
                <input class="inputField" type="text" name="fullName">
                Email
                <input class="inputField" type="email" name="emailAddress">
                Password
<<<<<<< HEAD
                <input class="inputField" type="password" id="password" required>
                Confirm Password
                <input class="inputField" type="password" id="confirmPassword" required>
=======
                <input class="inputField" type="password" name="password">
                Confirm Password
                <input class="inputField" type="password" name="confirmPassword">
>>>>>>> d06c5e847f60bc433f6a359f5b0935cf684a0e17
                <input type="checkbox" name="organisation"> As Organisation
                <div  class="center-txt">
                <input class="button" type="submit" value="Login" name="login" />
                <br>
                 <div style="text-align: center; color: skyblue">Already registered? <a href="login.php">Sign in</a> now.</div></div>
            </form>
        </div>
        </body>
    <script>
        var password = document.getElementById("password"), confirm_password = document.getElementById("confirmPassword");
        //var mediumRegex = new RegExp("^(((?=.*[a-z])(?=.*[A-Z]))|((?=.*[a-z])(?=.*[0-9]))|((?=.*[A-Z])(?=.*[0-9])))(?=.{6,})");
        function validatePassword()
        {
            if(password.value != confirm_password.value) 
            {
                confirm_password.setCustomValidity("Passwords Don't Match");
            }
            else
            {
                confirm_password.setCustomValidity("Passwords Match")
            }
        }
        password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword;
    </script>
</html>
