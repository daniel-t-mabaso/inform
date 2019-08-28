<?php
    include("session.php");
    include("local_class_lib.php");
    include("connect.php");
    
    if(isset($_SESSION['user']) && $_SESSION['auth'] ){
        $user = unserialize($_SESSION['user']);
    }

    if(isset($_SESSION['auth'])){
        // only do stuff if a user is logged in
        if(isset($_POST['preferences'])){
            //preferences form was submitted
            $preferences = '-';//padded with - because strpos() returns 0 if character found in first position. This messes up logic
            
            if(isset($_POST['crime'])){
                    $preferences .= 'c';
                
            }
            if(isset($_POST['traffic'])){
                    $preferences .= 't';
                
            }
            if(isset($_POST['kids'])){
                    $preferences .= 'k';
                
            }
            if(isset($_POST['pets'])){
                    $preferences .= 'p';
                
            }
            if(isset($_POST['services'])){
                    $preferences .= 's';
                
            }
            if(isset($_POST['news'])){
                    $preferences .= 'n';
                
            }
        }

        $user_email = $user-> get_email();

        //update user's preferences in the database
        $sql = "UPDATE `users` SET `filters` = '$preferences' WHERE `email` = '$user_email'";
        mysqli_query($dbc, $sql);
        
        //update user's preferences in the user object
        $user->set_preferences($preferences);

        //update serialized user object
        $_SESSION['user'] = serialize($user);
        $_SESSION['message'] = 'success~Preferences successfully updated!';
        echo '<script>
                window.location = "../../preferences.php";
                </script>';

    }
    else{
        //else take user to login
        header("Location: login.php");
    }
?>