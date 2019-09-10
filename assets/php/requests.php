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
                    $preferences .= 'g';
                
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

                        $query = "SELECT * FROM communities WHERE code = '$code';";
                        $result = mysqli_query($dbc, $query);
                        $array = mysqli_fetch_array($result, MYSQLI_ASSOC);
                        $com = new Community;
                        $com -> set_details($array['suburb'], $array['code'], $array['city'], $array['province']);

                        $_SESSION['community'] = serialize($com);
        
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
                $url =$user->get_dp_url();
                //echo "$url";
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

                $query = "SELECT * FROM communities WHERE code = '$code';";
                $result = mysqli_query($dbc, $query);
                $array = mysqli_fetch_array($result, MYSQLI_ASSOC);
                $com = new Community;
                $com -> set_details($array['suburb'], $array['code'], $array['city'], $array['province']);

                $_SESSION['community'] = serialize($com);
                $_SESSION['message'] = "success~Profile Updated";
                $_SESSION['user'] = serialize($user);
                echo '<script>
                        window.location = "../../profile.php";
                        </script>';
        }
        else if(isset($_POST['edit-post'])){
                $id = $_POST['post-id'];
                $title = mysqli_real_escape_string($dbc, $_POST['post-title']);
                $description = mysqli_real_escape_string($dbc, $_POST['post-description']);
                if(getimagesize($_FILES["postUrl"]["tmp_name"])){
                        //upload new file
                        $target_dir = "../media/images/";
                        $target_dir_2 = "assets/media/images/";
                        $target_file = $target_dir . basename($_FILES["postUrl"]["name"]);
                        $target_file_2 = $target_dir_2 . basename($_FILES["postUrl"]["name"]);
                        $uploadOk = 1;
                        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

                        echo $target_file;
                        if (file_exists($target_file)) {
                        echo "Sorry, file already exists.";
                        $uploadOk = 1;
                        }

                        if ($_FILES["postUrl"]["size"] > 5000000) {
                        echo "Sorry, your file is too large.";
                        
                        $uploadOk = 0;
                        }



                        if ($uploadOk == 0) {
                        echo "Sorry, your file was not uploaded.";

                        }
                        else {
                                if (move_uploaded_file($_FILES["postUrl"]["tmp_name"], $target_file) || $uploadOk == 1 ) {
                                        $url = $target_file_2;

                                } else {
                                        $url = '-';
                                        echo "Sorry, there was an error uploading your file.";
                                }
                        }
                }else{
                $url = $_POST['post-url-original'];
                echo "Image not set";
                }
                $start = $_POST['post-start'];
                $end = $_POST['post-end'];
                //echo "$url";
        
                $sql = "UPDATE posts SET title = '$title', descrip = '$description', media_url = '$url', start = '$start', end = '$end' WHERE pid = '$id';";
                mysqli_query($dbc, $sql);

                $_SESSION['message'] = "success~Post Updated";
                $_SESSION['user'] = serialize($user);
                echo '<script>
                        window.location = "../../myPosts.php";
                        </script>';
        
        }
        else if(isset($_POST['delete-post'])){
                $id = $_POST['post-id'];
        
                $sql = "DELETE FROM posts WHERE pid = '$id';";
                mysqli_query($dbc, $sql);

                $_SESSION['message'] = "success~Post Deleted";
                $_SESSION['user'] = serialize($user);
                echo '<script>
                        window.location = "../../myPosts.php";
                        </script>';
        }
        else if(isset($_POST['deleteProfile'])){
                $type = $user->get_type();
                if($type === "global admin")
                        {
                                $_SESSION['message'] = "danger~Cannot deactivate Global Admin";
                                echo '<script>
                                        window.location = "../../profile.php";
                                        </script>';
                                
                        }
                else{
                        $email = $user->get_email();
                
                        $sql = "UPDATE `users` SET `type` = 'deactivated' WHERE `email` = '$email'";
                        mysqli_query($dbc, $sql);
                        echo $type;
                        $_SESSION['message'] = "success~Account Deactivated - $type";
                        $_SESSION['user'] = serialize($user);
                        echo '<script>
                                window.location = "../../logout.php";
                                </script>';
                }
        }
}
    else{
        //else take user to login
        echo '<script>
                window.location = "../../login.php";
                </script>';
    }
?>