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
    <body>
        <p>This page can be used to upload newest rider counts. For more information on how to upload data, click here</p>
        <form action="./step_2.php" method="POST">
            <p>Id </p><input type="radio" name="codeOrId" value="id" checked="checked" onclick="showId()">
            <p> Station Codes </p><input type="radio" name="codeOrId" value="code" onclick="showCode()">
            <div id="id_div">
                <p>Counter ID: <input type="text" id="counter_id_entry_box" name="counter_id" placeholder="e.g: 63">
            </div>
            <div id="code_div" style="display: none;">
                <p>Line: </p><input id="line_name_entry" type="text" name="line_name" placeholder="e.g: Zephyr">
                <p>Enter the station codes for the two stations either side of the counter</p>
                <p>Station 1: </p><input type="text" id="station1_entry" name="station1" id="station_name_entry_1" placeholder="e.g: ZN1">
                <p>Station 2: </p><input type="text" id="station2_entry" name="station2" id="station_name_entry_2" placeholder="e.g: ZN2"><br>
            </div>
            <p>Riders since last check</p><input type="text" name="rider_ammount" placeholder="e.g: 12" required>
            <input type="submit" value="Next">
        </form>
        <p><?php if (isset($error_message)) {echo $error_message;} ?></p>
    </body>
    <script>
        function showId() {
            document.getElementById("id_div").style.display = "block";
            document.getElementById("code_div").style.display = "none";
        }
        function showCode() {
            document.getElementById("id_div").style.display = "none";
            document.getElementById("code_div").style.display = "block";
        }
    </script>
</html>
