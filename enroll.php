<?php
session_start();
if (isset($_SESSION['user'])) {


    include_once("queries.php");


    $courseid = isset($_GET['courseid']) && is_numeric($_GET['courseid']) ? intval($_GET['courseid']) : 0;

    if (isset($courseid) && $courseid !== 0) {

        $userid = $_SESSION['user_id'];



        $enrollCourse = enroll($userid, $courseid);
        reDirect($enrollCourse, "courses.php", 3);
    } else {
        echo "No Course Selected";
    }
} else {
    include("signupx.html");
}
