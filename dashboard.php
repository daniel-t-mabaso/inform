<?php
    include("assets/php/session.php");
    include("assets/php/class_lib.php");
    if(!$_SESSION['auth']){
        header("Location: login.php");
    }
    else if(isset($_SESSION['user']) && $_SESSION['auth'] ){
        $user = unserialize($_SESSION['user']);
    }
    if(isset($_SESSION['community']) && $_SESSION['auth'] ){
        $com = unserialize($_SESSION['community']);
    }

if($_SESSION['auth']!= true){
    
    header("Location: login.php");
}

if(!($user->get_type() === 'local admin' || $user->get_type() === 'global admin')){
    echo '<script>
        window.location = "index.php";
    </script>';
}
?>
<!DOCTYPE html>
<html>
<head>
    <?php
        include 'assets/php/dependencies.php';
    ?>
    <title>Dashboard</title>
</head>

<body  class="alt-bg left-txt">
    
    <?php include("assets/php/header.php");?>
    
    
    <div class="vertical-padding-40 white-txt primary-bg center-txt">
            <h1 class='title'>Dashboard</h1>
        </div>
    <div class="large-medium-height">
    <div class='padding-20 vertical-padding-10 max-width'>
        <!-- Local Admin Dashboard -->
    <div id="dashboard-navigation-panel" class="extra-small-width vertical-margin-50 fixed  z-20 right-0">
        <div class="uninterupted-max-width uninterupted-max-height black-bg unselected absolute z-n10"></div>
        <div id="view-posts-button" onclick="selectThisOverOther(this, 'dashboard-navigation-item'); hideAll('dashboard-panel');toggleThis('posts-panel'); getStats(document.getElementById('list-posts-panel'), 'load-posts');" class="dashboard-navigation-item extra-small-size center vertical-padding-15 center-txt"><img class="uninterupted-max-height" src='./assets/media/images/posts-icon.png'/></div>
        <div id="view-users-button" onclick="selectThisOverOther(this, 'dashboard-navigation-item'); hideAll('dashboard-panel');toggleThis('users-panel'); getStats(document.getElementById('list-users-panel'), 'load-users');" class="dashboard-navigation-item extra-small-size center vertical-padding-15 center-txt"><img class="uninterupted-max-height" src='./assets/media/images/users-icon.png'/></div>
        <div id="view-communities-button" onclick="selectThisOverOther(this, 'dashboard-navigation-item'); hideAll('dashboard-panel');toggleThis('communities-panel'); getStats(document.getElementById('list-communities-panel'), 'load-communities');" class="dashboard-navigation-item extra-small-size center vertical-padding-15 center-txt"><img class="uninterupted-max-height" src='./assets/media/images/communities-icon.png'/></div>
        <div id="view-stats-button" onclick="selectThisOverOther(this, 'dashboard-navigation-item'); hideAll('dashboard-panel'); toggleThis('stats-panel');" class="dashboard-navigation-item extra-small-size center vertical-padding-15 center-txt"><img class="uninterupted-max-height" src='./assets/media/images/stats-icon.png'/></div>
    </div>


    <div id="posts-panel" class="hide dashboard-panel padding-20 max-width">
        <div class="heading bold center-txt">Posts</div>
        <div id="list-posts-panel"></div>
    </div>
    <div id="users-panel" class="hide dashboard-panel padding-20 max-width">
        <div class="heading bold center-txt">Users</div>
        <div id="list-users-panel"></div>
    </div>
    <div id="communities-panel" class="hide dashboard-panel padding-20 max-width">
        <div class="heading bold center-txt">Communities</div>
        <div id="search-panel" class='vertical-padding-15'><input type='text' class='inputField' placeholder='Search' onchange="search(this, 'list-communities-panel');"></div>
        <div id="list-communities-panel"></div>
    </div>
    <div id="stats-panel" class="hide dashboard-panel padding-20 max-width">
        <div class="heading bold center-txt">Statistics</div>
        <div class="footnote bold center-txt medium-small-width center">
<?php if($user->get_type() === 'global admin'){
    echo "for all communities";
}else if($user->get_type() === 'local admin'){
    $name = $com->get_all();
    echo "for your community $name";
}
?></div><br>
        <div id='post-stats-panel' class="vertical-padding-10 vertical-margin-10 max-width white-bg padding-20 card shadow" onclick="getStats(this, 'post-stats');"><b>View Post Statistics</b></div>

        <div id='user-stats-panel' class="vertical-padding-10 vertical-margin-10 max-width white-bg padding-20 card shadow" onclick="getStats(this, 'user-stats');"><b>View User Statistics</b></div>
        <div id='community-stats-panel' class="vertical-padding-10 vertical-margin-10 max-width white-bg padding-20 card shadow" onclick="getStats(this, 'community-stats');"><b>View Community Statistics</b></div>
    </div>
    <!-- Global Admin Dashboard -->
<?php if($user->get_type() === 'global admin'){?>
    
    <?php }?>
    <div class="max-height center max-width margin-20 center-txt">
        
    </div>
</div>
<div id='null'></div>
</body>
</html>