<?php
    if(isset($_SESSION['message'])){
        $input = explode("~", $_SESSION['message']);
        $message = $input[1];
        $colour = $input[0];

        echo "<div id='message-panel' class='pop-up-notification book center white-txt bold center-txt $colour-bg max-width padding-20 vertical-padding-50 bottom-0 z-50 fixed' onload='disappearAfter(this, 2000);'>$message</div>";
        unset($_SESSION['message']);
    }else{
        echo "<div id='message-panel' class='pop-up-notification book center white-txt bold center-txt uninterupted-max-width hide bottom-0 z-50 fixed'></div>";
    }
?>