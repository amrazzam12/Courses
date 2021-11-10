<?php
session_start();
if (isset($_SESSION['user'])) {


    include_once("init.php");

    $id = isset($_GET['courseid']) && is_numeric($_GET['courseid']) ? intval($_GET['courseid']) : 0;
    $row = getData("course.id=$id");

?>

    <body>
        <div class="container-a">
            <h1><?php echo $row[0]['name'] ?></h1><br>
        </div>
        <div class="container-b">
            <h5 class="container-c">What you'll learn<br>
                <li>
                    <ui>
                        <span> <?php echo $row[0]['name'] ?></span>
                    </ui>
                </li>
            </h5>
        </div>
        <div>
            <h4>Description</h4>
        </div>
        <h3>
            <?php echo $row[0]['description'] ?><br><br>

        </h3>
        <section class="pricing">
            <div class="pricing-a">
                <h1 class="pricing-b">course price</h1>
                <h2 class="pricing-c">python course</h2>

            </div>
            <div class="pricing-decoration">
                <ul class="pricing-ul">
                    <li class="pricing-li-a">Access To All Recordings</li>
                    <li class="pricing-li-b">unlimited Download videos</li>
                    <li class="pricing-li-c">1 live tutorial every month</li>
                </ul>
            </div>
            <div class="container-price">
                <p class="container-price-cost"><?php echo $row[0]['price'] ?>$</p>
                <button><a href="enroll.php?courseid=<?php echo $id ?>">Enroll</a></button>
                <p class="container-price-cris">Per Year</p>
            </div>
        </section>
        <div class="coca">
            <p class="coca-a">Duration :</p>
            <p><?php echo $row[0]['duration'] ?>Hrs</p>
        </div>
        <br><br>
        <div class="container-tech">
            <p class="container-teach-a">
                Teacher Name : </p>
            <p><?php echo $row[0]['teacher_name'] ?></p>

        </div>
    </body>

<?php
    include_once("template/footer.html");
} else {
    include("signupx.html");
}
?>

</html>