<?php
    session_start();
    include $_SERVER["DOCUMENT_ROOT"]."/includes/dbh.php";
    if (!isset($_POST["username"] {
        $_SESSION["error_message"] = "Please enter a username";
        header ("location: ./login.php");
    }
    if (!isset($_POST["password"] {
        $_SESSION["error_message"] = "Pleaser enter a password";
        header ("location: ./login.php");
    }
    $username = $conn -> real_escape_string($_POST["username"]);
    $password = $conn -> real_sscape_string($_POST["password"]);
    $table_name = "users";
    $column_name = "password";
    $where_column = "username";
    $where_value = $username;
    include $_SERVER["DOCUMENT_ROOT"]."/includes/get_single.php";
    if ($result == "null") {
        $_SESSION["error_message"] = "Username or password not recognised";
    }
    else {
        if (!$password = $result) {
            $_SESSION["error_message"] = "Username or password not recognised";
            header ("location: ./login.php")
        }
        else {
            unset ($_SESSION["error_message"]);
            $_SESSION["username"] = $username;
            $_SESSION["password"] = $password;
            header ("location: ./logged_in_home");
        }
    }
?>
