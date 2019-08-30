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
    $type = $_REQUEST["type"];
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
                    echo $card;
                }
                if($displayed==0){
                    echo "<div class='card max-width padding-20 center vertical-margin-20 exta-small-height shadow danger-bg white-txt center-txt bold'>Mmm... There's nothing for you
                        <div class='center-txt uninterupted-max-width footnote vertical-padding-5 italic normal'>Seems like there are no events for your community.</div></div>
                    ";
                }
            }
            else{
                echo "<div class='card max-width padding-20 center vertical-margin-20 exta-small-height shadow danger-bg white-txt center-txt bold'>Mmm... There's nothing for you
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
                    echo $card;
                }
                if($displayed==0){
                    echo "<div class='card max-width padding-20 center vertical-margin-20 exta-small-height shadow danger-bg white-txt center-txt bold'>Mmm... There's nothing for you
                        <div class='center-txt uninterupted-max-width footnote vertical-padding-5 italic normal'>No alerts for your community. To add an alert <a href='createAlert.php' class='underline'>click here</a></div></div>
                    ";
                }
            }
            else{
                echo "<div class='card max-width padding-20 center vertical-margin-20 exta-small-height shadow danger-bg white-txt center-txt bold'>Mmm... There's nothing for you
                    <div class='center-txt uninterupted-max-width footnote vertical-padding-15 italic normal'>We're not sure what you want to see.<br><a class='underline' href='preferences.php'>Set your preferences</a></div></div>
                ";
                
            }
            break;
    }
    
    echo $output;
    
?>
