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
        <h3 class="display-3 font-weight-bold text-white">Gallery</h3>
        <div class="d-inline-flex text-white">
          <p class="m-0"><a class="text-white" href="">Home</a></p>
          <p class="m-0 px-2">/</p>
          <p class="m-0">Gallery</p>
        </div>
      </div>
    </div>
    <!-- Header End -->

    <!-- Gallery Start -->
    <div class="container-fluid pt-5 pb-3">
      <div class="container">
        <div class="text-center pb-2">
          <p class="section-title px-5">
            <span class="px-2">Our Gallery</span>
          </p>
          <h1 class="mb-4">Our Kids School Gallery</h1>
        </div>
      
		
		<div class="row">
          <div class="col-12 text-center mb-2">
            
			<?php
			
			
			echo '<a href="gallery.php" class="btn btn-outline-primary m-1">All</a>';
			$res=getGaleryCategories();
			while($row=mysqli_fetch_array($res)){
			echo' <a href="gallery.php?galid='.$row[0].'." class="btn btn-outline-primary m-1">'.$row[1].'</a>';}
			
			?>
			
			
			
		 </div>
        </div>
        <div class="row portfolio-container">
          
		  <?php
		 
		if(isset($_GET['galid'])){
		$res=getGaleryByCategory($_GET['galid']);
		
		 }else{ 
		  $res=getGalery();
	}
	
		  while($row=mysqli_fetch_array($res)){
		  echo'
		  <div class="col-lg-4 col-md-6 mb-4 portfolio-item ">
            <div class="position-relative overflow-hidden mb-2">
              <img class="img-fluid w-100" src="'.$row[gal_name].'" alt="" />
              <div
                class="portfolio-btn bg-primary d-flex align-items-center justify-content-center"
              >
                <a href="'.$row[gal_name].'" data-lightbox="portfolio">
                  <i class="fa fa-plus text-white" style="font-size: 60px"></i>
                </a>
              </div>
            </div>
          </div>';}
       ?>

	 </div>
      </div>
    </div>
	
	
    <!-- Gallery End -->

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
