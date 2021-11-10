<?php
session_start();
if (isset($_SESSION['user'])) {


    require_once("init.php");


    if (isset($_POST['sub-cr'])) {

        $name       = $_POST['name'];
        $price      = $_POST['price'];
        $level      = $_POST['level'];
        $duration   = $_POST['duration'];
        $desc       = $_POST['desc'];

        // Get The Image
        $img        = $_FILES['img'];
        if (empty($img)) {
            $imgname  = "c1.jpg";
        } else {
            $imgname    = rand(1, 9999) . "-" . $img['name'];
            $imgtmp     = $img['tmp_name'];
            move_uploaded_file($imgtmp, "assets/images/$imgname");
        }


        // Add Course To DataBase
        $added = addCourse($name, $desc, $price, $level, $duration, $_SESSION['user_id'], "assets/images/$imgname");

        if ($added) {
            $msg = "Course Added";
            reDirect($msg, "courses.php", 3);
        } else {
            $msg = "Error";
            reDirect($msg, "back", 3);
        }
    } else {
        $msg = "You Cant Access Here Direct";
        reDirect($msg, "back", 3);
    }
} else {
    include("signupx.html");
}
