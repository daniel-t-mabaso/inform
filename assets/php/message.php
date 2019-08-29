<?php
    if(isset($_SESSION['message'])){
        $input = explode("~", $_SESSION['message']);
        $message = $input[1];
        $colour = $input[0];

        echo "<div class='pop-up-notification subheading center white-txt bold center-txt $colour-bg max-width padding-20 vertical-padding-50 bottom-0 z-10 fixed' onload='disappearAfter(this, 2000);'>$message</div>";
        unset($_SESSION['message']);
    }else{
        echo "<script>console.log('No message.')</script>";
    }
?>