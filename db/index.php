<?php
$errors = array();
if (isset($_POST['update-db'])){
    
    if(!isset($_POST['server']) || $_POST['server'] == ''){
        $server = 'localhost';
    }
    else{
        $server = $_POST['server'];
    }

    if(!isset($_POST['database']) || $_POST['database'] == ''){
        array_push($errors, "* Database Name field can't be empty.");
    }
    else{
        $database = $_POST['database'];
    }

    if(!isset($_POST['username']) || $_POST['username'] == ''){
        array_push($errors, "* Username field can't be empty.");
    }
    else{
        $username = $_POST['username'];
    }

        $password = $_POST['password'];

    
    if(count($errors)==0){
        //no errors so continue with update
        
        try {
            // Try Connect to the DB with mysqli_connect function - Params {hostname, userid, password, dbname}
            $dbc = mysqli_connect($server, $username, $password, $database);
            echo "connected!";
            $connected = "true";
        } catch (mysqli_sql_exception $e) { // Failed to connect? Lets see the exception details..
            // echo "MySQLi Error Code: " . $e->getCode() . "<br />";
            // echo "Exception Msg: " . $e->getMessage();
            exit; // exit and close connection.
        }
        if($connected == "true"){
            $file = ''. $database . '.sql';
            echo $file;

            $query = '';
            $sqlScript = file($file);
            foreach ($sqlScript as $line)	{
                
                $startWith = substr(trim($line), 0 ,2);
                $endWith = substr(trim($line), -1 ,1);
                
                if (empty($line) || $startWith == '--' || $startWith == '/*' || $startWith == '//') {
                    continue;
                }
                    
                $query = $query . $line;
                if ($endWith == ';') {
                    mysqli_query($dbc,$query) or die('<div class="error-response sql-import-response">Problem in executing the SQL query <b>' . $query. '</b></div>');
                    $query= '';		
                }
            }
                header("Location: updated.php");
            
        }
    }
}
else{
    // array_push($errors, "Not submitted");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<style>
@import url('https://fonts.googleapis.com/css?family=Montserrat');
html{
    font-family: 'Montserrat', sans-serif;
}
    .max-width{
        width: 100%;
    }
    .small-width{
        width: 400px;
    }
    .center-all{
        margin: 0 auto;
        margin-top: 50px;
    }
    .center-txt{
        text-align: center;
    }
    .left-txt{
        text-align: left;
    }
    .danger-txt{
        color: red;
    }
    .form-input{
        width: calc(100% - 15px * 2 - 1px * 2);
        display: block;
        height: 30px;
        line-height: 30px;
        padding: 5px;
        padding-left: 15px;
        padding-right: 15px;
        margin-bottom: 5px;
        margin-top: 5px;
        border: 1px solid gray;
        background-color: white;
        color: #2b2b2b;
    }
    .form-button{
        width: calc(100%);
        display: block;
        height: 30px;
        line-height: 30px;
        background-color: #2b2b2b;
        color: white;
        border: none;
        cursor: pointer;
    }
</style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Database update</title>
</head>
<body>
    
    <div class='small-width center-all center-txt'>
        <h1>INFORM<br>Database Update</h1>
        <p>Enter the database credentials below to update the database</p>  
        <form class='max-width' action="" method="post" name='database-update-form'>
            <input class='form-input' type='text' placeholder='Host (Blank if "localhost")' name='database'/>
            <input class='form-input' type='text' placeholder='Database Name' name='database'/>
            <input class='form-input' type='text' placeholder='Username' name='username'/>
            <input class='form-input' type='password' placeholder='Password' name='password'/>
            <input class='form-button' type='submit' name='update-db' value='Update'/>
        </form>
        <div style="color: red">
        <?php
            if (count($errors)>0): 
        ?>

        <div class="left-txt danger-txt">
            <?php
                foreach ($errors as $error):
            ?>
                <p><?php echo $error;?></p>
            <?php endforeach?>
        </div>
        <?php endif?>
        </div>
    </div>
</body>
</html>