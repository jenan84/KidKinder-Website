<?php
session_start();
//include("config.php");
$x="";
$y="";
$z="";
function register2(){
	connection();
	
	
	if(isset($_POST['submit2'])){
		
		$res = query("select * from users where username='{$_POST['username']}'");
		
		if( mysqli_num_rows($res) == 0){
		   $user = $_POST['username'];
		   $fname = $_POST['firstName'];
		   $lname = $_POST['lastName'];
		   $email = $_POST['email'];
		   
			if($_POST['password'] == $_POST['confirm']){
				$pass = $_POST['password'];
				
				$result = query("insert into users(userid,username,first_name,last_name,email,password,user_type)
		        values('','$user','$fname','$lname','$email','$pass',2)");
				$res2 = query("select * from users where username='$user'");
				if(mysqli_num_rows($res2)>0){
					
					addOperationInfo($_SESSION['username'],"Signed up");
					
				//	echo "<script>window.location.href='register.php';</script>";
    //exit;
					echo "Signed up successfully !!!";
				}else{
					global $z;
		            $z = "Failed to sign up !!!";
					echo $z;
				}
			}else{
				global $y;
				$y = "Passwords do not match !!!";
				echo $y;
				
			}
		}else{
			global $x;
			$x = "Username taken !!!";
			echo $x;
			
		}
	}
}
	?>