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
	 $res = getClassName($classid);
	 $row = mysqli_fetch_array($res);
	 $cName = $row[class_name];
	
	 addOperationInfo($_SESSION['username'],"Delete Class($cName)");
	 query("delete from classes where class_id = '$classid'");
	 
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
   All Classes

</h1>
<table class="table table-hover">


    <thead>

      <tr>
           <th>Class Id</th>
           <th>Class Title</th>
           <th>Class Age</th>
		   <th>Class seats</th>
           <th>Class time</th>
		   <th>Class Price</th>
		      <th>Class Category</th>
		   <th>Class teacher</th>
      </tr>
    </thead>
    <tbody>
<?php
$res = getClasses2();
while($row = mysqli_fetch_array($res)){
	$result = getTeacherName($row[teacher_id]);
	$teacher = mysqli_fetch_array($result);
	$result2 = getCatName($row[class_cat_id]);
	$category = mysqli_fetch_array($result2);
	global $classID;
	$classID = $row[class_id];
echo'
      <tr>
           <td>'.$row[class_id].'</td>
           <td>'.$row[class_name].'</td>
           <td>'.$row[class_age].'</td>
		   <td>'.$row[class_seats].'</td>
           <td>'.$row[class_time].'</td>
		   <td>&#36;'.$row[class_fee].'</td>
		   <td>'.$category[cat_name].'</td>
		   <td>'.$teacher[teacher_name].'</td>
		   <td><a  href="products.php?delete=1&classid='.$classID.'"><button type="button" class=" btn-info">Delete</a></td>
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
