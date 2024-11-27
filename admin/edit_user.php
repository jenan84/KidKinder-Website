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


<script type="text/javascript" charset="utf-8">


function getdata2(){
	var txt = document.getElementById('user_name').value;
       document.cookie="user="+ txt;
	   window.location.reload(); 
}




</script>

<?php include("head.php"); ?>

<body>

<?php

if(isset($_POST['edit'])){
	
	updateUser();
	
	
}


$user2 = $_COOKIE['user'];

 if(isset($user2)){
	 
 $res2 = getUserInfoByName($user2);
 $row2 = mysqli_fetch_array($res2);

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
   Edit User

</h1>
</div>
               
<?php

echo'
<form action="edit_user.php" method="post" enctype="multipart/form-data">


<div class="col-md-8">

<div class="form-group">
    <label for="user_name">Username </label>
		<select name="user_name" id="user_name" class="form-control" onchange="getdata2()" value="'.$row2[username].'">';
		
		
		   $res = getUsers();
		   while($row = mysqli_fetch_array($res)){
			   if($row[username] == $row2[username]){
			   echo '<option selected>'.$row[username].'</option>';
		       }else{
			   echo '<option>'.$row[username].'</option>';
		     }
		   
		   }
		?>
		
		</select>
       
    </div>

<?php

echo'

    <div class="form-group">
	
    <label for="fname">First Name </label>
        <input type="text" name="fname" class="form-control" size="10" value="'.$row2[first_name].'">
       
    </div>



    <div class="form-group ">

     
        <label for="lname">Last Name</label>
        <input type="text" name="lname" class="form-control" value="'.$row2[last_name].'">
     
    </div>



    <div class="form-group ">
        <label for="email">Email</label>
        <input type="text" name="email" class="form-control" size="60"  value="'.$row2[email].'">
     
    </div>
	
	
    <div class="form-group ">
        <label for="pass">Password</label>
        <input type="text" name="pass" class="form-control" size="60" value="'.$row2[password].'">
     
    </div>

<div class="form-group ">
<label for="admin2">Admin??</label>
<select name="admin2" id="" class="form-control">

            <option value="">Admin??</option>';
			if($row2[user_type] == 1){
			echo'
			<option selected>1-Yes</option>
			<option >2-No</option>';
			}else{
				echo'
			<option >1-Yes</option>
			<option selected>2-No</option>';
			}
          ?>
        </select>
		

</div><!--Main Content-->


<!-- SIDEBAR-->


     <div class="form-group " >
       
        <input type="submit" name="edit" class="btn btn-primary btn-lg" value="Edit User">
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
