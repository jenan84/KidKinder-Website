<?php
include('config.php');
  include('header.php');
  include('checkUser.php');
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
      </nav>
    </div>
    <!-- Navbar End -->
	
	
	
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

      <header>
            <h1 class="text-center" style="position:relative;top:20px">Register</h1><br>
			<h2 class="text-center bg-warning">
			<?php 
			login();
			if(isset($_SESSION['error'])){
				echo $_SESSION['error'];
				unset($_SESSION['error']);
			}
			
			
			?></h2>
        <div class="col-sm-4 col-sm-offset-5">         
            <form style="position:relative;left:450px;top:30px" class="" action="" method="post" enctype="multipart/form-data">
                <div class="form-group"><label for="">
                    username<input type="text" name="username" class="form-control"></label>
                </div>
                 <div class="form-group"><label for="password">
                    Password<input type="text" name="password" class="form-control"></label>
                </div>

                <div class="form-group">
                  <input type="submit" name="submit" class="btn btn-primary" >
                </div>
            </form>
        </div>  


    </header>


        </div>

    </div>
    <!-- /.container -->

<br>
    <div class="container">

        <hr>

        <!-- Footer -->
        <?php
		include('footer.php');
		?>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>