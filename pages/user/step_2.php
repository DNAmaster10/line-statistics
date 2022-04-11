<?php
    session_start();
    include $_SERVER["DOCUMENT_ROOT"]."/includes/dbh.php";
    include $_SERVER["DOCUMENT_ROOT"]."/includes/check_login.php";
    if (!isset($_POST["line_name"])) {
        $_SESSION["step_1_error_message"] = "Please enter a line name";
        header ("location: ./step_1.php");
    }
    $line_name = $conn->real_escape_string($_POST["line_name"]);
    $table_name = "counters";
    $column_name = "Line";
    $where_column = "Line";
    $where_value = $line_name;
    include $_SERVER["DOCUMENT_ROOT"]."/includes/get_single_where_string";
    if ($result == "null") {
        $_SESSION["step_1_error_message"] = "No counters exist on the ".$line_name." line.";
        header ("location: ./step_1.php");
    }
    else {
        $_SESSION["line_name"] = $line_name;
    }
?>
<!DOCTYPE html>
<html>
</html>
