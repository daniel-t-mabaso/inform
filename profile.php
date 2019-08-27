<!Doctype html>
<html>
<head>
        <?php
            include 'assets/php/dependencies.php';
        ?>
    <body style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">
        <div class="vertical-padding-40 white-txt" style="background-color: skyblue; text-align: center">
                <!--This is where the picture goes-->
                <img src="image.png" class="profilePicture" style="background-color: white" >
               
        </div>
       
        <div class='center-txt padding-20 vertical-padding-30 max-width'>
            <form method="post" action="./" class="center-txt vertical-padding-10">
                Full Name:<br>
                        <input required type="text" class="inputField" name="fullName" placeholder="Mickey Mouse" >
                        <br>
                Email:<br>
                        <input required type="email" class="inputField" name="email" placeholder="mickeyMouse@gmail.com">
                        <br>
                Community Zip Code:<br>
                        <input type="text" class="inputField" style="width: 91%" name="zipCode" required>
                        <datalist>
                        </datalist>
            </form>
            <div class="book center-txt">
                <input type="checkbox" name="newCommunity">New Community<br>
            </div>
            <input class="button center-txt" type="submit" value="Save" name="save" />   
            <input class="button center-txt" style="background-color: grey;" type="submit" value="Deactivate Account" name="deleteProfile" /> 
        </div>
    </body>
</html>