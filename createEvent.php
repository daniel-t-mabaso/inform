
<?php
    include("assets/php/session.php");
    include("assets/php/local_class_lib.php");
    include("assets/php/connect.php");
    if(!$_SESSION['auth']){
        header("Location: login.php");
    }
    else if(isset($_SESSION['user']) && $_SESSION['auth'] ){
        $user = unserialize($_SESSION['user']);
    }

if($_SESSION['auth']!= true){
    
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
        <title>Create Event</title>
        <?php
            include 'assets/php/dependencies.php';
        ?>
</head>
<body class="white-bg">
        <?php include("assets/php/header.php");?>
        <div class="vertical-padding-40 grey-txt bold-txt alt-bg center-txt">
            <h1 class='heading'>New Event</h1>
        </div>
        <div class='center-txt padding-20 vertical-padding-30 max-width'>
        <form method="post" action="" name="createEvent" class="left-txt vertical-padding-10" enctype="multipart/form-data">
            Event Type:
            <select class="inputField" name="eventTypes[]" multiple multiple size="6">
                <option value="crime">Crime</option>
                <option value="traffic">Traffic</option>
                <option value="children">Children</option>
                <option value="pets">Pets</option>
                <option value="services">Local Goods & Services</option>
                <option value="news">General News</option>
            </select>
            <br><br>
            Title:
            <input class="inputField" name="title" type="text" required >
            <br><br>
            Details:
            <textarea class="detailField" name="details" type="text"  placeholder="Fill in details regarding alert here" required></textarea>
            <br><br>
            <div class="book center-txt">
                <input class="book" type="checkbox" id='upload-image-checkbox' onclick="document.getElementById('upload-image-panel').classList.toggle('hide');" name="newImage">Upload Image<br>
                <div class="hide  left-txt imageBorder" id="upload-image-panel">

                   <input type="file" name="imageAlert" accept="image/*" >
                   <!--<input type="submit" name="submit" value = "upload" class="button center-txt"> -->
                   
                </div>
            </div>
            <br>
            From:
            <input class="inputField" name="startDate" type="datetime-local" required >
            <br>
            To:
            <input class="inputField" name="endDate" type="datetime-local" required >
            <div class="center-txt">
            <input class="button" type="submit" value="Post" name="post"> 
            <div>
        </form>

        <?php // Putting the information into the data base
        function typecheck($choices){
            switch($choices){
                case "crime":
                    return ($type = "c");
                    break;
                case "traffic":
                    return($type = "t");
                    break;
                case "children":
                    return($type = "k");
                    break;
                case "pets":
                    return($type = "p");
                    break;
                case "services":
                    return($type = "s");
                    break;
                case "news":
                    return($type = "g");
                    break;
            }
        }


        // GENERAL

        

        if (isset($_POST["post"])){
            $user_email = $user->get_email();
            $pid = mysqli_real_escape_string($dbc, time().$user_email);
            $title = mysqli_real_escape_string($dbc, $_POST['title']);
            $details = mysqli_real_escape_string($dbc,$_POST['details']);
            $startDate = mysqli_real_escape_string($dbc,$_POST['startDate']);
            $endDate = mysqli_real_escape_string($dbc,$_POST['endDate']);
            $enum = "event";
            $community = 0000;
            $url="-";
            $filter = "-";
            foreach($_POST['eventTypes'] as $filteradd){
                $filter = $filter.typecheck($filteradd);
            }
          
            //uploading an image
            if(isset($_POST["newImage"])){
                $target_dir_2 = "assets\media\images";
                $target_file= $target_dir_2 . basename($_FILES["imageAlert"]["name"]);
                $url=$target_file;
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                if ($_FILES["imageAlert"]["size"] > 90000000) {
                    echo "Sorry, your file is too large.";
                    
                    $uploadOk = 0;
                }
                
                if ($uploadOk == 0) {
                    echo "Sorry, your file was not uploaded.";
                
                }
                else {
                    if (move_uploaded_file($_FILES["imageAlert"]["tmp_name"], $target_file) || $uploadOk == 1 ) {
                        
                        echo"event has been created";
                
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                } 
            }
            
            

            
            $sql = "INSERT INTO posts(title, descrip, start, end, media_url, type, cid, filter_code ) 
            VALUES ('$title', '$details','$startDate','$endDate','$url','$enum',0000,'$filter')";
            $mybool = mysqli_query($dbc, $sql);


            // WE NOW HAVE THE DATA TO MAKE AN EVENT OBJECT
            $my_event = new Event();
            $my_event->get_details($pid, $title, $details, $startDate, $endDate, $url, $community, $user_email);
            //$_SESSION['event'] = serialize($my_event); // We'll see about this

            /***
            // DATABASE SHANDIS
            $sql = "INSERT INTO posts(pid, title, descrip, start, end, media_url, type, cid, filter_code, user_email) 
                    VALUES ('$pid','$title', '$details','$startDate','$endDate','$url','$enum',$community,'$filter','$user_email')";
            $mybool = mysqli_query($dbc, $sql);
            if ($mybool){
                echo "Got it";
            }
            else{
                echo "AnD i oOp: ".mysqli_error($dbc);
                
            }
            */
            // TO-DO:
            // FIND A MEANS TO INCLUDE INFORMATION ABOUT THE CID AND PERSON POSTING (try the _SESSION superglobal)
            // I/O FOR IMAGE FILES
            // INCLUSION OF THE ERROR MESSAGES 
            // MOVING OF PHP CODE TO THE REQUEST FILE

            

            



        }

        ?>

        </body>
</div>


</html>