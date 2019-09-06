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
        <body class='alt-bg'>
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
                <div class="vertical-padding-50">
                    <form method="post" action="assets/php/requests.php" name="register-community" class="left-txt vertical-padding-10">
                        Where are you from?
                        <input id="community-search-input" type="text" autocomplete="off" onkeyup="search('suburbs', 'community-search-input');" class="inputField" placeholder="Suburb, City, Province" name="community"/>
                            <div id="community-datalist" class="unrestricted-max-width normal left-0 shadow absolute z-10 alt-bg footnote">
                            </div>
                            <div class="center-txt">
                                <input class="button center-txt" type="submit" value="Next" name="register-community" />        
                            </div>
                    </form>
                </div>
            </div>
        </body>
</html>
