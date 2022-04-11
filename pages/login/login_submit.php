<?php
    session_start();
    include $_SERVER["DOCUMENT_ROOT"]."/includes/dbh.php";
    if (!isset($_POST["username"])) {
        $_SESSION["login_error_message"] = "Please enter a valid username";
        header ("location: ./login.php");
    }
    if (!isset($_POST["password"])) {
        $_SESSION["login_error_message"] = "Please enter a valid password";
        header ("location: ./login.php");
    }
    $username = $conn->real_escape_string($_POST["username"]);
    $password = $conn->real_escape_string($_POST["password"]);
    $table_name = "users";
    $column_name = "password";
    $where_column = "username";
    $where_value = $username;
    include $_SERVER["DOCUMENT_ROOT"]."/includes/get_single_where_string.php";
    if ($result == "null") {
        $_SESSION["login_error_message"] = "The entered username or password was invalid";
        header ("location: ./login.php");
    }
    else {
        if (!$password == $result) {
            $_SESSION["login_error_message"] = "The entered username or password was invalid";
            header ("location: ./login.php");
        }
        else {
            $_SESSION["username"] = $username;
            $_SESSION["password"] = $password;
            header ("location: /pages/user/user_home.php");
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Error</title>
    </head>
    <body>
        <p>If you are seeing this page, a serious error has occured. Please report this to DNAmaster10</p>
    </body>
</html>
