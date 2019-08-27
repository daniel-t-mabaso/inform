<!Doctype html>
<html>
<head>
        <?php
            include 'assets/php/dependencies.php';
        ?>
<head>

<body style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">
        <div class="vertical-padding-40 white-txt" style="background-color: skyblue; text-align: center">
        <h1 class="heading center-txt bold">PREFERENCES</h1>
        </div>
        <div class='center-txt padding-20 vertical-padding-30 max-width'>
        <form name="preferences" method="POST" action=""  class="left-txt vertical-padding-10">
        <div  class="center-txt">
            <div class="left-txt">
            <input type="checkbox" name="crime"> Crime
            <br>
            <br>
            <br>
            <input type="checkbox" name="traffic"> Traffic
            <br>
            <br>
            <br>
            <input type="checkbox" name="children"> Children
            <br>
            <br>
            <br>
            <input type="checkbox" name="pets"> Pets
            <br>
            <br>
            <br>
            <input type="checkbox" name="localServices"> Local Services and Goods
            <br>
            <br>
            <br>
            <input type="checkbox" name="generalNews"> General News
            <br>
            <br>
            <br>
        </div>
            <input class="button" type="submit" value="Save" name="save" />
            <br>
            <input class="button" type="submit" value="Discard" name="discard" />
            <br>
        </div>
        </form>
        </div>
        
</body>
</html>
