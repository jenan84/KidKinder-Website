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
	 $userid = $_GET['userid'];
	 
	 $res = getUserName($userid);
	 $row = mysqli_fetch_array($res);
	 $uName = $row[username];
	
	 addOperationInfo($_SESSION['username'],"Delete User($uName)");
	 
	 query("delete from users where userid = '$userid' ");
	 echo "<script>window.location.href='users.php';</script>";
     exit; 
 }
?>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            
			<?php include("topNav.php") ?>
			
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            
			<?php include("sideNav.php"); ?>
			
            <!-- /.navbar-collapse -->
        </nav>



        <div id="page-wrapper">

            <div class="container-fluid">



                    <div class="col-lg-12">
                      

                        <h1 class="page-header">
                            Users
                         
                        </h1>
                          <p class="bg-success">
                            <?php echo $message; ?>
                        </p>

                        <a href="add_user.php" class="btn btn-primary">Add User</a>


                        <div class="col-md-12">

                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Username</th>
                                        <th>First Name</th>
                                        <th>Last Name </th>
										<th>email</th>
										<th>Admin ? </th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php
	   $res = getUsers();
		while($row = mysqli_fetch_array($res)){
			$admin = $row[user_type];
			if($admin == 1)
				$admin = "Yes";
			else
				$admin = "No";
			
		global $userID;
	$userID = $row[userid];	
	echo '
		
            <tr>

                <td>'.$row[userid].'</td>
				<td>'.$row[username].'</td>
                                        
				<td>'.$row[first_name].'
				<div class="action_links">

                                                
				</div>
				</td>
                                        
                                        
				<td>'.$row[last_name].'</td>
				<td>'.$row[email].'</td>
				<td>'.$admin.'</td>
				<td><a  href="users.php?delete=1&userid='.$userID.'"><button type="button" class=" btn-info">Delete</a></td>
			</tr>
' ;	
		}
		
	?>
	
	                
                                    
                                </tbody>
                            </table> <!--End of Table-->
                        

                        </div>
                        
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
