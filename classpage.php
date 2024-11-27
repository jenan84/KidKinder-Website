<?php
session_start();
include('header.php');
	
	?>

<!DOCTYPE html>
<html lang="en">
  
    <?php
	include('header.php');
	include('config.php');
	?>
	<style type="text/css">
#tt{position:relative;left:30px;top:10px;font-size:30px; font-weight: 900;}
#p2{position:relative;left:30px;top:10px;font-size:30px; font-weight: 500;}
#p{ font-weight:500;}

</style>
 

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
          <p class="m-0"><a class="text-white" href="class.php">Home</a></p>
          <p class="m-0 px-2">/</p>
          <p class="m-0">Our Classes</p>
        </div> 
      </div>
    </div>
    <!-- Header End -->

    <!-- Class Start -->
  <!--  <div class="container-fluid pt-5">
      <div class="container">
        <div class="text-center pb-2">
          <p class="section-title px-5">
            <span class="px-2">Popular Classes</span>
          </p>
          <h1 class="mb-4">Classes for Your Kids</h1>
        </div>-->
		
		
		    <!-- Class End -->
		 
		
		
		
		
		<?php
		$res=getClass($_GET['classid']);
	    $row=mysqli_fetch_array($res);
	    extract($row);
		$result=getTeacherByID($_GET['classid']);
		$row2=mysqli_fetch_array($result);
	echo'
		 <div class="col-lg-12 mb-5">

            <div class="card border-0 bg-light shadow-sm pb-2">
              
			   <img class="card-img-top mb-2" src="'.$class_img.'" alt="" style="width:1220px;height:350px" />
			  
		
            </div>
	
	
          </div>
		
		<h1 style="font-size:50px;position:relative;left:50px;top:10px">'.$class_name.'</h1>
		<p id="p" style="font-size:20px;position:relative;left:50px;top:10px">'.$row[class_disc].'</p>
		
		
		<table style="position:relative;left:50px;top:10px">
	
		<tr><td><p id="tt">Age of Kids:&nbsp;&nbsp;</p></td>
		<td><p id="p2">'.$class_age.'<p></td>
		</tr>
		<tr><td><p id="tt">Total Seats:&nbsp;&nbsp;</p></td>
		<td><p id="p2">'.$class_seats.'</p></td>
		</tr>
		<tr><td><p id="tt">Class Time:&nbsp;&nbsp;</p></td>
		<td><p id="p2">'.$class_time.'<p></td>
		</tr>
		<tr><td><p id="tt">	Tution Fee:&nbsp;&nbsp;</p></td>
		<td><p id="p2">&#36;'.$class_fee.'<p></td>
		</tr>
		<tr><td><p id="tt">	Class Teacher:&nbsp;&nbsp;</p></td>
		<td><p id="p2">'.$row2[teacher_name].'<p></td>
		</tr>
		<tr><td><br><p id="tt"><a href="cart.php?classid='.$row[class_id].'" class="btn btn-primary px-4 mx-auto mb-4" style="font-size:30px">Join Class</a></p></td></tr>
		</table> ';
		
		
			?>

	   
	   
	<!--'.getTeacherByID($_GET['classid']).' -->


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
