<?php
    if (!isset($_SESSION["username"])) {
        $_SESSION["login_error_message"] = "Your session has expired";
        header ("location: /pages/login/login.php");
    }
    if (!isset($_SESSION["password"])) {
        $_SESSION["login_error_message"] = "Your session has expired";
        header ("location: /pages/login/login.php");
    }
    $username = $conn->real_escape_string($_SESSION["username"]);
    $password = $conn->real_escape_String{$_SESSION["password"]);
    $table_name = "users";
    $column_name = "password";
    $where_column = "username";
    $where_value = $username;
    include $_SERVER["DOCUMENT_ROOT"]."/includes/get_single_where_string.php";
    if (!$result == $password) {
        $_SESSION["login_error_message"] = "Your login session was invalid";
        header ("location: /pages/login/login.php");
    }
?>
