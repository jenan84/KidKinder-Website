<?php
	include('config.php');
	include('header.php');
	
	
	?>

<!DOCTYPE html>
<html lang="en">
 
	<style type="text/css">
#t{position:relative;left:30px;top:10px;height:470px;width:420px}
#h{position:relative;left:30px;top:80px}
#h2{position:relative;left:30px;top:80px;font-weight:20}
#h3{font-weight:20}
#h4{position:relative;left:30px;top:2px;font-weight:20}
#h5{position:relative;left:70px;top:2px;font-weight:20}
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
        <h3 class="display-3 font-weight-bold text-white">Our Teachers</h3>
        <div class="d-inline-flex text-white">
          <p class="m-0"><a class="text-white" href="team.php">Home</a></p>
          <p class="m-0 px-2">/</p>
          <p class="m-0">Our Teachers</p>
        </div>
      </div>
    </div>
    <!-- Header End -->
	

    <?php
	$res=getTeacher($_GET['teacherid']);
	$row=mysqli_fetch_array($res);
	
	echo'

	<img  src="'.$row[teacher_img].'" alt="" id="t"/>



	<table cellpadding="0" style="position:absolute;left:480px;top:540px;width:60%" >
	
	<tr>
	<td>
	<h1>'.$row[teacher_name].'</h1>
	</td>
	
	<tr>
	<td>
	<h2><br>Teacher Classes:  </h2>
	';
	
	
	$result=getClassesForTeacher($_GET['teacherid']);
	 while($row2=mysqli_fetch_array($result)){
		echo'<h3 id="h4"> <ul> <li>'.$row2[class_name].'</li> </ul></h3>';
	 }
	 
	 echo'
	
	</td>
	</tr>
	
	
	<tr>
	<td >
	<h2 style="padding:1px;margin:0"><br>Contact Info</h2>

	</td>
	</tr>
	
	
	<tr>
	<td >
	<h3 style="padding:1px;margin:0;position:relative;left:30px;top:2px">Twitter</h3>
	<h4 id="h5"><a href='.$row[twitter].'>'.$row[twitter].'</a></h4>
	</td>
	</tr>
	
	
	<tr>
	<td >
	<h3 style="padding:1px;margin:0;position:relative;left:30px;top:2px">Facebook</h3>
	<h4 id="h5"><a href='.$row[facebook].'">'.$row[facebook].'</a></h4>
	</td>
	</tr>
	
	<tr>
	<td >
	<h3 style="padding:1px;margin:0;position:relative;left:30px;top:2px">LinkedIn</h3>
	<h4 id="h5"><a href='.$row[linkedin].'">'.$row[linkedin].'</a></h4>
	</td>
	</tr>
	
		
	</table>
	

	<h3 id="h">About Me</h3>
	<p id="h2">'.$row[about_me].'</p> ';
	?>
	
	
    <!-- Testimonial Start -->
	<br><br><br><br>
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
    <?php
	
	backToTop();
	?>
	
	
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
