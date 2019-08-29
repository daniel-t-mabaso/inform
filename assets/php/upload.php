<?php
include("session.php");
include("local_class_lib.php");
if(!$_SESSION['auth']){
    header("Location: login.php");
}
else if(isset($_SESSION['user']) && $_SESSION['auth'] ){
    $user = unserialize($_SESSION['user']);
}

try {
    $server = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'inform';
    // Try Connect to the DB with mysqli_connect function - Params {hostname, userid, password, dbname}
    $dbc = mysqli_connect($server, $username, $password, $database);
    
} catch (mysqli_sql_exception $e) { // Failed to connect? Lets see the exception details..
    // echo "MySQLi Error Code: " . $e->getCode() . "<br />";
    // echo "Exception Msg: " . $e->getMessage();
    exit; // exit and close connection.
}
$target_dir = "../../uploads/";
$target_dir_2 = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$target_file_2 = $target_dir_2 . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

echo $target_file;
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 1;
}

if ($_FILES["fileToUpload"]["size"] > 5000000) {
    echo "Sorry, your file is too large.";
    
    $uploadOk = 0;
}



if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";

}
else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file) || $uploadOk == 1 ) {
        $user -> set_dp_url($target_file_2);
        $email = $user->get_email();
        $sql = "UPDATE `users` SET `media_url` = '$target_file_2' WHERE `email` = '$email'";
        mysqli_query($dbc, $sql);
        $_SESSION['user'] = serialize($user);
        header("Location: ../../profile.php");

    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>