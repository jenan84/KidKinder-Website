<?php
session_start();
function login(){
	connection();
	if(isset($_POST['submit'])){
		$user=$_POST['username'];
		$pass=$_POST['password'];

		$res=query("select * from users where username='{$user}' and password='{$pass}'");
		$row=mysqli_fetch_array($res);
		$_SESSION['admin'] = $row['user_type'];
		if(mysqli_num_rows($res)==0){
			showError("Username or password incorrect!!");
		}elseif($_SESSION['admin'] == 1){
		
			$_SESSION['username'] = $user;
			$_SESSION['firstname'] = $row['first_name'];
			$_SESSION['lastname'] = $row['last_name'];
			
			$_SESSION['userid'] = $row['userid'];
			addOperationInfo($_SESSION['username'],"Login");
			echo "<script>window.location.href='admin/index2.php';</script>";
    exit;
		}else{
			$_SESSION['firstname'] = $row['first_name'];
			$_SESSION['lastname'] = $row['last_name'];
			$_SESSION['username'] = $row['username'];
			
			addOperationInfo($_SESSION['username'],"Login");
			echo "<script>window.location.href='index.php';</script>";
    exit;
			
		}
		
	}	
}
?>




