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
            $new_rider_count_string = $conn->real_escape_string($_POST["rider_ammount"]);
            if (is_numeric($new_rider_count_string)) {
                $new_rider_count_int = intval($new_rider_count_string);
                $stmt = $conn->prepare("SELECT UnixTime FROM riderData WHERE CounterId=?;";
                $stmt = $conn->bind_param("i",$counter_id);
                $raw_result = $stmt->execute();
                if ($raw_result->num_rows > 0) {
                    $row = $raw_result->fetch_assoc();
                    $result = $row["UnixTime"];
                    unset ($row);
                    unset ($raw_result);
                    $unix_last_update = intval($result);
                    $current_unix_time = time();
                    if ($current_unix_time - 24*60*60 < $unix_last_update) {
                        $_SESSION["step_1_error_message"] = "That counter was update less that 24 hours ago";
                        header ("location: ./upload_data.php");
                    }
                    else {
                        $dtime = $current_unix_time - $unix_last_update;
                        $days_since = $dtime / 86400;
                        $rider_average = $new_rider_count_int / $days_since;
                        $stmt = "INSERT INTO riderData (counterId,RiderCount,UnixTime,Uploader,ActualData)
                        if ($days_since < 2) {
                            $stmt = "INSERT INTO riderData (counterId,RiderCount,UnixTime,Uploader,ActualData)
                        }
                        for (i=0; i < $days_since; i++) {
                            $stmt = "INSERT INTO riderData (CounterId,RiderCount,UnixTime,Uploader,ActualData) VALUES ($counter_id,$rider_average,
                        }
                    }
                }
                else {
                    $result = "null";
                }
            }
            else {
                $_SESSION["step_1_error_message"] = "Please enter a valid number for the rider count";
                header ("location: ./upload_data.php");
            }
        }
    }
    else if ($selection == "code") {

    }
    else {
        $_SESSION["step_1_error_message"] = "There was an error with the input type selection radio button.";
        header ("location: ./upload_data.php");
    }
?>
