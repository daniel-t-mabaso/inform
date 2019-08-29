<?php session_start();
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
        

        $user_email = $user-> get_email();

        //update user's preferences in the database
        $sql = "UPDATE `users` SET `filters` = '$preferences' WHERE `email` = '$user_email'";
        mysqli_query($dbc, $sql);
        
        //update user's preferences in the user object
        $user->set_preferences($preferences);

        //update serialized user object
        $_SESSION['user'] = serialize($user);
        $_SESSION['message'] = 'success~Preferences Updated';
        echo '<script>
                window.location = "../../index.php";
                </script>';
        }
        else if (isset($_POST['register-community'])){
                $code = explode(" ", $_POST['community']);
                $code = join('', $code);
                $code = explode(",", $code);
                $code = $code[3];
                if (!is_numeric($code) || $code == '' || !$code ){
                        $_SESSION['message'] = "danger~No Such Community";
                        echo '<script>
                                window.location = "../../communityRegister.php";
                                </script>';
                        
                      
                }else{
                        $user_email = $user-> get_email();
        
                        //update user's community in the database
                        $sql = "UPDATE users SET base_cid = '$code' WHERE email = '$user_email';";
                        mysqli_query($dbc, $sql);
                        
                        //update user's community in the user object
                        $user->set_base_communities($code);
        
                        //update serialized user object
                        $_SESSION['user'] = serialize($user);
                        $_SESSION['message'] = "success~Community Updated";
                        echo '<script>
                                window.location = "../../preferences.php";
                                </script>';
                }
                
        }
        else if(isset($_POST['edit-profile'])){
                $name = $_POST['fullName'];
                $email = $user->get_email();
                $code = $_POST['community'];
                if(strpos($code, ',')){
                        $code = explode(" ", $code);
                        $code = join('', $code);
                        $code = explode(",", $code);
                        $code = $code[3];
                }
                

                
                $sql = "UPDATE users SET base_cid = '$code',   `name` = '$name' WHERE email = '$email';";
                mysqli_query($dbc, $sql);

                $user->set_full_name($name);
                $user->set_base_communities($code);
                $_SESSION['message'] = "success~Profile Updated";
                $_SESSION['user'] = serialize($user);
                echo '<script>
                        window.location = "../../profile.php";
                        </script>';
        }
    }
    else{
        //else take user to login
        echo '<script>
                window.location = "../../login.php";
                </script>';
    }
?>