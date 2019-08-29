<?php
include("session.php");
include("local_class_lib.php");
if(!$_SESSION['auth']){
    header("Location: login.php");
}
else if(isset($_SESSION['user']) && $_SESSION['auth'] ){
    $user = unserialize($_SESSION['user']); // WAIT
}

$target_dir = "../../event_uploads/";
$target_dir_2 = "event_uploads/";
$target_file = $target_dir . basename($_FILES["imageAlert"]["name"]);
$target_file_2 = $target_dir_2 . basename($_FILES["imageAlert"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

echo $target_file;
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 1;
}

if ($_FILES["imageAlert"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    
    $uploadOk = 0;
}



if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";

}
else {
    if (move_uploaded_file($_FILES["imageAlert"]["tmp_name"], $target_file) || $uploadOk == 1 ) {
        
        // DO STUFF HERE

        $_SESSION['user'] = serialize($user); // WAIT
        header("Location: ../../events.php");

    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>