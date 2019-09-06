<?php
    include("assets/php/session.php");
    include("assets/php/class_lib.php");
    if(!$_SESSION['auth']){
        header("Location: login.php");
    }
    else if(isset($_SESSION['user']) && $_SESSION['auth'] ){
        $user = unserialize($_SESSION['user']);
        $com = unserialize($_SESSION['community']);
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
    <body class='alt-bg'>
        
    <?php include("assets/php/header.php");?>

        <div class="vertical-padding-40 white-txt uninterupted-max-width small-height primary-bg center-txt">
            <div class="heading center-txt vertical-padding-20 bold">My Profile</div>
                <!--This is where the picture goes-->
               <div class="absolute z-10  uninterupted-max-width center-txt">
                    <div id='profile-upload-panel' class="hide uninterupted-max-width absolute z-20 small-height">
                        <div class="center small-width minute-height">
                            <div onclick='document.getElementById("upload-image-button").click();document.getElementById("profile-upload-panel").classList.add("hide");' class="float-left minute-size circle success-bg white-txt padding-5">&#10004;</div>
                            <div class="float-right minute-size circle danger-bg white-txt padding-5 minute-line-height" onclick='document.getElementById("profile-upload-panel").classList.add("hide"); restoreDp("profilePicture");'>&#10006;</div>
                        </div>
                    </div>
                    <div  class='medium-small-size circle hide-overflow center white-bg'>
               <?php
                    $url = $user -> get_dp_url();
                    //echo "<img src='$url' class='profilePicture'/>"
                    echo "<img src='$url' id='profilePicture' onclick='document.getElementById(\"fileField\").click(); document.getElementById(\"profile-upload-panel\").classList.remove(\"hide\")' class='uninterupted-max-width'>";

                ?>
                </div>
                <form action="./assets/php/upload.php" method="post" enctype="multipart/form-data">
                 <input id='fileField' type='file' name='fileToUpload' onchange="showImage(this, 'profilePicture');" accept='image/*' class='hide'>
                 <input type="submit" class="button center-txt hide" value="Upload Image" class="absolute z-20 top-50" name="submit" id="upload-image-button">
                </form>
            </div>
        </div>
       <div class=" uninterupted-max-width extra-small-height"></div>
        <div class='center-txt padding-20 vertical-padding-30 max-width'>

        <form method="post" action="./assets/php/requests.php" name="edit-profile" class="left-txt bold vertical-padding-10" enctype="multipart/form-data">
                <div id="profile-details-panel" class="center-txt">
                    <div class="vertical-margin-15">
                    <div class="subheading">Full Name</div>
                            <?php 
                            $name = $user->get_full_name(); 
                            echo "<div class='book vertical-margin-5'>$name</div>";?>
                    </div>
                    <div class="vertical-margin-15">        
                    <div class="subheading">Email</div>
                            <?php
                            $email = $user->get_email(); 
                            echo "<div class='book vertical-margin-5'>$email</div>";?>
                    </div>
                    <div class="vertical-margin-15">
                    <div class="subheading">Community</div>
                        <?php
                                $cid = $com-> get_all();
                                echo "<div class='book vertical-margin-5'>$cid</div>";?>
                    </div>
                    <div class="vertical-margin-15">
                        <div class="subheading">User Type</div>       
                        <?php
                                $type = $user-> get_type();
                                echo "<div class='book vertical-margin-5'>$type</div>";?>
                    </div>
                    <br>
                    <div onclick="hideThisMeShowThat('profile-details-panel','profile-edit-panel');" class="button primary-bg white-txt">Edit Profile</div>
                    <div onclick="document.getElementById('delete-profile-button').click();" class="button tertiary-bg white-txt">Deactivate Profile</div>
                    
                <input class="button hide white-txt" type="submit" value="Deactivate Account" id='delete-profile-button' name="deleteProfile" />
            
                </div>
                <div id='profile-edit-panel' class='hide left-txt'>
                    Full Name
                        <?php 
                        $name = $user->get_full_name(); 
                        echo "<input type='text' class='inputField' name='fullName' value='$name'/>";?>
                        
                        Community
                                <?php 
                                $code = $com-> get_all();
                                echo '<input id="community-search-input" type="text" autocomplete="off" onkeyup="search(\'suburbs\', \'community-search-input\');" class="inputField" value="'.$code.'" name="community"/>
                                <div id="community-datalist" class="unrestricted-max-width normal left-0 shadow absolute z-10 alt-bg footnote">
                                </div>';
                                ?>
                        
                    <br>
                        <div class="center-txt">
                        <input class="button success-bg white-txt" type="submit" value="Save" name="edit-profile" /> 
                        <input onclick="hideThisMeShowThat('profile-edit-panel', 'profile-details-panel');" class="button caution-bg white-txt" type="button" value="Cancel" name="cancel" /> 
                    </div>
            </div> 
            
        </form>
        
        </div>
    </body>
</html>