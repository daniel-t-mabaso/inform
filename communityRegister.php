<!DOCTYPE html>
<html>
        <?php
            include 'assets/php/dependencies.php';
        ?>

        <body style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">
            <div class="vertical-padding-40 white-txt" style="background-color: skyblue; text-align: center">
                <h1 class='title'>INFORM</h1>
                <h2 class='book'>Community Notice System</h2>
            </div>

            <div class='center-txt padding-20 vertical-padding-30 max-width'>
                <h1 class="heading">Join A Community</h1>
                <p class="book">Join a community<br>to get started.</p>
                <form method="post" action="./" class="left-txt vertical-padding-10">
                        Province:<br>
                        <select class="inputField" name="provinces" required>
                            <option name="gp">Gauteng</option>
                            <option name="kzn">Kwa-Zulu Natal</option>
                            <option name="fs">Free State</option>
                            <option name="nc">Northern Cape</option>
                            <option name="wc">Western Cape</option>
                            <option name="ec">Eastern Cape</option>
                            <option name="nw">North West</option>
                            <option name="mp">Mpumalanga</option>
                            <option name="lp">Limpopo</option>
                        </select><br>
                        City:<br>
                        <select name="city" class="inputField" required>
                            
                        </select><br>
                        Community Zip Code:<br>
                        <input type="text" class="inputField" style="width: 91%" name="zipCode" required>
                        <datalist>

                        </datalist>
                </form>
                <div class="book center-txt">
                            <input type="checkbox" name="newCommunity">New Community<br>
                </div>
                <input class="button center-txt" type="submit" value="Done" name="done" />        
            </div>
        </body>
</html>
