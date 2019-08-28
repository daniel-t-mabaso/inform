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
    <body style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">
        <div class="vertical-padding-40 white-txt" style="background-color: skyblue; text-align: center">
                <!--This is where the picture goes-->
                <?php
                    $url = $user -> get_dp_url();
                    echo "<img src='$url' class='profilePicture'/>"
                ?>
               
        </div>
       
        <div class='center-txt padding-20 vertical-padding-30 max-width'>
            <form method="post" action="" class="left-txt bold vertical-padding-10">
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
                                $email = $user->get_email(); 
                                echo "<div class='book'>Suburb, 0000</div>";?>
                    </div>
                    <br>
                    <div onclick="hideThisMeShowThat('profile-details-panel','profile-edit-panel');" class="center-txt footnote">Edit Profile</div>
               
               
            <br>
            <div class="book center-txt">
                <input class="button" type="submit" value="Deactivate Account" name="deleteProfile" /><br>
                <a href='index.php'><input class="button" type="button" value="Go Home"/></a><br>
            </div>
                </div>
                <div id='profile-edit-panel' class='hide'>
                    Full Name
                        <?php 
                        $name = $user->get_full_name(); 
                        echo "<input type='text' class='inputField' name='fullName' placeholder='$name'/>";?>
                        
                    Email
                        <?php
                        $email = $user->get_email(); 
                        echo "<input type='email' class='inputField' name='fullName' placeholder='$email'/>";?>
                        
                        Community
                            <input id="community-choices" type="text" class="inputField" value="Suburb, 0000" name="zipCode">
                            <datalist>
                            </datalist>
                            <div class="hide  left-txt" id="new-community-panel"><br>
                                Zip Code
                                <input type="text" class="inputField" name="newCommunityZip" placeholder="0000"/>
                                Suburb
                                <input type="text" class="inputField" name="newCommunityName" placeholder="Suburb Name"/>
                            </div>
                        <div class="book center-txt">
                    <br>
                            <input class="book" type="checkbox" id='new-community-checkbox' onclick="document.getElementById('new-community-panel').classList.toggle('hide'); document.getElementById('community-choices').classList.toggle('hide');" name="newCommunity">New Community<br>

                        </div>
                        
                    <br>
                        <div class="center-txt">
                        <input class="button" type="submit" value="Save" name="save" /> 
                        <input onclick="hideThisMeShowThat('profile-edit-panel', 'profile-details-panel');" class="button" type="button" value="Cancel" name="cancel" /> 
                    </div>
            </div> 
            
        </form>
            
        </div>
    </body>
</html>