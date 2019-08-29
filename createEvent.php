
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
        <form method="post" action="" name="createEvent" class="left-txt vertical-padding-10">
            Event Type:
            <select class="inputField" name="eventTypes[ ]" multiple multiple size="6">
                <option value="crime">Crime</option>
                <option value="traffic">Traffic</option>
                <option value="children">Children</option>
                <option value="pets">Pets</option>
                <option value="services">Local Goods & Services</option>
                <option value="news">General News</option>
            </select>
            <br><br>
            Title:
            <input class="inputField" name="title" type="text" >
            <br><br>
            Details:
            <textarea class="detailField" name="details" type="text"  placeholder="Fill in details regarding alert here" ></textarea>
            <br><br>
            <div class="book center-txt">
                <input class="book" type="checkbox" id='upload-image-checkbox' onclick="document.getElementById('upload-image-panel').classList.toggle('hide');" name="newImage">Upload Image<br>
                <div class="hide  left-txt imageBorder" id="upload-image-panel">

                   <form action="../../uploadEvent.php" method="POST" enctype="multipart/form-data">
                   <input type="file" name="imageAlert" accept="image/*" >
                   <input type="submit" name="submit" value = "upload" class="button center-txt">
                   </form>

                   
                </div>
            </div>
            <br>
            From:
            <input class="inputField" name="startDate" type="datetime-local" >
            <br>
            To:
            <input class="inputField" name="endDate" type="datetime-local" >
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
        if (isset($_POST["post"])){
            $title = mysqli_real_escape_string($dbc, $_POST['title']);
            
            $details = mysqli_real_escape_string($dbc,$_POST['details']);
            $startDate = mysqli_real_escape_string($dbc,$_POST['startDate']);
            $endDate = mysqli_real_escape_string($dbc,$_POST['endDate']);
            $choices = $_POST['eventTypes']; // PROBLEM: A single string - only one option
            
            $url = "-";
            $enum = "event";

            // FIND A WAY TO DO THE IMAGE I/O to the assets folder
            if (isset($_POST["imageAlert"]) && $_POST["imageAlert"] !== ""){ // PROBLEM: Look over this again
                $url =  mysqli_real_escape_string($dbc,$_POST["imageAlert"]);
            }

            // creating the list of filters
            $filter = "-";
            foreach($choices as $filteradd){
                
                $filter = $filter.typecheck($filteradd);
            }
            
            
            $sql = "INSERT INTO posts(title, descrip, start, end, media_url, type, cid, filter_code ) VALUES ('$title', '$details','$startDate','$endDate','$url','$enum',0000,'$filter')";
            $mybool = mysqli_query($dbc, $sql);

            if ($mybool){
                echo "Got it";
            }
            else{
                echo "AnD i oOp: ".mysqli_error($dbc);
                
            }

            // TO-DO:
            // FIND A MEANS TO INCLUDE INFORMATION ABOUT THE CID AND PERSON POSTING (try the _SESSION superglobal)
            // I/O FOR IMAGE FILES
            // INCLUSION OF THE ERROR MESSAGES 
            // MOVING OF PHP CODE TO THE REQUEST FILE

            $myEvent = new Event();

            



        }

        ?>

        </body>
</div>


</html>