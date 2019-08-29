<?php
//header here
    include('assets/php/message.php');
?>
<div id="menu-overlay" class="uninterupted-max-height hide uninterupted-max-width black-bg z-30 fixed unselected" onclick="toggleMenu();"></div>
<div class="fixed z-50 uninterupted-max-height minute-width">
    <div id="navigation-panel" class="absolute z-50 hide uninterupted-max-height small-medium-width padding-30 white-bg float-left">
        <a href="index.php"><div class="max-width padding-20">Home</div></a>
        <a href="events.php"><div class="max-width padding-20">Events</div></a>
        <a href="alerts.php"><div class="max-width padding-20">Alerts</div></a>
        <a href="preferences.php"><div class="max-width padding-20">My Preferences</div></a>
        <a href="profile.php"><div class="max-width padding-20">Profile</div></a>
        <a href="settings.php"><div class="max-width padding-20">Settings</div></a>
        <a href="logout.php"><div class="max-width padding-20">Logout</div></a>
    </div>
    <div id='menu-button' class="white-bg z-40 unselected shadow padding-5 hide-overflow vertical-padding-30 extra-small-size primary-txt subheading float-left bold" onclick="toggleMenu();"><img class="unresticted-max-width" alt='Vertical menu icon' src="assets/media/images/vertical-menu-icon.png"></div>
</div>