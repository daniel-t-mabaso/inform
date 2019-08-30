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
        <title>Create Alert</title>
        <?php
            include 'assets/php/dependencies.php';
        ?>
</head>
<body class="white-bg">
        <?php include("assets/php/header.php");?>
        <div class="vertical-padding-40 grey-txt bold-txt alt-bg center-txt">
            <h1 class='heading'>New Alert</h1>
        </div>
        <div class='center-txt padding-20 vertical-padding-30 max-width'>
            <form method="POST" action="" name="createAlert" class="left-txt vertical-padding-10" enctype="multipart/form-data">
            Alert Template:
            <select class="inputField" id="alertTemplate" name="alertTemplate" onchange="myFunction()" required>
                <option value="crimeOccurence">Crime Occurence</option>
                <option value="trafficIncident">Traffic Incident</option>
                <option value="recommendations">Recommendations/Referrals</option>
                <option value="lost">Lost Persons/Pets</option>
                <option value="sales">Sales</option>
                <option value="general">General News</option>
            </select>
            
            <br><br>
            Title:
            <input class="inputField" name="title" type="text" required>
            <br><br>
            Details:
            <textarea class="detailField" name="details" type="text"  placeholder="Fill in details regarding alert here" required></textarea>
            <br><br>
            
                <div id="crimeO" style="display: block">
                    <div class="book center-txt">
                    <input class="book" type="checkbox" id='upload-image-checkbox' onclick="document.getElementById('uploadCrimeImage').classList.toggle('hide');" name="newImage">Upload Image<br>
                    <div class="hide  left-txt imageBorder" id="uploadCrimeImage" >
                    <input type="file" name="alertImage" accept="image/*" >
                    </div>
                     </div>
                Time of Occurence:
                    <input class="inputField" name="time" type="datetime-local" >
                    <br><br>
                </div>

                <div id="trafficI" style="display: none">
                Time of Occurence:
                    <input class="inputField" name="time" type="datetime-local" >
                    <br><br>
                Estimated Delay:
                    <input class="inputField" name="estimatedDelay" type="time" >
                    <br><br>
                </div>

                <div id="referrals" style="display: none">
                    <div class="book center-txt">
                    <input class="book" type="checkbox" id='upload-image-checkbox' onclick="document.getElementById('uploadRefImage').classList.toggle('hide');" name="newImage">Upload Image<br>
                    <div class="hide  left-txt imageBorder" id="uploadRefImage" >
                    <input type="file" name="referralAlertImage" accept="image/*" >
                    </div>
                    </div>
                </div>

                <div id="lostObjs" style="display: none">
                        <div class="book center-txt">
                        <input class="book" type="checkbox" id='upload-image-checkbox' onclick="document.getElementById('uploadLostpanel').classList.toggle('hide');" name="newImage">Upload Image<br>
                        <div class="hide  left-txt imageBorder" id="uploadLostpanel" >
                        <input type="file" name="lostAlertImage" accept="image/*" >
                        </div>
                    </div>
                    Last Seen:
                    <input class="inputField" name="lastSeen" type="datetime-local" >
                    <br><br>
                </div>
        Filters:
        <select class="inputField" name="eventTypes[]" multiple multiple size="6">
                <option value="crime">Crime</option>
                <option value="traffic">Traffic</option>
                <option value="children">Children</option>
                <option value="pets">Pets</option>
                <option value="services">Local Goods & Services</option>
                <option value="news">General News</option>
        </select>
        <div class="center-txt">

            <input class="button" type="submit" value="Post" name="post"> 
            
            
            <br><br>
        </div>
        </div>
            </form>
        <script>
            function myFunction() {
                var x=document.getElementById("alertTemplate").value;
                if(x==="crimeOccurence"){
                    document.getElementById("crimeO").style.display="block";
                    document.getElementById("trafficI").style.display="none";
                    document.getElementById("referrals").style.display="none";
                    document.getElementById("lostObjs").style.display="none";
                    
                }
                else if(x==="trafficIncident"){
                    document.getElementById("trafficI").style.display="block";
                    document.getElementById("crimeO").style.display="none";
                    document.getElementById("referrals").style.display="none";
                    document.getElementById("lostObjs").style.display="none";
                }
                else if(x==="recommendations"){
                    document.getElementById("referrals").style.display="block";
                    document.getElementById("trafficI").style.display="none";
                    document.getElementById("lostObjs").style.display="none";
                    document.getElementById("crimeO").style.display="none";
                }
                else if(x==="lost"){
                    document.getElementById("lostObjs").style.display="block";
                    document.getElementById("referrals").style.display="none";
                    document.getElementById("trafficI").style.display="none";
                    document.getElementById("crimeO").style.display="none";
                }
                else{
                    document.getElementById("lostObjs").style.display="none";
                    document.getElementById("referrals").style.display="none";
                    document.getElementById("trafficI").style.display="none";
                    document.getElementById("crimeO").style.display="none";
                }
            }
</script>

        <?php
            if (isset($_POST["post"])){
                $user_email = $user->get_email();
                $pid = mysqli_real_escape_string($dbc, time().$user_email);
                $title= mysqli_real_escape_string($dbc, $_POST['title']);
                $details=mysqli_real_escape_string($dbc,$_POST['details']);
                $alertTemplate=mysqli_real_escape_string($dbc,$_POST['alertTemplate']);
                $url="-";
                $choice="-";
                $enum="alert";
                $timeOccurrence="-";
                $estimatedDelay="-";
                $lastSeen="-";
                $choice="-";
                if($alertTemplate=="crimeOccurence"){
                    $choice="alertImage";
                    $timeOccurrence=mysqli_real_escape_string($dbc,$_POST['time']);
                }
                else if($alertTemplate=="lost"){
                    $choice="lostAlertImage";
                    $lastSeen=mysqli_real_escape_string($dbc,$_POST['lastSeen']);
                }
                else if($alertTemplate="recommendations"){
                    $choice="referralAlertImage";
                }
                else if($alertTemplate="trafficIncident"){
                    $timeOccurrence=mysqli_real_escape_string($dbc,$_POST['time']);
                    $estimatedDelay=mysqli_real_escape_string($dbc,$_POST['time']);
                }
               
            if(isset($_POST["newImage"])){
                $target_dir_2 = "assets\media\images";
                
                $target_file= $target_dir_2 . basename($_FILES["$choice"]["name"]);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                if ($_FILES["$choice"]["size"] > 90000000) {
                    echo "Sorry, your file is too large.";
                    
                    $uploadOk = 0;
                }
                
                if ($uploadOk == 0) {
                    echo "Sorry, your file was not uploaded.";
                
                }
                else {
                    if (move_uploaded_file($_FILES["$choice"]["tmp_name"], $target_file) || $uploadOk == 1 ) {
                        
                        $url=mysqli_real_escape_string($dbc,$target_file);
                
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                } 
            }
            /*// DATABASE SHANDIS
            $sql = "INSERT INTO posts(pid, title, descrip, start, end, media_url, type, cid, filter_code, user_email) 
                    VALUES ('$pid','$title', '$details','$startDate','$endDate','$url','$enum',$community,'$filter','$user_email')";
            
            $mybool = mysqli_query($dbc, $sql);
            if ($mybool){
                echo "Got it";
            }
            else{
                echo "AnD i oOp: ".mysqli_error($dbc);
                
            }

            $_SESSION['user'] = serialize($user);
            
            
             $_SESSION['message'] = 'success~Alert successfully created';

            

             echo '<script>
             window.location = "alerts.php";
         </script>';
            */
            }
        ?>
        
</body>

</html>