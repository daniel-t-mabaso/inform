<?php
 if (!isset($_SESSION)){
    //start session if not already started.
    session_start();
}


if(!isset($_SESSION['auth']) || !isset($_SESSION['user'])){
    //User not logged in
    $_SESSION['auth'] = false;
    //If auth is true then user is logged in.
}
/***
 * IMPORTANT
 * Ensure that this file is imported on line 1 of the file.
 * **/
?>