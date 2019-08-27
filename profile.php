<?php
    include("assets/php/session.php");
    include("assets/php/class_lib.php");
?>
<!Doctype html>
<html>
<head>
        <?php
            include 'assets/php/dependencies.php';
            $user = unserialize($_SESSION['user']);
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
            <form method="post" action="" class="left-txt vertical-padding-10">
                Full Name
                        <?php 
                        $name = $user->get_full_name(); 
                        echo "<input type='text' class='inputField' name='fullName' placeholder='$name'/>";?>
                        
                Email
                        <?php
                        $email = $user->get_email(); 
                        echo "<input type='email' class='inputField' name='fullName' placeholder='$email'/>";?>
                        
                Community Zip Code
                        <input type="text" class="inputField" name="zipCode">
                        <datalist>
                        </datalist>
            
                        <div class="book center-txt">
                <input class="book" type="checkbox" id='new-community-checkbox' onclick="document.getElementById('new-community-panel').classList.toggle('hide');" name="newCommunity">New Community<br>
                <div class="hide  left-txt" id="new-community-panel">
                    Zip Code
                    <input type="text" class="inputField" name="newCommunityZip" placeholder="0000"/>
                    Suburb
                    <input type="text" class="inputField" name="newCommunityName" placeholder="Suburb Name"/>
                </div>
            </div>
            <div class="center-txt">
            <input class="button" type="submit" value="Save" name="save" />   
            <input class="button" type="submit" value="Deactivate Account" name="deleteProfile" /><br>
            
            <a href='index.php'>Go to Home</a>
        </div>
        </form>
            
        </div>
    </body>
</html>