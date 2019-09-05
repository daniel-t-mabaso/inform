<?php 
    session_start();
    include("local_class_lib.php");
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

    $output = '';
    $type = strtolower($_REQUEST["type"]);
    switch($type){
        case 'suburbs':
            $search_term = $_REQUEST["term"];
            $query = "SELECT * FROM `communities` WHERE suburb LIKE '$search_term%';";
            $result = mysqli_query($dbc, $query);
            $count = 0;
            
            while ($count < 3 && $row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                
                $count++;
                $tmp =trim(preg_replace('/\s\s+/', ' ', $row['suburb'].", ".$row['city'].", ".$row['province'].", ".$row['code']));
                $output .= "<div onclick='changeValue(\"community-search-input\", \"$tmp\"); hideElement(\"community-datalist\");' class='max-width center-txt padding-20 vertical-padding-0'>$tmp</div>";
            }
            
            break;

        case 'events':
            $user = unserialize($_SESSION['user']);
            //get user email
            $email = $user -> get_email();
            //get user preferences
            $preferences = str_split($user -> get_preferences());
            $filters = '';
            for($i=0; $i < count($preferences); $i++){
                if($i==0){
                    continue;
                }
                $x = $preferences[$i];
                if ($i == 1){
                    $filters .= "filter_code LIKE '%$x%' ";
                }
                else{
                    $filters .= "OR filter_code LIKE '%$x%'";
                }
            }
            if ($filters != ''){
                //get user community
                $cid = $user -> get_base_communities();

                //search DB for posts with preferences belonging to community
                $query = "SELECT * FROM posts WHERE type = 'event' AND cid LIKE '%$cid%' AND ($filters) ORDER BY start ASC;";
                $result = mysqli_query($dbc, $query);
                $count = 0;
                $displayed = 0;
                //loop through results creating obj
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    $displayed++;
                    $event = new Event;
                    
                    $event->set_details($row['pid'], $row['title'], $row['descrip'], $row['start'], $row['end'], $row['media_url'], $row['cid'], $row['filter_code'], $row['user_email']);
                    //call display function for each post.
                    $card = $event -> display();
                    $output = $card;
                }
                if($displayed==0){
                    $output = "<div class='card max-width padding-20 center vertical-margin-20 exta-small-height shadow danger-bg white-txt center-txt bold'>Mmm... There's nothing for you
                        <div class='center-txt uninterupted-max-width footnote vertical-padding-5 italic normal'>Seems like there are no events for your community.</div></div>
                    ";
                }
            }
            else{
                $output = "<div class='card max-width padding-20 center vertical-margin-20 exta-small-height shadow danger-bg white-txt center-txt bold'>Mmm... There's nothing for you
                <div class='center-txt uninterupted-max-width footnote vertical-padding-15 italic normal'>We're not sure what you want to see.<br><a class='underline' href='preferences.php'>Set your preferences</a></div></div>
                ";
            }
            break;

        case 'alerts':
            $user = unserialize($_SESSION['user']);
            //get user email
            $email = $user -> get_email();
            //get user preferences
            $preferences = str_split($user -> get_preferences());
            $filters = '';
            for($i=0; $i < count($preferences); $i++){
                if($i==0){
                    continue;
                }
                $x = $preferences[$i];
                if ($i == 1){
                    $filters .= "filter_code LIKE '%$x%' ";
                }
                else{
                    $filters .= "OR filter_code LIKE '%$x%'";
                }
            }
            if ($filters != ''){
                //get user community
                $cid = $user -> get_base_communities();

                //search DB for posts with preferences belonging to community
                $query = "SELECT * FROM posts WHERE type = 'alert' AND cid LIKE '%$cid%' AND ($filters) ORDER BY start ASC;";
                $result = mysqli_query($dbc, $query);
                $count = 0;
                $displayed = 0;
                //loop through results creating obj
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    $displayed++;
                    $alert = new Alert;
                    
                    $alert->set_details($row['pid'], $row['title'], $row['descrip'], $row['start'], $row['end'], $row['media_url'], $row['cid'], $row['filter_code'], $row['user_email']);
                    //call display function for each post.
                    $card = $alert -> display();
                    $output = $card;
                }
                if($displayed==0){
                    $output = "<div class='card max-width padding-20 center vertical-margin-20 exta-small-height shadow danger-bg white-txt center-txt bold'>Mmm... There's nothing for you
                        <div class='center-txt uninterupted-max-width footnote vertical-padding-5 italic normal'>No alerts for your community. To add an alert <a href='createAlert.php' class='underline'>click here</a></div></div>
                    ";
                }
            }
            else{
                $output = "<div class='card max-width padding-20 center vertical-margin-20 exta-small-height shadow danger-bg white-txt center-txt bold'>Mmm... There's nothing for you
                    <div class='center-txt uninterupted-max-width footnote vertical-padding-15 italic normal'>We're not sure what you want to see.<br><a class='underline' href='preferences.php'>Set your preferences</a></div></div>
                ";
                
            }
            break;

        case 'my-events':
            $user = unserialize($_SESSION['user']);
            //get user email
            $email = $user -> get_email();

                //search DB for posts with preferences belonging to community
                $query = "SELECT * FROM posts WHERE type = 'event' AND pid LIKE '%$email%' ORDER BY start ASC;";
                $result = mysqli_query($dbc, $query);
                $count = 0;
                $displayed = 0;
                //loop through results creating obj
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    $displayed++;
                    $event = new Event;
                    
                    $event->set_details($row['pid'], $row['title'], $row['descrip'], $row['start'], $row['end'], $row['media_url'], $row['cid'], $row['filter_code'], $row['user_email']);
                    //call display function for each post.
                    $card = $event -> displayEditable();
                    $output = $card;
                }
                if($displayed==0){
                    $output = "<div class='card max-width padding-20 center vertical-margin-20 exta-small-height shadow danger-bg white-txt center-txt bold'>Mmm... There's nothing for you
                        <div class='center-txt uninterupted-max-width footnote vertical-padding-5 italic normal'>Seems like there are no events for your community.</div></div>
                    ";
                }
            break;

        case 'my-alerts':
            $user = unserialize($_SESSION['user']);
            //get user email
            $email = $user -> get_email();
            //get user preferences
            
            //search DB for posts with preferences belonging to community
            $query = "SELECT * FROM posts WHERE type = 'alert' AND pid LIKE '%$email%' ORDER BY start ASC;";
            $result = mysqli_query($dbc, $query);
            $count = 0;
            $displayed = 0;
            //loop through results creating obj
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $displayed++;
                $alert = new Alert;
                
                $alert->set_details($row['pid'], $row['title'], $row['descrip'], $row['start'], $row['end'], $row['media_url'], $row['cid'], $row['filter_code'], $row['user_email']);
                //call display function for each post.
                $card = $alert -> displayEditable();
                $output = $card;
            }
            if($displayed==0){
                $output = "<div class='card max-width padding-20 center vertical-margin-20 exta-small-height shadow danger-bg white-txt center-txt bold'>Mmm... There's nothing for you
                    <div class='center-txt uninterupted-max-width footnote vertical-padding-5 italic normal'>No alerts for your community. To add an alert <a href='createAlert.php' class='underline'>click here</a></div></div>
                ";
            }
            break;
        case 'post-stats':
            $user = unserialize($_SESSION['user']);
            //get user email
            $email = $user -> get_email();
            $cid = $user -> get_base_communities();
            $type = $user -> get_type();
            //get user preferences
            
            //search DB for posts with preferences belonging to community
            $query = "SELECT * FROM posts;";
            if(!$type=='global admin'){
                $query = "SELECT * FROM posts WHERE cid = '$cid';";
            }
            $result = mysqli_query($dbc, $query);
            $events = 0;
            $alerts = 0;
            //loop through results creating obj
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                if($row['type']=='event'){
                    $events++;
                }
                else if($row['type']=='alert'){
                    $alerts++;
                }
                //call display function for each post.
            }
            $output = "<div class'bold max-width center-txt float-left'><div class='subheading bold vertical-padding-10'>Post Statistics</div></div><div class='extra-small-height'><div class='half-width float-left'>Events<br>$events</div><div class='half-width float-left'>Alerts<br>$alerts</div></div><div class='button secondary-bg white-txt' onclick='getStats(document.getElementById(\"community-stats-panel\"), \"community-stats\");'>Refresh</div>";
            break;
        case 'user-stats':
            $user = unserialize($_SESSION['user']);
            //get user email
            $email = $user -> get_email();
            $cid = $user -> get_base_communities();
            $type = $user -> get_type();
            //get user preferences
            
            //search DB for posts with preferences belonging to community
            
            $query = "SELECT * FROM users";
            if($type=='local admin'){
                $query = "SELECT * FROM users WHERE base_cid = '$cid';";
            }
            $result = mysqli_query($dbc, $query);
            $users = 0;
            $unv_org = 0;
            $org = 0;
            $admins = 0;
            //loop through results creating obj
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                if($row['type']=='community member'){
                    $users++;
                }
                else if($row['type']=='unverified organisation'){
                    $unv_org++;
                }
                else if($row['type']=='organisation'){
                    $org++;
                }
                else if($row['type']=='local admin'){
                    $admins++;
                }
                //call display function for each post.
            }
            $output = "<div class'max-width center-txt float-left'><div class='subheading bold vertical-padding-10'>User Statistics</div></div><div>Community Members: $users<br>Unverified Organisations: $unv_org<br>Verified Organisations: $org<br>Community(Local) Admins: $admins</div><div class='button secondary-bg white-txt' onclick='getStats(document.getElementById(\"user-stats-panel\"), \"user-stats\");'>Refresh</div>";
            break;
        case 'community-stats':
            $user = unserialize($_SESSION['user']);
            //get user email
            $email = $user -> get_email();
            $cid = $user -> get_base_communities();
            $type = $user -> get_type();
            //get user preferences
            
            //search DB for posts with preferences belonging to community
            $query = "SELECT * FROM communities;";
            if($type=="local admin"){
                $query = "SELECT * FROM communities WHERE code = '$cid';";
            }
            $result = mysqli_query($dbc, $query);
            $count = 0;
            //loop through results creating obj
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    $count++;
                //call display function for each post.
            }
            $output = "<div class'bold max-width center-txt'><div class='subheading bold vertical-padding-10'>My Community Statistics</div></div><div class='uninterupted-max-width'>Total Communities: $count</div><div class='button secondary-bg white-txt' onclick='getStats(document.getElementById(\"community-stats-panel\"), \"community-stats\");'>Refresh</div>";
            break;
        case 'load-posts':
            $user = unserialize($_SESSION['user']);
            //get user email
            $email = $user -> get_email();
            $cid = $user -> get_base_communities();
            $type = $user -> get_type();
            //get user preferences
            
            //search DB for posts with preferences belonging to community
            if($type=="local admin"){
            $query = "SELECT * FROM posts WHERE cid = '$cid';";}
            else{
                $query = "SELECT * FROM posts;";
            }
            $result = mysqli_query($dbc, $query);
            $count = 0;
            $output ="";
            //loop through results creating obj
            while ($count< 50 && $row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $count++;
                //call display function for each post.
                if($row['type']=='event'){
                    $post = new Event;
                    $post->set_details($row['pid'], $row['title'], $row['descrip'], $row['start'], $row['end'], $row['media_url'], $row['cid'], $row['filter_code'], $row['user_email']);
                }
                else if($row['type']=='alert'){
                    $post = new Alert;
                    $post->set_details($row['pid'], $row['title'], $row['descrip'], $row['start'], $row['end'], $row['media_url'], $row['cid'], $row['filter_code'], $row['user_email']);
                }
                $output .= $post->displayEditable();
            }
            break;
        case 'load-users':
            $user = unserialize($_SESSION['user']);
            //get user email
            $email = $user -> get_email();
            $cid = $user -> get_base_communities();
            $type = $user -> get_type();
            //get user preferences
            
            //search DB for posts with preferences belonging to community
            if($type=="local admin"){
            $query = "SELECT * FROM users WHERE base_cid = '$cid';";}
            else{
                $query = "SELECT * FROM users;";
            }
            $result = mysqli_query($dbc, $query);
            $count = 0;
            //loop through results creating obj
            while ($count< 50 && $row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $count++;
                //call display function for each post.
                $user = new User;
                $user->set_details($row['name'], $row['email'], $row['type'], 'active', $row['media_url'], $row['filters'], $row['base_cid'], '');
                $output .= $user->displayAll();
            }
            break;
        case 'load-communities':
            $user = unserialize($_SESSION['user']);
            //get user email
            $email = $user -> get_email();
            $cid = $user -> get_base_communities();
            $type = $user -> get_type();
            //get user preferences
            
            //search DB for posts with preferences belonging to community
            if($type=="local admin"){
            $query = "SELECT * FROM communities WHERE code = '$cid';";}
            else{
                $query = "SELECT * FROM communities;";
            }
            $result = mysqli_query($dbc, $query);
            $count = 0;
            //loop through results creating obj
            while ( $row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $count++;
                //call display function for each post.
                $com = new Community;
                $com->set_details($row['suburb'], $row['code'], $row['city'], $row['province']);
                $output .= $com->displayAll();
            }
            break;
        case 'verify':
            $email = $_REQUEST["email"];
            //get user email
            
            $query = "UPDATE `users` SET `type` = 'organisation' WHERE `email` = '$email'";
            $result = mysqli_query($dbc, $query);
            $output = "<div class='padding-20 vertical-padding-50 max-width max-height padding-20 vertical-padding-50 success-bg'>User Verified</div>";
            
            break;
        case 'unverify':
            $email = $_REQUEST["email"];
            //get user email
            
            $query = "UPDATE `users` SET `type` = 'unverified organisation' WHERE `email` = '$email'";
            $result = mysqli_query($dbc, $query);
            $output = "<div class='max-width max-height padding-20 vertical-padding-50 success-bg'>User Unverified</div>";
            
            break;
        case 'make admin':
            $email = $_REQUEST["email"];
            //get user email
            
            $query = "UPDATE `users` SET `type` = 'local admin' WHERE `email` = '$email'";
            $result = mysqli_query($dbc, $query);
            $output = "<div class='max-width max-height padding-20 vertical-padding-50 success-bg'>User Now Admin</div>";
            
            break;
        case 'make member':
        $user = unserialize($_SESSION['user']);
            $email = $_REQUEST["email"];
            //get user email
            $my_email = $user->get_email();
            if($email != $my_email){
                $query = "UPDATE `users` SET `type` = 'community member' WHERE `email` = '$email'";
                $result = mysqli_query($dbc, $query);
                $output = "<div class='max-width padding-20 vertical-padding-50 max-height success-bg'>User Now Member</div>";
            }
            else{
                $output = "<div class='max-width padding-20 vertical-padding-50 max-height danger-bg'>Can't update own type</div>";
            }   
            break;
    }
    
    echo $output;
?>
