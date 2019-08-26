<?php include("assets/php/session.php");

if($_SESSION['auth'] == true){
    //user is logged in. Redirect to home
    header("Location: home.php");
}
?>
<!DOCTYPE html>
<html>
    <body style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">
        <div style="background-color: skyblue; text-align: center">
            <h1 style="color: white; font-size:400%">INFORM</h1>
            <h2 style="color: white; font-size: 250%">Community Notice System</h2>
        </div>

        <div style="text-align: center">
            <h1 style="color: grey; font-size: 300%">SIGN IN</h1>
            <p style="color: skyblue; font-size: 200%">Enter your credentials below to sign in</p>
        </div>
        <div>
            <form style="color: skyblue; font-size:250%; ">
                Email:<br>
                <input style="border: 2px solid skyblue; background-color: lightgray; width: 80%; font-size: 100%" type="email" name="emailAddress" required><br>
                Password:<br>
                <input style="border: 2px solid skyblue; background-color: lightgray; width: 80%; font-size: 100%" type="password" name="password" required>
            </form>
            <br>
            <button type="button" onclick="location.href = 'home.html';" style="background-color:skyblue; color: white; border-radius: 10px; width: 30%; font-size: xx-large; justify-content: center ">Login</button>
            <br>
            <a href="registration.html" style="text-align: center; color: skyblue">Not registered? Sign up now.</a>
        </div>
    </body>
</html>
