<?php
//header here
    include('assets/php/message.php');
    include('assets/php/pop-up.php');
?>
<div id="menu-overlay" class="uninterupted-max-height hide uninterupted-max-width black-bg z-30 fixed unselected" onclick="toggleMenu();"></div>
<div class="fixed z-50 uninterupted-max-height minute-width">
    <div id="navigation-panel" class="absolute z-50 hide uninterupted-max-height small-medium-width padding-30 white-bg black-txt float-left">
        <div class="absolute top-0 left-0 vertical-padding-20 uninterupted-max-width small-height primary-bg">
            <a href="profile.php"><div>
            <div  class='vertical-margin-10 half-width float-left hide-overflow'>
               <?php
                    $url = $user -> get_dp_url();
                    $type = strtoupper($user -> get_type());
                    $name = $user -> get_full_name();
                    //echo "<img src='$url' class='profilePicture'/>"
                    echo "<img src='$url' id='profilePicture' onclick='document.getElementById(\"fileField\").click(); document.getElementById(\"profile-upload-panel\").classList.remove(\"hide\")' class='small-small-size margin-15 vertical-margin-30 circle'>";
                    echo "</div><div class='heading vertical-padding-40 half-width float-left white-txt'>$name<div class='footnote vertical-padding-5'>$type</div>";
                ?>
                </div>
            </div>
        </a>
        </div>
        <div class="uninterupted-max-width vertical-padding-10 small-height"></div>
        <a href="index.php"><div class="max-width padding-20 vertical-padding-15"><img class="minute-size float-left" src="./assets/media/images/home-icon.png"/>  &nbsp;&nbsp;&nbsp;Home</div></a>
        <a href="events.php"><div class="max-width padding-20 vertical-padding-15"><img class="minute-size float-left" src="./assets/media/images/events-icon.png"/>  &nbsp;&nbsp;&nbsp;Events</div></a>
        <a href="alerts.php"><div class="max-width padding-20 vertical-padding-15"><img class="minute-size float-left" src="./assets/media/images/alerts-icon.png"/>  &nbsp;&nbsp;&nbsp;Alerts</div></a>
        <a href="myPosts.php"><div class="max-width padding-20 vertical-padding-15"><img class="minute-size float-left" src="./assets/media/images/posts-icon.png"/>  &nbsp;&nbsp;&nbsp;My Posts</div></a>
        <a href="preferences.php"><div class="max-width padding-20 vertical-padding-15"><img class="minute-size float-left" src="./assets/media/images/preferences-icon.png"/>  &nbsp;&nbsp;&nbsp;My Preferences</div></a>
        <a href="profile.php"><div class="max-width padding-20 minute-line-height vertical-padding-15"><img class="minute-size float-left" src="./assets/media/images/users-icon.png"/> &nbsp;&nbsp;&nbsp;Profile</div></a>
        <?php if($user->get_type()=='local admin' || $user->get_type()=='global admin'){
            echo '<a href="dashboard.php"><div class="max-width padding-20 vertical-padding-15"><img class="minute-size float-left" src="./assets/media/images/dashboard-icon.png"/>  &nbsp;&nbsp;&nbsp;Dashboard</div></a>';}?>
        <a href="logout.php"><div class="max-width padding-20 vertical-padding-15"><img class="minute-size float-left" src="./assets/media/images/logout-icon.png"/>  &nbsp;&nbsp;&nbsp;Logout</div></a>
        
    </div>
    <div id='menu-button' class="primary-bg z-40 unselected padding-5 hide-overflow vertical-padding-30 extra-small-size primary-txt subheading float-left bold" onclick="toggleMenu();"><img class="extra-small-size" alt='Vertical menu icon' src="assets/media/images/menu-icon-white.png"/></div>
</div>

