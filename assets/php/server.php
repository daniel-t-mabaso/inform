<?php
    @include 'assets/php/session.php';
    include 'assets/php/connect.php';

    if($_SESSION['auth']===false){
        
        $errors = array();

        // echo 'not logged in';
        if(isset($_POST['login'])){
            
            $email = strtolower(mysqli_real_escape_string($dbc, $_POST['email']));
            $password = mysqli_real_escape_string($dbc, $_POST['password']);

            if (empty($email)){
                array_push($errors, "* Email is required");
            }

            if (empty($password)){
                array_push($errors, "* Password is required");
            }
            //continue to login
            if (count($errors)==0){
                //fetch data
                $query = "SELECT * FROM users WHERE email = '$email'";
                $result = mysqli_query($dbc, $query);
                if (isset($result)){
                    $array = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    $email = $array['email'];
                    $user_hash = $array['password'];
                    $user_type = $array['type'];
                    mysqli_free_result($result);

                    if($email){
                    if (password_verify($password, $user_hash)){
                        $me = new User;
                        $me-> set_details($array['name'], $array['email'], $array['type'], 'active', 'assets/media/images/user_placeholder.png', $array['filters'], '', '');//to edit base com and prefered com
                        $mes = serialize($me);
                        $_SESSION['auth'] = true;
                        $_SESSION['user'] = $mes;
                        $array="";

                        echo '<script>
                        window.location = "index.php";
                        </script>';
                    }
                    else{
                        $user_hash="";
                        
                        array_push($errors, "* Your email/password is incorrect.");
                    }

                    }else{
                        array_push($errors, "* Mmmmh... seems like you're not registered. <a href='registration.php'> now!</a>");
                    } 
                }
            } 
        }

        if (isset($_POST['register'])){
            $fullName = mysqli_real_escape_string($dbc, $_POST['fullName']);
            $email = mysqli_real_escape_string($dbc, $_POST['email']);   
            $password1 = mysqli_real_escape_string($dbc, $_POST['password']);   
            $password2 = mysqli_real_escape_string($dbc, $_POST['confirmPassword']);   
            $type = 'com_mem';
            if(isset($_POST['organisation'])){
                $type = 'organ';
            }
            if (empty($fullName)){
                array_push($errors, "* Full name is required");
            }
            
            if (empty($email)){
                array_push($errors, "* Email is required");
            }
            if (empty($password1)){
                array_push($errors, "* Password is required");
            }
            if (strlen($password1) <6){
                array_push($errors, "* Password must be at least 6 characters long");
            }
            if ($password1 != $password2){
                array_push($errors, "* The two passwords do not match");
            }

            $query = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($dbc, $query);
            if (isset($result) && mysqli_fetch_array($result, MYSQLI_ASSOC)['email']==$email){
                array_push($errors, "* Email already in use");
            }
            
            mysqli_free_result($result);
            if (count($errors) == 0){
                $options = array('cost'=>11);
                
                $hash = password_hash($password1, PASSWORD_BCRYPT, $options);

                $sql = "INSERT INTO users (name, email, password, type, base_cid, filters)
                            VALUES ('$fullName', '$email','$hash','$type', 0, '-')";
                mysqli_query($dbc, $sql);

                $me = new User;
                $me-> set_details($fullName, $email, $type, 'active', 'assets/media/images/user_placeholder.png', '-', '', '');
                $mes = serialize($me);
                $_SESSION['auth'] = true;
                $_SESSION['user'] = $mes;

                echo '<script>
                window.location = "preferences.php";
                </script>';
            }
        
        }
    }
?>