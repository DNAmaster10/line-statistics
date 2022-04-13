<?php
    session_start();
    include $_SERVER["DOCUMENT_ROOT"]."/includes/dbh.php";
    include $_SERVER["DOCUMENT_ROOT"]."/includes/check_login.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Home</title>
    </head>
    <body>
        <h1>Welcome back, <?php echo $username; ?></h1>
        <form action="./upload_data.php">
            <input type="submit" value="Upload Data">
        </form>
    </body>
</html>
