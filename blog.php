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
        <h3 class="display-3 font-weight-bold text-white">Our Blog</h3>
        <div class="d-inline-flex text-white">
          <p class="m-0"><a class="text-white" href="blog.php">Home</a></p>
          <p class="m-0 px-2">/</p>
          <p class="m-0">Our Blog</p>
        </div>
      </div>
    </div>
    <!-- Header End -->

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
function countBlogs($i){
	connection();
	return query("select * from ourblogs,blogcategory 
where ourblogs.blogCat_id=blogcategory.blogCat_id and blogCat_name='$i'");
	
}


		  
	?>	  	
		  
		    <div class="mb-5">
            <h2 class="mb-4">Categories</h2>
            <ul class="list-group list-group-flush">
              <?php
			  
			  $res=getBlogCategory();
			  while($row=mysqli_fetch_array($res)){
			  echo'
			  <li
                class="list-group-item d-flex justify-content-between align-items-center px-0"
              >
                <a href="blog.php?blogid='.$row[0].'">'.$row[blogCat_name].'</a>';
				
		
		
				
				$result2=countBlogs($row[blogCat_name]);
				
				$count=0;
				while($row3=mysqli_fetch_array($result2)){
					
				$count=$count+1;
			  
				}
				
				$countAll = $countAll + $count;
				
				echo'
                <span class="badge badge-primary badge-pill">'.$count.'</span>
              </li>';
				
              }
			  echo '<li class="list-group-item d-flex justify-content-between align-items-center px-0"><a href="blog.php">All</a>
			 <span class="badge badge-primary badge-pill">'.$countAll.'</span></li>';
			
			  ?>
			  
		   </ul>
          </div>

		  	<div class="row pb-3">
			
	<?php
	
	
	if(isset($_GET['blogid'])){
		$res=getBlogByCategory($_GET['blogid']);
		
		 }else{ 
		  $res=getBlogs();
	}
	

	while($row=mysqli_fetch_array($res)){
	
	echo'

		  <div class="col-lg-3 mb-4">
            <div class="card border-0 shadow-sm mb-2">
              <img class="card-img-top mb-2" src="'.$row[blog_img].'" alt="" />
              <div class="card-body bg-light text-center p-4">
                <h4 class="">'.$row[blog_title].'</h4>
                <div class="d-flex justify-content-center mb-3">
                  <small class="mr-3"
                    ><i class="fa fa-user text-primary"></i> '.$row[blog_writer].'</small
                  >';
    $result=getBlogCategoryByID($row[blog_id]);
	$row2=mysqli_fetch_array($result);
	echo'
                  <small class="mr-3"
                    ><i class="fa fa-folder text-primary"></i> '.$row2[blogCat_name].'</small
                  >
                  <small class="mr-3"
                    ><i class="fa fa-comments text-primary"></i> '.$row[blog_comments].'</small
                  >
                </div>
                <p>
                 '.substr($row[blog_content],0,140).'...
                </p>
                <a href="blogpage.php?blogid1='.$row[blog_id].'." class="btn btn-primary px-4 mx-auto my-2"
                  >Read More</a
                >
              </div>
            </div>
          </div>';
         
	}
        ?>

	
		  
		  <div class="col-md-12 mb-4">
            <nav aria-label="Page navigation">
              <ul class="pagination justify-content-center mb-0">
                <li class="page-item disabled">
                  <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                  </a>
                </li>
                <li class="page-item active">
                  <a class="page-link" href="#">1</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                  <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                  </a>
                </li>
              </ul>
            </nav>
          </div>
     

	 </div>
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
