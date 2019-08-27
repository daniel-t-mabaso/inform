<?php include("assets/php/session.php");
include("assets/php/class_lib.php");
include("assets/php/server.php");

if($_SESSION['auth'] == true){
    //user is logged in. Redirect to home
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Setup</title>
        <?php
            include 'assets/php/dependencies.php';
        ?>
    </head>
        <body>
        <div class="vertical-padding-40 white-txt" style="background-color: skyblue; text-align: center">
            <h1 class='title'>INFORM</h1>
            <h2 class='book'>Community Notice System</h2>
        </div>

        <div class='center-txt padding-20 vertical-padding-30 max-width'>
            <h1 class="heading">Initial Setup</h1>
            <p class="book">Let's get your all set up.<br>Select your current community.</p>
            <form name="register" method="post" action=""  class="left-txt vertical-padding-10">
                Community
                <select class="inputField" name="community">

                </select>
                
                <input class="button" type="submit" value="Register" name="setup" />
                <br>
                 <div style="text-align: center; color: skyblue">Already registered? <a href="login.php">Sign in</a> now.</div></div>
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
