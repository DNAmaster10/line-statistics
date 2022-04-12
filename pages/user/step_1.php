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
        <p>Enter either the counter ID (found on a sign within the counter) OR enter names of the two stations the counter sits between below</p><br>
        <p>Counter ID: <input type="text" id="counter_id_entry_box" name="counter_id" placeholder="e.g: 63">
        <p>OR:</p><br>
        <p>Station 1: </p><input type="text" id="station1_entry" name="station1" placeholder="e.g: ZN1">
        <p>Station 2: </p><input type="text" id="station2_entry" name="station2" placeholder="e.g: ZN2"><br>
        <p>Riders since last check</p><input type="text" name="rider_ammount" placeholder="e.g: 12">
        <input type="submit" value="Next">
    </form>
    <p><?php if (isset($error_message)) {echo $error_message;} ?></p>
</html>
