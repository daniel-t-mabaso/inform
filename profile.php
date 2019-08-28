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
<!Doctype html>
<html>
<head>
        <?php
            include 'assets/php/dependencies.php';
        ?>
    <title>Profile</title>
</head>
    <body>
        
    <?php include("assets/php/header.php");?>

        <div class="vertical-padding-40 white-txt primary-bg center-txt">
                <!--This is where the picture goes-->
                <?php
                    $url = $user -> get_dp_url();
                    echo "<img src='$url' class='profilePicture'/>"
                ?>
               
        </div>
       
        <div class='center-txt padding-20 vertical-padding-30 max-width'>
            <form method="post" action="./assets/php/requests.php" name="edit-profile" class="left-txt bold vertical-padding-10">
                <div id="profile-details-panel">
                    <div class="vertical-margin-15">
                        Full Name
                            <?php 
                            $name = $user->get_full_name(); 
                            echo "<div class='book vertical-margin-5'>$name</div>";?>
                    </div>
                    <div class="vertical-margin-15">        
                        Email
                            <?php
                            $email = $user->get_email(); 
                            echo "<div class='book vertical-margin-5'>$email</div>";?>
                    </div>
                    <div class="vertical-margin-15">
                        Community       
                        <?php
                                $cid = $user->get_base_communities(); 
                                echo "<div class='book vertical-margin-5'>$cid</div>";?>
                    </div>
                    <br>
                    <div onclick="hideThisMeShowThat('profile-details-panel','profile-edit-panel');" class="center-txt footnote">Edit Profile</div>
               
               
            <br>
            <div class="book center-txt">
                <input class="button" type="submit" value="Deactivate Account" name="deleteProfile" />
            </div>
                </div>
                <div id='profile-edit-panel' class='hide'>
                    Full Name
                        <?php 
                        $name = $user->get_full_name(); 
                        echo "<input type='text' class='inputField' name='fullName' value='$name'/>";?>
                        
                        Community
                                <?php 
                                $code = $user-> get_base_communities();
                                echo ' <input id="community-search-input" type="list" onkeyup="search(\'suburbs\', \'community-search-input\');" list="suburb-list" class="inputField" placeholder="'.$code.'" name="community"/>
                                <div id="community-datalist"></div>';
                                ?>
                        
                    <br>
                        <div class="center-txt">
                        <input class="button" type="submit" value="Save" name="edit-profile" /> 
                        <input onclick="hideThisMeShowThat('profile-edit-panel', 'profile-details-panel');" class="button" type="button" value="Cancel" name="cancel" /> 
                    </div>
            </div> 
            
        </form>
            
        </div>
    </body>
</html>