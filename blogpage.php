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
#p2{position:relative;left:20px;top:10px;font-size:20px; font-weight:100px;}
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
        <h3 class="display-3 font-weight-bold text-white">Our Blog</h3>
        <div class="d-inline-flex text-white">
          <p class="m-0"><a class="text-white" href="blog.php">Home</a></p>
          <p class="m-0 px-2">/</p>
          <p class="m-0">Our Blog</p>
        </div>
      </div>
    </div>
    <!-- Header End -->
		
		
		<?php
		$res = getBlogByID($_GET['blogid1']);
	    $row=mysqli_fetch_array($res);
	    
		
	echo'
		 <div class="col-lg-11 mb-5" style="position:relative;left:50px;top:10px">

         <div class="card border-1 bg-light shadow-sm pb-2">
              
			   <img class="card-img-top mb-2" src="'.$row[blog_img].'" alt="" style="width:1127px;height:360px" />
			  
		</div>
           
	
	
          </div>
		
		<h1 style="font-size:50px;position:relative;left:60px;top:10px">'.$row[blog_title].'</h1>
		
		
		
		<div class="d-flex  mb-3" style="position:relative;left:80px;top:10px">
                  <small class="mr-3"
                    ><i class="fa fa-user fa-lg text-primary"></i> '.$row[blog_writer].'</small
                  >';
    $result=getBlogCategoryByID($row[blog_id]);
	$row2=mysqli_fetch_array($result);
	echo'
                  <small class="mr-3"
                    ><i class="fa fa-folder fa-lg text-primary"></i> '.$row2[blogCat_name].'</small
                  >
                  <small class="mr-3"
                    ><i class="fa fa-comments fa-lg text-primary"></i> '.$row[blog_comments].'</small
                  >
                </div>
				
				
		
		<table style="position:relative;left:50px;top:10px">
	
		<tr>
		<div>
		<td><p id="p2" class="col-lg-11">'.$row[blog_content].'<p></td>
		</div>
		</tr>
		
		</table> ';
		
		
			?>

	   
	   
	<!--'.getTeacherByID($_GET['classid']).' -->


    <!-- Registration Start -->
    <div class="container-fluid py-5">
      <div class="container">
      
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
