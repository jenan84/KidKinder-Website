<!DOCTYPE html>
<html lang="en">
  <head>
    <?php
	include('header.php');
	include('config.php');
	?>
	<style type="text/css">
#tt{position:relative;left:30px;top:10px;font-size:30px; font-weight: 900;}
#p4{position:relative;left:80px;top:10px;right:30px;margin-right: 120px; }
#p{ font-weight:500;}

</style>
  </head>

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
	
	 
      

	   <h3 class="display-3 font-weight-bold text-white">Our Articles</h3>
        <div class="d-inline-flex text-white">
          <p class="m-0"><a class="text-white" href="index.php">Home</a></p>
          <p class="m-0 px-2">/</p>
          <p class="m-0">Our Articles</p>
        </div> 
      </div>
    </div>
	
    <!-- Header End -->

    <!-- Class Start -->
  
		
		    <!-- Class End -->
		 
		
		
		
		
		<?php
		$res=getBlog($_GET['blogid1']);
	   $row=mysqli_fetch_array($res);
	    extract($row);
		$result=getTeacherByID($_GET['blogid1']);
		$row2=mysqli_fetch_array($result);
	echo'
		 <div class="col-lg-12 mb-5">

            <div >
              
			   <img  src="'.$blog_img.'" alt="" style="width:1100px;height:350px;position:relative;left:70px" />
			  
		
            </div>
	
	
          </div>
		
		<center><h1>'.$blog_title.'</h1></center>
		
		<p id="p4">'.$blog_content.'</p>
		
		
		';
		
		
			?>

	   
	   
	<!--'.getTeacherByID($_GET['classid']).' -->


    <!-- Registration Start -->
	<br><br><br>
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
