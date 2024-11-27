<?php
include('config.php');
	include('header.php');
	
	
	?>


<!DOCTYPE html>
<html lang="en">
 
  

  <body>
    <!-- Navbar Start -->
    <div class="container-fluid bg-light position-relative shadow">
      <nav
        class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0 px-lg-5"
      >
        <?php
		include('nav.php');
		?>
        </div>
      </nav>
    </div>
    <!-- Navbar End -->

    <!-- Header Start -->
    <div class="container-fluid bg-primary mb-5">
      <div
        class="d-flex flex-column align-items-center justify-content-center"
        style="min-height: 400px"
      >
        <h3 class="display-3 font-weight-bold text-white">Our Teachers</h3>
        <div class="d-inline-flex text-white">
          <p class="m-0"><a class="text-white" href="index.php">Home</a></p>
          <p class="m-0 px-2">/</p>
          <p class="m-0">Our Teachers</p>
        </div>
      </div>
    </div>
    <!-- Header End -->

    <!-- Team Start -->
    <div class="container-fluid pt-5">
      <div class="container">
        <div class="text-center pb-2">
          <p class="section-title px-5">
            <span class="px-2">Our Teachers</span>
          </p>
          <h1 class="mb-4">Meet Our Teachers</h1>
        </div>
        <div class="row">
		
         <?php
		 $res=getTeachers();
		 while($row=mysqli_fetch_array($res)){
		 
		 echo'
		 <div class="col-md-6 col-lg-3 text-center team mb-5">
            <div
              class="position-relative overflow-hidden mb-4"
              style="border-radius: 100%"
            >
              <img class="img-fluid w-100" src="'.$row[teacher_img].'" alt="" />
              <div
                class="team-social d-flex align-items-center justify-content-center w-100 h-100 position-absolute"
              >
                <a
                  class="btn btn-outline-light text-center mr-2 px-0"
                  style="width: 38px; height: 38px"
                  href="'.$row[twitter].'"
                  ><i class="fab fa-twitter"></i
                ></a>
                <a
                  class="btn btn-outline-light text-center mr-2 px-0"
                  style="width: 38px; height: 38px"
                  href="'.$row[facebook].'"
                  ><i class="fab fa-facebook-f"></i
                ></a>
                <a
                  class="btn btn-outline-light text-center px-0"
                  style="width: 38px; height: 38px"
                  href="'.$row[linkedin].'"
                  ><i class="fab fa-linkedin-in"></i
                ></a>
              </div>
            </div>
            <h4><a href="teacherpage.php?teacherid='.$row[teacher_id].'.">'.$row[teacher_name].'</a></h4>
            <i>'.$row[teacher_subject].' Teacher</i>
          </div>';
		 }
       
?>


	 </div>
      </div>
    </div>
    <!-- Team End -->

    <!-- Testimonial Start -->
	<?php
    include('testimonial.php');
	?>
    <!-- Testimonial End -->

    <!-- Footer Start -->
   <?php
   include('footer.php');
   ?>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary p-3 back-to-top"
      ><i class="fa fa-angle-double-up"></i
    ></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/isotope/isotope.pkgd.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
  </body>
</html>
