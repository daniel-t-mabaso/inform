<?php
    include("assets/php/session.php");
    include("assets/php/class_lib.php");
    if(!$_SESSION['auth']){
        header("Location: login.php");
    }
    else if(isset($_SESSION['user']) && $_SESSION['auth'] ){
        $user = unserialize($_SESSION['user']);
    }
?>
<!DOCTYPE html>
<html>  
    <head>
        <title>choose Community</title>
        <?php
            include 'assets/php/dependencies.php';
        ?>
</head>
        <body>
            <?php
                include('assets/php/message.php');
            ?>
            <div class="vertical-padding-40 white-txt primary-bg center-txt">
                <h1 class='title'>INFORM</h1>
                <h2 class='book'>Community Notice System</h2>
            </div>

            <div class='center-txt padding-20 vertical-padding-30 max-width'>
                <h1 class="heading">Join A Community</h1>
                <p class="book">Join a community<br>to get started.</p>
                <form method="post" action="assets/php/requests.php" name="register-community" class="left-txt vertical-padding-10">
                    Where are you from?
                    <input id="community-search-input" type="list" onkeyup="search('suburbs', 'community-search-input');" list="suburb-list" class="inputField" placeholder="Suburb, City, Province" name="community"/>
                    <div id="community-datalist">
</div>
                    <input class="button center-txt" type="submit" value="Next" name="register-community" />        
                </form>
            </div>
        </body>
</html>
