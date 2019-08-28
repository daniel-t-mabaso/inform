<!DOCTYPE html>
<html>
<head>
        <title>Create Alert</title>
        <?php
            include 'assets/php/dependencies.php';
        ?>
</head>
<body style="background-color: white;" >
        <div class="vertical-padding-10 grey-txt bold-txt" style="text-align: center">
            <h1 class='heading'>NEW ALERT</h1>
        </div>
        <div class='center-txt padding-20 vertical-padding-30 max-width'>
            <form method="post" action="" name="createAlert" class="left-txt vertical-padding-10">
            Alert Template:
            <select class="inputField" name="alertTemplate" required>
                <option name="crimeOccurence">Crime Occurence</option>
                <option name="trafficIncident">Traffic Incident</option>
                <option name="recommendations">Recommendations/Referrals</option>
                <option name="lost">Lost Persons/Pets</option>
                <option name="sales">Sales</option>
            </select>
            
            <br><br>
            Title:
            <input class="inputField" name="title" type="text" required>
            <br><br>
            Details:
            <textarea class="detailField" name="details" type="text"  placeholder="Fill in details regarding alert here" required></textarea>
            <br><br>
            <div class="output">
                <div class="crimeO">
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

                <div class="trafficI">
                Time of Occurence:
                    <input class="inputField" name="timeOfTraffic" type="datetime-local" required>
                    <br><br>
                Estimated Delay:
                    <input class="inputField" name="estimatedDelay" type="time" required>
                    <br><br>
                </div>

                <div class="referrals">
                    <div class="book center-txt">
                    <input class="book" type="checkbox" id='upload-image-checkbox' onclick="document.getElementById('upload-image-panel').classList.toggle('hide');" name="newImage">Upload Image<br>
                    <div class="hide  left-txt imageBorder" id="upload-image-panel">
                    <input type="file" name="imageAlert" accept="image/*" >
                    </div>
                    </div>
                </div>

                <div class="lostObjs">
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

                <div class="salesDivision">

                </div>

            </div>

            <script>
                $(function () {
                $("#alertTemplate").change(function() {
                    var val = $(this).val();
                if(name === "crimeO") {
                    $("crimeO").show();
                    $("#lostObjs").hide();
                    }
                else if(name === "client_form") {
                    $("#client_graph_form").show();
                    $("#pilot_graph_form").hide();
                }
             });
            }); 
            </script>
            </form>
        </div>
</body>

</html>