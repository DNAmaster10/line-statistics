<?php
    session_start();
    include $_SERVER["DOCUMENT_ROOT"]."/includes/dbh.php";
    include $_SERVER["DOCUMENT_ROOT"]."/includes/check_login.php";
    if (isset($_SESSION["step_1_error_message"] {
        $error_message = $_SESSION["step_1_error_message"];
        unset($_SESSION["step_1_error_message"];
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Upload Data</title>
    </head>
    <p>This page can be used to upload newest rider counts. For more information on how to upload data, click here</p>
    <form action="./step_2.php" method="POST">
        <p>Line: </p><input id="line_name_entry" type="text" name="line_name" placeholder="e.g: Zephyr">
        <input type="submit" value="next">
    </form>
    <p><?php if (isset($error_message)) {echo $error_message;} ?></p>
</html>
