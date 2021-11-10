<?php
session_start();
require_once("queries.php");
include_once('signupx.html');

if (isset($_POST['subreg'])) {
    $name = $_POST['username'];
    $pass = $_POST['pass'];
    $email = $_POST['email'];

    $bool = addUser($name, $pass, $email);
    if ($bool) {
    }
} else {
    echo "Error";
}
