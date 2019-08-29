<?php
include("session.php");
include("local_class_lib.php");
if(!$_SESSION['auth']){
    header("Location: login.php");
}
else if(isset($_SESSION['user']) && $_SESSION['auth'] ){
    $user = unserialize($_SESSION['user']);
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

if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    
    $uploadOk = 0;
}



if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";

}
else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file) || $uploadOk == 1 ) {
        // $t = $user->get_dp_url();
        // echo $t.">";
        $user -> set_dp_url($target_file_2);
        // $t = $user->get_dp_url();
        // echo $t;
        $_SESSION['user'] = serialize($user);
        header("Location: ../../profile.php");

    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>