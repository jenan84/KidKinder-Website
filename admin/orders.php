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


                


        <div class="col-md-12">
<div class="row">
<h1 class="page-header">
   All Orders

</h1>
</div>

<div class="row">
<table class="table table-hover">
    <thead>

      <tr>
           <th>Ttansaction #</th>
		   <th>First Name</th>
		   <th>Last Name</th>
           <th>Currency</th>
           <th>Amount</th>
           <th>Status</th>
           <th>Transation ID</th>
           <th>Classes</th>
           
      </tr>
    </thead>
    <tbody>
	
	<?php
	    connection();
	    $res = query("select * from payments");
		while($row = mysqli_fetch_array($res)){
			$classArray = substr($row[classes],1);
			$classes = explode(";", $classArray);
			$classLink = "";
			foreach($classes as $key => $value){
				if($key == count($classes)-1)
					continue;
				$class = $value;
				$classArr = explode(":", $class);
				
				$x  =   explode("ss",$classArr[0]);
			  
			   
			   $result = getClassName($x[1]);
			   $row2 = mysqli_fetch_array($result);
			   $className = $row2[0];
			   
				$classID = substr($classArr[0],5);
				$classLink = $classLink. "<a href='../classpage.php?classid=$classID'>$className</a> : $classArr[1] <br/>";
				
			}
			
			
	echo '
		<tr>
            <td>'.$row[ID].'</td>
			<td>'.$row[first_name].'</td>
			<td>'.$row[last_name].'</td>
            <td>'.$row[currency].'</td>

            <td>&#36;'.$row[amount].'</td>
            <td>'.$row[status].'</td>
            <td>'.$row[transaction].'</td>
            <td>'.$classLink.'</td>
          
        </tr>' ;	
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
