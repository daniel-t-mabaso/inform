<?php
    include("assets/php/session.php");
    include("assets/php/class_lib.php");
    if(!$_SESSION['auth']){
        header("Location: login.php");
    }
    else if(isset($_SESSION['user']) && $_SESSION['auth'] ){
        $user = unserialize($_SESSION['user']);
    }
?>
<!Doctype html>
<html>
<head>
        <?php
            include 'assets/php/dependencies.php';
        ?>
    <title>Preferences</title>
</head>

<body style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">
        
        <?php include("assets/php/header.php");?>
        
        <div class="vertical-padding-40 white-txt" style="background-color: skyblue; text-align: center">
        <h1 class="heading center-txt bold">PREFERENCES</h1>
        </div>
        <div class='center-txt padding-20 vertical-padding-10 max-width'>
            <!-- <div class="subheading vertical-margin-10">Edit your preferences below</div> -->
        <form name="preferences" method="POST" action="assets/php/requests.php"  class="left-txt vertical-padding-10">
        <div  class="center-txt">
            <div class="left-txt hide-overflow large-medium-height">
                
            <?php 
                    $preferences = $user->get_preferences();
                    echo '<div class="half-width  preference small-height center-txt float-left ';
                    if(!strpos($preferences, 'c')){
                        echo "unselected";
                    }
                        echo '">';
                ?>
                    <div class="small-width center hide-overflow">
                        <img class="max-width max-height" src='assets/media/images/crime-icon.png'>
                    </div>
                    Crime
                    <input class="hide" type="checkbox" name="crime">
                </div>
                <?php 
                    $preferences = $user->get_preferences();
                    echo '<div class="half-width  preference small-height center-txt float-left ';
                    if(!(strpos($preferences, 't'))){
                        echo "unselected";
                    }
                        echo '">';
                ?>
                    <div class="small-width center hide-overflow">
                        <img class="max-width max-height" src='assets/media/images/traffic-icon.png'>
                    </div>
                    Traffic
                    <input class="hide" type="checkbox" name="traffic">
                </div>
                
                <?php 
                    $preferences = $user->get_preferences();
                    echo '<div class="half-width  preference small-height center-txt float-left ';
                    if(!strpos($preferences, 'k')){
                        echo "unselected";
                    }
                    else{
                        $s = strpos($preferences, 'k');
                        echo $s;
                    }
                        echo '">';
                ?>
                    <div class="small-width center hide-overflow">
                        <img class="max-width max-height" src='assets/media/images/children-icon.png'>
                    </div>
                    Kids
                    <input class="hide" type="checkbox" name="kids">
                </div>
                
                <?php 
                    $preferences = $user->get_preferences();
                    echo '<div class="half-width  preference small-height center-txt float-left ';
                    if(!strpos($preferences, 'p')){
                        echo "unselected";
                    }
                        echo '">';
                ?>
                    <div class="small-width center hide-overflow">
                        <img class="max-width max-height" src='assets/media/images/pets-icon.png'>
                    </div>
                    Pets
                    <input class="hide" success-bg type="checkbox" name="pets">
                </div>
                
                <?php 
                    $preferences = $user->get_preferences();
                    echo '<div class="half-width  preference small-height center-txt float-left ';
                    if(!strpos($preferences, 's')){
                        echo "unselected";
                    }
                        echo '">';
                ?>
                    <div class="small-width center hide-overflow">
                        <img class="max-width max-height" src='assets/media/images/market-icon.png'>
                    </div>
                    Local Goods & Services
                    <input class="hide" type="checkbox" name="services">
                </div>
                
                <?php 
                    $preferences = $user->get_preferences();
                    echo '<div class="half-width  preference small-height center-txt float-left ';
                    if(!strpos($preferences, 'n')){
                        echo "unselected";
                    }
                        echo '">';
                ?>
                    <div class="small-width center hide-overflow">
                        <img class="max-width max-height" src='assets/media/images/news-icon.png'>
                    </div>
                    General News
                    <input class="hide" type="checkbox" name="news">
                </div>
           
        </div><div>
            <input class="button" type="submit" value="Done" name="preferences" />
        <div>
        </div>
        </form>
        </div>
        
</body>
</html>
