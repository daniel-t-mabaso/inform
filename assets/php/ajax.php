<?php session_start();?>
<?php
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
    $search_term = $_REQUEST["term"];
    switch($type){
        case 'suburbs':
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
            //get user preferences
            //get user community

            //search DB for posts with preferences belonging to community

            //loop through results creating obj

            //call display function for each post.
            break;
    }
    
    echo $output;
    
?>
