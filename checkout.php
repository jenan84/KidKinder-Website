<?php
include('config.php');
include('header.php');
include('cart.php');
session_start();
	
	if(!isset($_SESSION['username']) || $_SESSION['username'] = ''){
	
	
	echo "<script>window.location.href='login.php';</script>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<?php

function getClassByID($i){
	connection();
	return query("select * from classes where class_id='.$i.'"); 
}



 if(isset($_GET['minimize'])){
	 $classid2 = $_GET['classid2'];
	 if($_SESSION[$classid2]<=1){
		 unset($_SESSION[$classid2]);
	 }else{
	   $_SESSION[$classid2]--;
	   echo "<script>window.location.href='checkout.php';</script>";
	   exit;
	 }
 }elseif(isset($_GET['increase'])){
	    $classid2 = $_GET['classid2'];
		$classID = substr($classid2,5);
		connection();
		$q = "select * from classes where class_id = $classID" ;
		$res = query($q);
		$row = mysqli_fetch_array($res);
		$seatCount = $row[class_seats];
		
		if($_SESSION[$classid2] < $seatCount)
		     $_SESSION[$classid2]++;
		
		   
	 echo "<script>window.location.href='checkout.php';</script>";
			exit;
			
			
 }elseif(isset($_GET['delete'])){
	 $classid2 = $_GET['classid2'];
	 unset($_SESSION[$classid2]);
	 echo "<script>window.location.href='checkout.php';</script>";
     exit; 
 }


?>

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

    <!-- Page Content -->
    <br/><div class="container">

<!-- /.row --> 

<div class="row">

      <h1 style="position:relative;left:120px;top:30px">Checkout</h1>
 <div class="col-lg-10 ">
<form action="https://sandbox.paypal.com/signin" method="post"> 
  <input type="hidden" name="cmd" value="_cart"> 
  <input type="hidden" name="business" value=" sb-z3h8v14705557@business.example.com">
  <input type="hidden" name="currency_code" value="USD">
  <input type="hidden" name="upload" value="1">

    <table style="position:relative;top:100px;right:50px" class="table table-striped">
        <thead>
          <tr>
           <th>Class Name</th>
           <th>Registration Fees</th>
           <th>Seats</th>
           <th>Sub-total</th>
		   <th></th>
     
          </tr>
        </thead>
        <tbody>
            <?php
			checkoutTable();
			?>
        </tbody>
    </table>
	<input type="image" name="submit" style="position:relative;top:100px;right:50px"
	src="img/paypal3.png" 
	alt="PayPal - The safer, easier way to pay online"/> 
	
</form>
</div>


<!--  ***********CART TOTALS*************-->
            
<div class="col-xs-4 pull-right ">
<h2 style="position:relative;left:900px;top:130px">Cart Totals</h2>

<table style="position:relative;left:900px;top:140px" class="table table-bordered" cellspacing="0">

<tr class="cart-subtotal">
<th>Total Seats</th>
<td><span class="amount">

<?php echo $classCount; ?>

</span></td>
</tr>

<tr class="order-total">
<th> Total Fees</th>
<td><strong><span class="amount">

<?php echo '<p>&#36;'.$classSum.'</p>'; ?>

</span></strong> </td>
</tr>


</tbody>

</table> 

</div><!-- CART TOTALS-->


 </div><!--Main Content-->

<br/><br/><br/><br/><br/><br/><br/><br/>
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
