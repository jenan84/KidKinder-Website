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

if(isset($_GET['delete'])){
	 connection();
	 $catID2 = $_GET['catid'];
	 $res = getCatName($catID2);
	 $row = mysqli_fetch_array($res);
	 $cName = $row[cat_name];
	
	 addOperationInfo($_SESSION['username'],"Delete Category($cName)");
	 query("delete from classcategory where cat_id = '$catID2' ");
	 echo "<script>window.location.href='categories.php';</script>";
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

            

            

<h1 class="page-header">
  Product Categories

</h1>

<?php
if(isset($_POST['submit'])){

   $res = addCategory($_POST['catName']);
  //$catName = $_POST['catName'];
  // addOperationInfo($_SESSION['username'],"Add Category($catName)");
   echo "<script>window.location.href='categories.php';</script>";
    exit;
  
}
?>

<div class="col-md-4">
    
    <form action="categories.php" method="post">
    
        <div class="form-group">
            <label for="category-title">Title</label>
            <input type="text" name="catName" class="form-control">
        </div>

        <div class="form-group">
            
            <input type="submit" name="submit" class="btn btn-primary" value="Add Category">
        </div>      


    </form>


</div>


<div class="col-md-8">

    <table class="table">
            <thead>

        <tr>
            <th>id</th>
            <th>Title</th>
        </tr>
            </thead>


    <tbody>
	<?php
	$res = getClassCategories();
	$catID = "";
	while($row = mysqli_fetch_array($res)){
		global $catID;
		$catID = $row[cat_id];
	echo'
        <tr>
            <td>'.$row[cat_id].'</td>
            <td>'.$row[cat_name].'</td>
			<td><a  href="categories.php?delete=1&catid='.$catID.'"><button type="button" class=" btn-info">Delete</a></td>
        </tr>';
	}
	






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
