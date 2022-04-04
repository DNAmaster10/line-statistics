<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
    </head>
    <body>
        <p>Login</p>
        <form action="./login_submit.php" method="POST">
            <input type="text" name="username" placeholder="username">
            <input type="text" name="password" placeholder="password">
            <p><?php if(isset($_SESSION["error_message"])) {echo $_SESSION["error_message"]}?></p>
            <input type="submit" value="Login">
        </form>
    </body>
</html>
