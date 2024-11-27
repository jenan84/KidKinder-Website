<?php
   include('config.php');
  include('header.php');
  
  ?>
  
  <!DOCTYPE html>

<html lang="en">

<?php  

if(isset($_GET['finished'])){
	
	foreach($_SESSION as $key => $value){
		connection();
		$classID = substr($key,5);
		$res = query("select class_seats from classes where class_id=$classID ") ;
		$row = mysqli_fetch_array($res);
		$seatno = $row['class_seats'];
		$difference = $seatno - $value ;
		$res = query("UPDATE classes SET class_seats = $difference  where class_id=$classID ") ;
		
		
	}
	
	
	session_destroy();
}

?>

  <body>
    <!-- Navbar Start -->
    <div class="container-fluid bg-light position-relative shadow">
      <nav
        class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0 px-lg-5"
      >
	  <?php
     include('nav.php');
	   ?>
      </nav>
    </div>
    <!-- Navbar End -->
<?php
connection();

//query($q);
?>


    <!-- Header Start -->
    <div class="container-fluid bg-primary px-0 px-md-5 mb-5">
      <div class="row align-items-center px-3">
        <?php
		include('carousel2.php');
		?>
	 </div>
    </div>
    <!-- Header End -->




    <!-- Facilities Start -->
   <?php
   include('facility.php');
   ?>
	<!-- Facilities End -->



    <!-- About Start -->
    <div class="container-fluid py-5">
      <div class="container">
        <div class="row align-items-center">
		
         <?php
		 include('about.php');
		 ?>
		 
	   </div>
      </div>
    </div>
    <!-- About End -->


    <!-- Class Start -->
    <div class="container-fluid pt-5">
      
	  <?php
	  include('classes.php');
	  ?>
   </div>
    <!-- Class End -->


    <!-- Registration Start -->
    <div class="container-fluid py-5">
      <div class="container">
       <?php
	    include('book.php');
	   ?>
	   
	  </div>
    </div>
    <!-- Registration End -->


    <!-- Team Start -->
    <div class="container-fluid pt-5">
      <div class="container">
        <div class="text-center pb-2">
          <p class="section-title px-5">
            <span class="px-2">Our Teachers</span>
          </p>
          <h1 class="mb-4">Meet Our Teachers</h1>
        </div>
       
	   <?php
	   include('teachers.php');
	   ?>
	   
	</div>
    </div>
    <!-- Team End -->


    <!-- Testimonial Start -->
    
       <?php
	   include('testimonial.php');
	   ?>
	
    <!-- Testimonial End -->

    <!-- Blog Start -->
    <div class="container-fluid pt-5">
      <div class="container">
        <div class="text-center pb-2">
          <p class="section-title px-5">
            <span class="px-2">Latest Blog</span>
          </p>
          <h1 class="mb-4">Latest Articles From Blog</h1>
        </div>
        <?php
		include('LatestBlog.php');
		?>
	</div>
    </div>
    <!-- Blog End -->

    <!-- Footer Start -->
   <?php
   include('footer.php');
   ?>
  <!-- Footer End -->

    <!-- Back to Top -->
    <?php
	backToTop();
	
	?>
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
