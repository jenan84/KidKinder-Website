<?php
session_start();
include('config.php');
include('header.php');
include('cart.php');
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

    <!-- Page Content -->
    <br/><div class="container">

<!-- /.row --> 

<div class="row">

 <div class="col-lg-10 ">
 
 <h1  style="position:relative;top:10px;left:450px">Thank You !!</h1>


	<?php
 if(isset($_GET['st'])){
	  connection();
	 if($_GET['st']=="Completed"){
		 $status 	= "Completed";
		 $currency 	= $_GET['cc'];
		 $amount 	= $_GET['amt'];
		 $trans 	= $_GET['tx'];
		 $fname 	= $_GET['first_name'];
		 $lname 	= $_GET['last_name'];
		// $payer     = $_SESSION['userid'];
		 $classes   = "{";
		 
		 foreach($_SESSION as $key => $value){
			 
			 $classes = $classes . $key . ":" . $value . ";";
		 }
	 $classes = $classes . "}";
	 
	 
	 
		  $result = query ("insert into payments(ID,first_name,last_name,amount,status,transaction,currency,classes)
		 VALUES('','$fname','$lname',$amount,'$status','$trans','$currency','$classes' )");
	     
		 
		// $class = explode(";",$classes);
		 $class  = substr($classes,1,count($classes)-3);
		 //$class2 = explode(";",$class);
		 addOperationInfo($fname,"Order ($class)");
		 
		 if(mysqli_affected_rows($conn) > 0){
			 
			 echo ' <h2 style="position:relative;top:30px;left:250px">Your payment for the following classes was successfull:</h2>';
		 }else{
			 echo "<h1><font style='color:red'>Transaction failed to save!!!</font></h1>";
		 }
	 }
 }
 
?>


<form method="" action="" >

    <table style="position:relative;top:50px;left:80px" class="table table-striped">
        <thead>
          <tr>
           <th>Class Name</th>
           <th>Registration Fees</th>
           <th>Seats</th>
           <th>Sub-total</th>
		
         
          </tr>
        </thead>
		
        <tbody>
		
            <?php
			checkoutTable2();
			?>
			
			</table>
			
	</form>
	<a href="index.php?finished=1"  style="position:relative;left:80px;top:80px">
<button type="button"  class="btn"><img src="img/home2.png" /></button></a>
</div>		
		
			
			<!--  ***********CART TOTALS*************-->
  
<!-- CART TOTALS-->


 </div><!--Main Content-->



    </div>
    <!-- /.container -->

 <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>