<?php

session_start();
if (isset($_SESSION['user'])) {
    require_once("init.php");



?>


    <body>
        <!-- about breadcrumb -->
        <section class="w3l-breadcrumb">
            <div class="breadcrumb-bg breadcrumb-bg-about py-5">
                <div class="container pt-lg-5 pt-3 p-lg-4 pb-3">
                    <h2 class="title mt-5 pt-lg-5 pt-sm-3">Add Courses</h2>
                    <ul class="breadcrumbs-custom-path pb-sm-5 pb-4 mt-2 text-center mb-md-5">
                        <li><a href="index.php">Home</a></li>
                        <li>|<a href="courses.php">Courses</a></li>

                    </ul>
                </div>
            </div>
            <div class="waveWrapper waveAnimation">
                <svg viewBox="0 0 500 150" preserveAspectRatio="none">
                    <path d="M-5.07,73.52 C149.99,150.00 299.66,-102.13 500.00,49.98 L500.00,150.00 L0.00,150.00 Z" style="stroke: none;"></path>
                </svg>
            </div>
        </section>
        <!-- //about breadcrumb -->


        <section class="add">
            <div class="container">
                <form class="signup-form" action="add.php" method="Post" enctype="multipart/form-data">

                    <!-- form header -->
                    <div class="form-header">
                        <h1>Add Course</h1>
                    </div>

                    <!-- form body -->
                    <div class="form-body">

                        <!-- Firstname and Lastname -->
                        <div class="horizontal-group">
                            <div class="form-group left">
                                <label for="firstname" class="label-title">Course Name</label>
                                <input name="name" type="text" id="firstname" class="form-input" placeholder="Enter Your Course Name" required="required" />
                            </div>

                        </div>



                        <!-- Profile picture and Age -->
                        <div class="horizontal-group">
                            <div class="form-group left">
                                <label for="choose-file" class="label-title">Upload Course Picture</label>
                                <input type="file" name="img" id="choose-file">
                            </div>
                            <div class="form-group right">
                                <label for="experience" class="label-title">Price</label>
                                <input name="price" type="number" min="0" max="99999999" value="0" class="form-input">
                            </div>
                        </div>

                        <div class="horizontal-group">
                            <div class="form-group left">
                                <label for="firstname" class="label-title">Course Level</label>
                                <input name="level" type="text" id="firstname" class="form-input" placeholder="Enter Course Level" required="required" />
                            </div>




                        </div>




                        <div class="form-group left">
                            <label for="firstname" class="label-title">Course Duration</label>
                            <input name="duration" type="text" id="firstname" class="form-input" placeholder="Enter Course Duration" required="required" />
                        </div>










                        <!-- Bio -->
                        <div class="form-group">
                            <label for="choose-file" class="label-title"> Course Description</label>
                            <textarea name="desc" class="form-input" rows="4" cols="50" style="height:auto"></textarea>
                        </div>
                    </div>

                    <!-- form-footer -->
                    <input type="submit" name="sub-cr" class="btn-sub" value="Create">

                </form>
            </div>

        </section>



    <?php

    include('template/footer.html');
} else {
    include('signupx.html');
}
    ?>