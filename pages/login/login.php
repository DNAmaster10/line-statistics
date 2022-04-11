<?php
    session_start();
    if (isset $_SESSION("login_error_message") {
        $error_message = $_SESSION("login_error_message");
        unset($_SESSION("login_error_message");
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
    </head>
    <body>
        <p>Login to MRT line statistics</p>
        <form action="./login_submit.php" method="POST">
            <input type="text" placeholder="Username" name="username">
            <input type="text" placeholder="Password" name="password">
            <input type="submit" value="Login">
        </form>
        <p><?php if(isset($error_message)) {echo $error_message;} ?></p>
    </body>
</html>
