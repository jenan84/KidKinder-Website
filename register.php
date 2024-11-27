<?php
include('config.php');
  include('header.php');
  include('checkRegister.php');

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
            <h1 class="text-center" style="position:relative;top:40px">Register</h1><br>
			<h2 class="text-center bg-warning">
			<?php 
			register2();
			if(isset($_SESSION['error'])){
				echo $_SESSION['error'];
				unset($_SESSION['error']);
			}
			
			
			?>
			
			</h2>
			
			<?php
			global $x;
			global $y;
			global $z;
			if($x == "Username taken !!!" || $y == "Passwords do not match !!!" || $z == "Failed to sign up !!!"){
				
				redisplayForm($_POST['username'],$_POST['firstName'],$_POST['lastName'],
				$_POST['email'],$_POST['password'],$_POST['confirm']);
			}else{
				echo'
        <div class="col-sm-4 col-sm-offset-5">         
            <form  class="" action="" method="post" enctype="multipart/form-data">
                
			<div style="position:relative;left:300px;top:50px">	
				
				<div class="form-group"><label for="username">
                    username<input type="text" name="username" class="form-control" required></label>
					
                </div>
				
				
				<div>
				<label for="firstName">
                   First Name<input type="text" name="firstName" class="form-control" required></label>
				 </div>
				
				
				<div>
				<label for="lastName">
                    Last Name<input type="text" name="lastName" class="form-control" required></label>
				 </div>
				
				<a href="login.php" style="position:relative;top:30px;font-size:20px">login</a>
			</div>
			
			
			<div style="position:relative;left:650px;top:-200px">
				
				
				<div>
				<label for="email">
                   Email<input type="text" name="email" class="form-control" required></label>
				 </div>
				
                <div class="form-group"><label for="password">
                    Password<input type="password" name="password" class="form-control" required></label>
                </div>

                <div>
				<label for="confirm">
                    Confirm Password<input type="password" name="confirm" class="form-control" required></label>
				 </div>
				 
				 
				 

			</div>
            
			   

                <div class="form-group"  style="position:relative;left:820px;top:-140px">
                  <input type="submit" name="submit2" class="btn btn-primary" value="Sign up">
                </div>
				
            </form>
			
        </div>  ';

			}
	?>
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