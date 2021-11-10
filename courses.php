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
          <h2 class="title mt-5 pt-lg-5 pt-sm-3">Online Courses</h2>
          <ul class="breadcrumbs-custom-path pb-sm-5 pb-4 mt-2 text-center mb-md-5">
            <li><a href="index.html">Home</a></li>
            <li class="active"> / Courses </li>
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


    <section class="w3l-courses">
      <div class="blog pb-5" id="courses">
        <div class="container py-lg-5 py-md-4 py-2">
          <div class="row">

            <?php

            $row = getData("1");
            foreach ($row as $c) {
            ?>
              <div class="col-lg-4 col-md-6 item">
                <div class="card">
                  <div class="card-header p-0 position-relative">
                    <a href="#course-single" class="zoom d-block">
                      <img class="card-img-bottom d-block" src="<?php echo $c['img'] ?>" alt="Card image cap">
                    </a>
                    <div class="post-pos">
                      <a href="#reciepe" class="receipe blue"><?php echo $c['level'] ?></a>
                    </div>
                  </div>
                  <div class="card-body course-details">
                    <div class="price-review d-flex justify-content-between mb-1align-items-center">
                      <?php if ($c['price'] == 0) {
                        echo "Free";
                      } else {
                        echo "<p>$$c[price]</p>";
                      } ?>

                      <ul class="rating-star">
                        <li><span class="fa fa-star"></span></li>
                        <li><span class="fa fa-star"></span></li>
                        <li><span class="fa fa-star"></span></li>
                        <li><span class="fa fa-star"></span></li>
                        <li><span class="fa fa-star-o"></span></li>
                      </ul>
                    </div>
                    <a href="#course-single" class="course-desc"><?php echo $c['name'] ?>
                    </a>
                    <div class="course-meta mt-4">
                      <div class="meta-item course-lesson">
                        <span class="fa fa-clock-o"></span>
                        <span class="meta-value"> <?php echo $c['duration'] ?> hrs </span>
                      </div>
                      <div class="meta-item course-">
                        <span class="fa fa-user-o"></span>
                        <span class="meta-value"> 50 </span>
                      </div>
                      <div class="btn-parent">
                        <button><a href="special.php?courseid=<?php echo $c['id'] ?>">See Details</a></button>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer">
                    <div class="author align-items-center">
                      <?php if ($c['avatar'] !== "") { ?>
                        <img src="<?php echo $c['avatar'] ?>" alt="" class="img-fluid rounded-circle">
                      <?php } else {
                        echo "No Image";
                      } ?>
                      <ul class="blog-meta">
                        <li>
                          <span class="meta-value mx-1">BY</span> <a href="#author"> <?php echo $c['teacher_name'] ?></a>
                        </li>

                      </ul>
                    </div>
                  </div>
                </div>
              </div>

            <?php } ?>


          </div>
    </section>

  <?php
  include('template/footer.html');
} else {
  include("signupx.html");
}


  ?>