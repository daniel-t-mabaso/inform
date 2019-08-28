
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
            <select class="inputField" name="eventTypes" required multiple size="6">
                <option name="crime">Crime</option>
                <option name="traffic">Traffic</option>
                <option name="children">Children</option>
                <option name="pets">Pets</option>
                <option name="services">Local Goods & Services</option>
                <option name="news">General News</option>
            </select>
            <br><br>
            Title:
            <input class="inputField" name="title" type="text" required>
            <br><br>
            Details:
            <textarea class="detailField" name="details" type="text"  placeholder="Fill in details regarding alert here" required></textarea>
            <br><br>
            <div class="book center-txt">
                <input class="book" type="checkbox" id='upload-image-checkbox' onclick="document.getElementById('upload-image-panel').classList.toggle('hide');" name="newImage">Upload Image<br>
                <div class="hide  left-txt imageBorder" id="upload-image-panel">
                   <input type="file" name="imageAlert" accept="image/*" >
                </div>
            </div>
            <br>
            From:
            <input class="inputField" name="startDate" type="datetime-local" required>
            <br>
            To:
            <input class="inputField" name="endDate" type="datetime-local" required>
            <div class="center-txt">
            <input class="button" type="submit" value="Post" name="post"> 
            <div>
        </form>

        <?php // Putting the information into the data base
        function typecheck($choices){
            switch($choices){
                case "Crime":
                    return ($type = "c");
                    break;
                case "Traffic":
                    return($type = "t");
                    break;
                case "Children":
                    return($type = "k");
                    break;
                case "Pets":
                    return($type = "p");
                    break;
                case "Local Goods & Services":
                    return($type = "s");
                    break;
                case "General News":
                    return($type = "g");
                    break;
            }
        }
        if (isset($_POST["post"])){
            $title = $_POST['title'];
            $details = $_POST['details'];
            $startDate = "\"".$_POST['startDate']."\"";
            $endDate = "\"".$_POST['endDate']."\"";
            $choices = $_POST['eventTypes']; // A single string - only one option
            $url = "-";
            $enum = "event";
            /*if (isset($_POST["imageAlert"])){
                $url = $_POST["imageAlert"];
            }*/

            $filter = typecheck($choices);
            echo "Inserting... ";
            $sql = "INSERT INTO posts(start, end, media_url, type, cid, filter_code ) VALUES ('$startDate','$endDate','$url','$enum',0000,'$filter')";
            $mybool = mysqli_query($dbc, $sql);

            if ($mybool){
                echo "Got it";
            }
            else{
                echo "AnD i oOp: ".mysqli_error($dbc);
                
            }



            $myEvent = new Event();



        }

        ?>

        </body>
</div>


</html>