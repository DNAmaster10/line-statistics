<?php
    include $_SERVER["DOCUMENT_ROOT"]."/includes/dbh.php";
    include $_SERVER["DOCUMENT_ROOT"]."/includes/check_login.php";
    $selection = $conn->real_escape_string($_POST["codeOrId"]);
    if ($selection == "id") {
        $counter_id = $conn->real_escape_string($_POST["counter_id"]);
        $table_name = "counters";
        $column_name = "CounterId";
        $where_column = "CounterId";
        $where_value = $counter_id;
        include $_SERVER["DOCUMENT_ROOT"]."/includes/get_single_where_string.php";
        if ($result == "null") {
            $_SESSION["step_1_error_message"] = "A counter with that ID could not be found";
            header ("location: ./upload_data.php");
        }
        else {


        }
    }
    else if ($selection == "code") {

    }
    else {
        $_SESSION["step_1_error_message"] = "There was an error with the input type selection radio button.";
        header ("location: ./upload_data.php");
    }
?>
