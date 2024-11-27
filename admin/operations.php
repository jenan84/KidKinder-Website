<?php 
session_start();
include("head.php");
include("../config.php");



if(!isset($_SESSION['username']) || $_SESSION['admin'] != 1 && $_SESSION['admin'] != ''){
	
	
	echo "<script>window.location.href='../login.php';</script>";
    exit;
}


 ?>

<!DOCTYPE html>
<html lang="en">

<body>

<?php

if(isset($_GET['delete'])){
	 connection();
	 $classid = $_GET['classid'];
	 query("delete from classes where class_id = '$classid' ");
	 echo "<script>window.location.href='products.php';</script>";
     exit; 
 }
?>



    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            
			<?php include("topNav.php"); ?>
			
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            
			<?php include("sideNav.php"); ?>
			
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

             <div class="row">

<h1 class="page-header">
   All Operations

</h1>
<table class="table table-hover">


    <thead>

      <tr>
           <th>Operation Name</th>
           <th>User</th>
           <th>Date</th>
           <th>Time</th>
      </tr>
    </thead>
    <tbody>
<?php
$res = getOperations();
while($row = mysqli_fetch_array($res)){
	
echo'
      <tr>
           <td>'.$row[operationName].'</td>
           <td>'.$row[username].'</td>
           <td>'.$row[3].'</td>
		   <td>'.$row[4].'</td>
           
</tr>';}
      

?>
  </tbody>
</table>


             </div>

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