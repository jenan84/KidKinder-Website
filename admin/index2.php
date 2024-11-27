<?php
session_start();

if(!isset($_SESSION['username']) || $_SESSION['admin'] != 1 ){
	
	
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
		  
		   <?php include("topNav.php");?>
		   
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
           
		   <?php include("sideNav.php");?>
		   
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                
				<?php 
				include("tittle.php"); 
				
				//echo $_SERVER['REQUEST_URI'];
				
				?>
				
                <!-- /.row -->

                 <!-- FIRST ROW WITH PANELS -->

                <!-- /.row -->
                <?php
				include("adminPanel.php");
				?>
        
                <!-- /.row -->


                <!-- SECOND ROW WITH TABLES-->

				<div class="row">
                    <div class="col-lg-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-credit-card fa-fw"></i> Transactions Panel</h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
										
										
										
										
                                            <tr>
                                                <th>Transaction</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Amount (USD)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
	<?php
                    $res = getTransactions();
	  
	                for($i=1;$i<=8;$i++){
		               $row=mysqli_fetch_array($res);
				
				          echo'
                                <tr>
                                 <td>'.$row[transaction].'</td>
                                 <td>'.$row[first_name].'</td>
                                 <td>'.$row[last_name].'</td>
                                 <td>&#36;'.$row[amount].'</td>
								</tr>';}
                                            
	?>
                                           
                                        </tbody>
                                    </table>
                                </div>
                                <div class="text-right">
                                    <a href="orders.php">View All Transactions <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
					</div>  







                     <div class="col-lg-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-bars fa-fw"></i> Operations Panel</h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
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
	  
	                for($i=1;$i<=8;$i++){
		               $row=mysqli_fetch_array($res);
				
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
                                <div class="text-right">
                                    <a href="operations.php">View All Operations <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>




                </div>
                <!-- /.row -->

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
