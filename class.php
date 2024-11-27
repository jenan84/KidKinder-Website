<?php
   include('config.php'); 
   include('header.php');
   
 session_start();
	
	if(!isset($_SESSION['username']) || $_SESSION['username'] = ''){
	
	
	echo "<script>window.location.href='login.php';</script>";
    exit;
}
	
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
        <h3 class="display-3 font-weight-bold text-white">Our Classes</h3>
        <div class="d-inline-flex text-white">
          <p class="m-0"><a class="text-white" href="index.php">Home</a></p>
          <p class="m-0 px-2">/</p>
          <p class="m-0">Our Classes</p>
        </div>
      </div>
    </div>
    <!-- Header End -->

    <!-- Class Start -->
    <div class="container-fluid pt-5">
      <div class="container">
        <div class="text-center pb-2">
          <p class="section-title px-5">
            <span class="px-2">Popular Classes</span>
          </p>
          <h1 class="mb-4">Classes for Your Kids</h1>
        </div>
       
	   
	   
	   
		<div class="row">
          <div class="col-12 text-center mb-2">
            
			<?php
			
			
			echo '<a href="class.php" class="btn btn-outline-primary m-1">All</a>';
			$res=getClassCategory();
			while($row = mysqli_fetch_array($res)){
			echo' <a href="class.php?catid='.$row[0].'." class="btn btn-outline-primary m-1">'.$row[1].'</a>';}
			
			?>
			
			
			
		 </div>
        </div>
	   
	   <?php
	   
	   if(isset($_GET['catid'])){
		   $res = getClassByCategory($_GET['catid']);
	   }else{
		   $res = getClasses();
	   }
	   ?>
	   
	   <div class="row">
         <?php
	
		 
		 while($row=mysqli_fetch_array($res)){
			 echo '
		 <div class="col-lg-4 mb-5">
            <div class="card border-0 bg-light shadow-sm pb-2">
              <img class="card-img-top mb-2" src="'.$row[class_img].'" alt="" />
              <div class="card-body text-center">
                <h4 class="card-title"><a href="classpage.php?classid='.$row[class_id].'.">'.$row[class_name].'</a></h4>
                <p class="card-text">
                 '.substr($row[class_disc],0,150).'
                </p>
              </div>
              <div class="card-footer bg-transparent py-4 px-5">
                <div class="row border-bottom">
                  <div class="col-6 py-1 text-right border-right">
                    <strong>Age of Kids</strong>
                  </div>
                  <div class="col-6 py-1">'.$row[class_age].' years</div>
                </div>
                <div class="row border-bottom">
                  <div class="col-6 py-1 text-right border-right">
                    <strong>Total Seats</strong>
                  </div>
                  <div class="col-6 py-1">'.$row[class_seats].' Seats</div>
                </div>
                <div class="row border-bottom">
                  <div class="col-6 py-1 text-right border-right">
                    <strong>Class Time</strong>
                  </div>
                  <div class="col-6 py-1">'.$row[class_time].'</div>
                </div>
                <div class="row">
                  <div class="col-6 py-1 text-right border-right">
                    <strong>Tution Fee</strong>
                  </div>
                  <div class="col-6 py-1">&#36;'.$row[class_fee].' / Month</div>
                </div>
              </div>
              <a href="cart.php?classid='.$row[class_id].'" class="btn btn-primary px-4 mx-auto mb-4">Join Class</a>
            </div>
          </div>' ;
		 }
          ?>
		
	  
	  </div>
      </div>
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
