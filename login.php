<?php

session_start();



require_once("queries.php");

if (isset($_POST['subin'])) {

    $name = $_POST['user'];
    $pass = $_POST['pass'];

    $bool = checkUser($name, $pass);
    if ($bool) {
        $_SESSION['user'] = $name;
        $row = getUser($name, $pass);
        $_SESSION['user_id'] = $row[0]['id'];
        header("Location:courses.php");
        exit;
    } else {
        $msg = "<div class ='container'>" . "No User Found You Will Back To Login Page" . "</div>";
        reDirect($msg, "back", 4);
    }
}
