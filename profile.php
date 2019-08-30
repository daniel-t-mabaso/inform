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

        <div class="vertical-padding-50 white-txt uninterupted-max-width extra-small-height primary-bg center-txt">
                <!--This is where the picture goes-->
               <div class="absolute z-10  uninterupted-max-width center-txt">
                    <div id='profile-upload-panel' class="hide uninterupted-max-width absolute z-20 small-height">
                        <div class="center small-width minute-height">
                            <div onclick='document.getElementById("upload-image-button").click();document.getElementById("profile-upload-panel").classList.add("hide");' class="float-left minute-size circle success-bg white-txt padding-5 shadow">&#10004;</div>
                            <div class="float-right minute-size circle danger-bg white-txt padding-5 minute-line-height shadow" onclick='document.getElementById("profile-upload-panel").classList.add("hide"); restoreDp("profilePicture");'>&#10006;</div>
                        </div>
                    </div>
                    <div  class='small-size circle hide-overflow center white-bg shadow'>
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
                <div id='profile-edit-panel' class='hide left-txt'>
                    Full Name
                        <?php 
                        $name = $user->get_full_name(); 
                        echo "<input type='text' class='inputField' name='fullName' value='$name'/>";?>
                        
                        Community
                                <?php 
                                $code = $user-> get_base_communities();
                                echo '<input id="community-search-input" type="text" autocomplete="off" onkeyup="search(\'suburbs\', \'community-search-input\');" class="inputField" placeholder="'.$code.'" name="community"/>
                                <div id="community-datalist" class="unrestricted-max-width normal left-0 shadow absolute z-10 alt-bg footnote">
                                </div>';
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