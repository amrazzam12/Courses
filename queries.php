<?php

/* Connect To DataBase */
$dsn = "mysql:host=localhost;dbname=courses";
$user = "root";
$pass = "";
$options = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8',
);
try {
    $con = new PDO($dsn, $user, $pass, $options);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Failed" . $e->getMessage();
}

/* Connect To DataBase */



/* QUERIES */

function addUser($name, $pass, $email)
{
    global $con;
    $stmt = $con->prepare("INSERT INTO users (id , username , password , email , premission,img) VALUES (NULL , ? , sha1(?) , ? , 0 , ?)");
    $stmt->execute(array($name, $pass, $email, "assets/images/team1.jpg"));
    $bool = $stmt->rowCount();
    if ($bool > 0) {
        return true;
    } else {
        return false;
    }
}

function checkUser($name, $pass)
{
    global $con;
    $stmt = $con->prepare("SELECT * FROM users WHERE username = ? AND password = sha1(?)");
    $stmt->execute(array($name, $pass));
    if ($stmt->rowCount() > 0) {

        return true;
    } else {
        return false;
    }
}



function getUser($name, $pass)
{
    global $con;
    $stmt = $con->prepare("SELECT * FROM users WHERE username = ? AND password = sha1(?)");
    $stmt->execute(array($name, $pass));
    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetchAll();
        return $row;
    } else {
        return "No User";
    }
}


function addCourse($name, $desc, $price, $level, $du, $teacher, $img)
{
    global $con;
    $stmt = $con->prepare("INSERT INTO course(id , name , description , price , level , duration , teacher_id , img) VALUES (NULL , ? , ? , ? , ? , ? ,?, ?)");
    $stmt->execute(array($name, $desc, $price, $level, $du, $teacher, $img));
    if ($stmt->rowCount() > 0) {
        return true;
    } else {
        return false;
    }
}



function getData($cond)
{
    global $con;
    $stmt = $con->prepare("SELECT
                        course.* , users.username AS teacher_name , users.img AS avatar
                        FROM
                        course
                        INNER JOIN
                        users
                        ON
                        course.teacher_id = users.id
                        WHERE $cond");
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetchAll();
        return $row;
    } else {
        return "No Data Found";
    }
}



function enroll($userid, $courseid)
{

    global $con;
    // Check If User Enrolled In This Course First
    $stmt_check = $con->prepare("SELECT * FROM enroll WHERE user_id = ? AND course_id = ?");
    $stmt_check->execute(array($userid, $courseid));
    $check = $stmt_check->rowCount();
    //If The User Didnt Enroll Before ::
    if ($check == 0) {
        $stmt = $con->prepare("INSERT INTO enroll(user_id , course_id) VALUES(? , ?)");
        $stmt->execute(array($userid, $courseid));
        $count = $stmt->rowCount();
        if ($count > 0) {
            return "Congrats You  Are Enrolled";
        } else {
            return "SomeThing Wend Wrong";
        }

        // If The User Enreolled Before ::
    } else {
        return "You Are Already Enrolled In This Course";
    }
}


function getTeachers()
{
    global $con;
    $stmt = $con->prepare("SELECT users.id  , course.teacher_id FROM users INNER JOIN course ON users.id = course.teacher_id");
    $stmt->execute();
    $users = $stmt->fetchAll();
    foreach ($users as $user) {
        $updateper = $con->prepare("UPDATE users SET premission = 1 WHERE id = $user[id]");
        $updateper->execute();
    }


    $getTeachers = $con->prepare("SELECT * FROM users WHERE premission = 1");
    $getTeachers->execute();
    $teachers = $getTeachers->fetchAll();
    return $teachers;
}



/* QUERIES */







/* Functions */


function reDirect($msg, $url  = null, $seconds = 2)
{

    if ($url == null) {

        $url = "signupx.html";
    } elseif ($url == "back") {
        if (isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] !== "") {
            $url = $_SERVER['HTTP_REFERER'];
        } else {
            $url = "signupx.html";
        }
    }

    echo $msg;
    header("refresh:$seconds;url=$url");
}


/* Functions */