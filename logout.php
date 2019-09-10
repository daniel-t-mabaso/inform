<?php

if(isset($_SESSION)){

    session_destroy();

}

else{

    session_start();

    session_destroy();

}
$_SESSION['message'] = "success~Logged out successfully";
header('location: ./');

?>