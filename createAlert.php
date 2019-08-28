<?php
    include("assets/php/session.php");
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
        <div class="vertical-padding-40 grey-txt bold-txt alt-bg" style="text-align: center">
            <h1 class='heading'>NEW ALERT</h1>
        </div>
        <div class='center-txt padding-20 vertical-padding-30 max-width'>
            <form method="post" action="" name="createAlert" class="left-txt vertical-padding-10">
            Alert Template:
            <select class="inputField" id="alertTemplate" onchange="myFunction()" required>
                <option value="crimeOccurence">Crime Occurence</option>
                <option value="trafficIncident">Traffic Incident</option>
                <option value="recommendations">Recommendations/Referrals</option>
                <option value="lost">Lost Persons/Pets</option>
                <option value="sales">Sales</option>
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
                    <input class="book" type="checkbox" id='upload-image-checkbox' onclick="document.getElementById('upload-image-panel').classList.toggle('hide');" name="newImage">Upload Image<br>
                    <div class="hide  left-txt imageBorder" id="upload-image-panel">
                    <input type="file" name="imageAlert" accept="image/*" >
                    </div>
                     </div>
                Time of Occurence:
                    <input class="inputField" name="timeOfCrime" type="datetime-local" required>
                    <br><br>
                </div>

                <div id="trafficI" style="display: none">
                Time of Occurence:
                    <input class="inputField" name="timeOfTraffic" type="datetime-local" required>
                    <br><br>
                Estimated Delay:
                    <input class="inputField" name="estimatedDelay" type="time" required>
                    <br><br>
                </div>

                <div id="referrals" style="display: none">
                    <div class="book center-txt">
                    <input class="book" type="checkbox" id='upload-image-checkbox' onclick="document.getElementById('upload-image-panel').classList.toggle('hide');" name="newImage">Upload Image<br>
                    <div class="hide  left-txt imageBorder" id="upload-image-panel">
                    <input type="file" name="imageAlert" accept="image/*" >
                    </div>
                    </div>
                </div>

                <div id="lostObjs" style="display: none">
                        <div class="book center-txt">
                        <input class="book" type="checkbox" id='upload-image-checkbox' onclick="document.getElementById('upload-image-panel').classList.toggle('hide');" name="newImage">Upload Image<br>
                        <div class="hide  left-txt imageBorder" id="upload-image-panel">
                        <input type="file" name="imageAlert" accept="image/*" >
                        </div>
                    </div>
                    Last Seen:
                    <input class="inputField" name="lastSeen" type="datetime-local" required>
                    <br><br>
                </div>
                <div class="center-txt">
            <input class="button" type="submit" value="Post" name="post"> 
            <div>
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
</body>

</html>