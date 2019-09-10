<?php include("assets/php/session.php");
include("assets/php/class_lib.php");
include("assets/php/server.php");

if($_SESSION['auth'] == true){
    //user is logged in. Redirect to home
    header("Location: communityRegister.php");
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
        <body class='alt-bg'><?php 
        include('assets/php/message.php');
    ?>
        <div class="vertical-padding-40 white-txt center-txt primary-bg">
            <h1 class='title'>INFORM</h1>
            <h2 class='book'>Community Notice System</h2>
        </div>

        <div class='center-txt padding-20 vertical-padding-30 max-width'>
            <h1 class="heading">SIGN UP</h1>
            <p class="book">Enter your credentials below<br>to sign up.</p>
            <form name="register" method="post" action=""  class="left-txt vertical-padding-10">
                Full Name
                <input class="inputField" type="text" name="fullName">
                Email
                <input class="inputField" type="email" name="email">
                Password
                <input class="inputField" type="password" name="password">
                Confirm Password
                <input class="inputField" type="password" name="confirmPassword">
                <input type="checkbox" name="organisation"> As Organisation
                <div  class="center-txt">
                <input class="button primary-bg white-txt" type="submit" value="Register" name="register" />
                <br>
                 <div class='primary-txt'>Already registered? <a href="login.php" class='underline'>Sign in</a> now.</div></div>
            </form>
            <div class=" center-txt danger-txt footnote">
                    <?php
            if (count($errors)>0): 
        ?>

        <div class="left-txt danger-txt">
            <?php
                foreach ($errors as $error):
            ?>
                <p><?php echo $error;?></p>
            <?php endforeach?>
        </div>
        <?php endif?>
        </div>
        </div>
        </body>
</html>
