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
            Alert Type:
            <select class="inputField" name="alertTypes" required>
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
            <input class="inputField" name="startDate" type="date" required>
            <br>
            To:
            <input class="inputField" name="endDate" type="date" required>
            <div class="center-txt">
            <input class="button" type="submit" value="Post" name="post"> 
            <div>
        </form>
        </body>
</div>


</html>