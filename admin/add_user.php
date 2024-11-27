<?php 
session_start();
include("../config.php");



if(!isset($_SESSION['username']) || $_SESSION['admin'] != 1 && $_SESSION['admin'] != ''){
	
	
	echo "<script>window.location.href='../login.php';</script>";
    exit;
}


?>

<!DOCTYPE html>
<html lang="en">

<?php include("head.php"); ?>

<body>

<?php

if(isset($_POST['submit2'])){
	
	addUser();
	
	
}


?>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            
			<?php include("topNav.php");?>
			
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
              
			<?php include("sideNav.php"); ?>  
			  
            <!-- /.navbar-collapse -->
        </nav>



        <div id="page-wrapper">

            <div class="container-fluid">






<div class="col-md-8">

<div class="row">
<h1 class="page-header">
   Add User

</h1>
</div>
               


<form action="add_user.php" method="post" enctype="multipart/form-data">


<div class="col-md-8">

<div class="form-group">
    <label for="user_name">Username </label>
        <input type="text" name="user_name" class="form-control">
       
    </div>


    <div class="form-group">
	
    <label for="fname">First Name </label>
        <input type="text" name="fname" class="form-control" size="10">
       
    </div>



    <div class="form-group ">

     
        <label for="lname">Last Name</label>
        <input type="text" name="lname" class="form-control" >
     
    </div>



    <div class="form-group ">
        <label for="email">Email</label>
        <input type="text" name="email" class="form-control" size="60">
     
    </div>
	
	
    <div class="form-group ">
        <label for="pass">Password</label>
        <input type="text" name="pass" class="form-control" size="60">
     
    </div>

<div class="form-group ">

<select name="admin2" id="" class="form-control">

            <option value="">Admin??</option>
			<option >1-Yes</option>
			<option >2-No</option>
           
		   <?php
		   
		   
		   
		   ?>
        </select>

</div><!--Main Content-->


<!-- SIDEBAR-->


     <div class="form-group " >
       
        <input type="submit" name="submit2" class="btn btn-primary btn-lg" value="Add User">
    </div>
	
</form>



            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
	
	<?php include("footer.php"); ?> 
	
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

</body>

</html>
