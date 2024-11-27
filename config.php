<?php 
ob_start();
session_start();
//session_destroy();

$conn;
//$q="";

defined(LOCALHOST)?null:define(LOCALHOST,'localhost');
defined(USERNAME)?null:define(USERNAME,'root');
defined(PASSWORD)?null:define(PASSWORD,'');
defined(DB)?null:define(DB,'kidkinder');


function connection(){
	global $conn;
$conn=mysqli_connect(LOCALHOST,USERNAME,PASSWORD,DB) or die("can not connect to database");

}

function query($q){
	global $conn;
	$result=mysqli_query($conn,$q);
	return $result;
}



function addOperationInfo($user,$title){
	
       connection();
	   date_default_timezone_set('Asia/Amman');
	
	   $date = date("j/n/Y");
	   $time = date("h:i:s A");
	   $username = $user;
	   $operationName = $title;
	   query("insert into operations(OID,operationName,username,date,time)values('','$operationName',
	   '$username','$date','$time')");
       
}


function getFacilities(){
	connection();
	return query('select * from facility');
	
}

function getClasses(){
	connection();
	return query('select * from classes where class_seats <> 0'); 
}


function getClasses2(){
	connection();
	return query("select * from classes"); 
}

function getClass($i){
	connection();
	return query("select * from classes where class_id=$i AND class_seats <> 0 "); 
}


function getBlogByID($i){
	connection();
	return query("select * from ourblogs where blog_id=$i"); 
}



function getTeachers(){
	connection();
	return query('select * from teachers');
}

function getTeacherByID($id){
	connection();
	return query("select teacher_name from teachers,classes where class_id=$id and classes.teacher_id=teachers.teacher_id");
}


function getBookClassOptions(){
	connection();
	return query('select * from classes,teachers where classes.teacher_id=teachers.teacher_id');
}

function getTestimonials(){
	connection();
	return query('select * from testimoniaal');
}

function getGaleryCategories(){
	connection();
	return query('select * from galeryCategory');
}

function getGalery(){
	connection();
	return query('select * from galery ');
}




function getGaleryByCategory($id){
	connection();
	return query("select * from galery where galCategory_id=$id ");
}

function backToTop(){
	echo '<a href="#" class="btn btn-primary p-3 back-to-top"
      ><i class="fa fa-angle-double-up"></i
    ></a>';
}

function getTeacher($i){
	connection();
	return query("select * from teachers where teacher_id=$i");
	
}


function getClassesForTeacher($i){
	connection();
	return query("select class_name from classes where teacher_id=$i");
	
}


function getBlogs(){
	connection();
	return query('select * from ourblogs ');
}



function getBlogCategory(){
	connection();
	return query('select * from  blogcategory ');
}


function getBlogCategoryByID($id){
	connection();
	return query("select blogCat_name from blogcategory,ourblogs where ourblogs.blogCat_id=blogcategory.blogCat_id and blog_id=$id");
}




function getBlogByCategory($id){
	connection();
	return query("select * from ourblogs where blogCat_id=$id ");
}


function getBlog($i){
	connection();
	return query("select * from ourblogs where blog_id=$i"); 
}





function getClassCategory(){
	connection();
	$res = query("select * from classCategory");
	return $res;
	
}

function getClassByCategory($id){
	connection();
	return $res = query("select * from classes where class_cat_id = $id");
	
	
	
}


function addCategory($i){
	connection();
	$catName = $_POST['catName'];
    query("insert into classCategory(cat_name) values('{$i}')");
    addOperationInfo($_SESSION['username'],"Add Category($catName)");
}


function getClassCategories(){
	connection();
	return query("select * from  classcategory");
	
}

function countCategories(){
	connection();
	return query("select count(cat_id) from classcategory");
}

function countClasses(){
	connection();
	return query("select count(class_id) from classes");
}


function countOrders(){
	connection();
	return query("select count(ID) from payments");
}


function getUsers(){
	connection();
	return query("select * from users");
	
}

function submitTestimonial(){
	
	connection();
	
   $name=$_GET['n'];
	$subject=$_GET['sub'];
	$comment=$_GET['text'];
	
	if(isset($_GET['pic']) and $_GET['pic']!="" ){
	    $pic=$_GET['pic'];
	}else{
		$pic="profile2.jpg";
		
	}
	

	 query("insert into testimoniaal (test_id,test_name,test_comment,test_profession,test_img) VALUES 
   ('','$name','$comment','$subject','img/$pic')");
  
  echo "<script>window.location.href='index.php';</script>";
    exit;


}  



function showError($error){
	$_SESSION['error']= $error;
	
}


function sendMail(){
	
	$from     = $_POST['name'];
	$subject  = $_POST['subject'];
	$msg      = "You have a new email from: $from<br/>" . $_POST['message'];
	return mail('admin@helpdisk.com',$subject,$msg);
}


function getTeacherName($id){
	connection();
	return $res = query("select teacher_name from teachers where teacher_id = '$id'");
}


function getUserName($id){
	connection();
	return $res = query("select username from users where userid = '$id'");
}

function getCatName($id){
	connection();
	return $res = query("select cat_name from classCategory where cat_id = '$id'");
}

function InsertClass(){
	connection();
	$Teacher = substr($_POST['class_teacher'],0,strpos($_POST['class_teacher'],"-"));
	$classCat = substr($_POST['class_category'],0,strpos($_POST['class_category'],"-"));
	
	$classTitle 	= $_POST['class_title'];
	$classDesc	    = $_POST['class_description'];
	$classPrc 		= $_POST['class_price'];
	$classSeats 	= $_POST['class_seats'];
	
	$classTime 		= $_POST['class_time'];
	$classAge 		= $_POST['class_age'];
	
	
	$name = $_FILES["class_img2"]["name"];
	if(empty($name)){
		global $name;
		$name = "placeholder.png";
	}
	
	 query("insert into classes(class_id,class_name,class_disc,class_age,class_seats,
	class_time,class_fee,class_img,teacher_id,class_cat_id)values('','$classTitle','$classDesc','$classAge',$classSeats,
	'$classTime',$classPrc,'img/$name',$Teacher,$classCat)");
	
	addOperationInfo($_SESSION['username'],"Insert Class($classTitle)");
	
	 echo "<script>window.location.href='add_product.php';</script>";
    exit;
}




function getTeachersToOptions(){
	connection();
	return $res = query("select * from teachers");
	
}


function getTransactions(){
	connection();
	return query("select * from payments");
}



function getClassName($id){
	connection();
	return query("select class_name from classes where class_id = '$id'");
}




function redisplayForm($user,$firstn,$lastn,$email,$pass,$pass2){
	
	echo'
	<div class="col-sm-4 col-sm-offset-5">         
            <form  class="" action="" method="post" enctype="multipart/form-data">
                
			<div style="position:relative;left:300px;top:50px">	
				
				<div class="form-group"><label for="username">
                    username<input type="text" name="username" class="form-control" required  value="'.$user.'"></label>
					
                </div>
				
				
				<div>
				<label for="firstName">
                   First Name<input type="text" name="firstName" class="form-control" required  value="'.$firstn.'"></label>
				 </div>
				
				
				<div>
				<label for="lastName">
                    Last Name<input type="text" name="lastName" class="form-control" required  value="'.$lastn.'"></label>
				 </div>
				<a href="login.php" style="position:relative;top:30px;font-size:20px">login</a>
			</div>
			
			
			<div style="position:relative;left:650px;top:-200px">
				
				
				<div>
				<label for="email">
                   Email<input type="text" name="email" class="form-control" required  value="'.$email.'"></label>
				 </div>
				
                <div class="form-group"><label for="password">
                    Password<input type="password" name="password" class="form-control" required  value="'.$pass.'"></label>
                </div>

                <div>
				<label for="confirm">
                    Confirm Password<input type="password" name="confirm" class="form-control" required  value="'.$pass2.'"></label>
				 </div>
				 
			</div>

                <div class="form-group"  style="position:relative;left:830px;top:-140px">
                  <input type="submit" name="submit2" class="btn btn-primary" value="Sign up">
                </div>
				
            </form>';
}




function getInfoOfClass($id){
	connection();
	return query("select * from classes where class_id='$id'");
	
}



function getclassID($name){
	connection();
	return query("select class_id from classes where class_name='$name'");
	
	
}

function updateClass(){
	connection();
    $Teacher = substr($_POST['class_teacher'],0,strpos($_POST['class_teacher'],"-"));
	$classCat = substr($_POST['class_category'],0,strpos($_POST['class_category'],"-"));
	
	$classTitle 	= $_POST['class_title'];
	$classDesc	    = $_POST['class_description'];
	$classPrc 		= $_POST['class_price'];
	$classSeats 	= $_POST['class_seats'];
	
	$classTime 		= $_POST['class_time'];
	$classAge 		= $_POST['class_age'];
	$res = getclassID($classTitle);
	$row = mysqli_fetch_array($res);
	
	$classID = $row[class_id];

	$name = $_FILES["class_img2"]["name"];
	if(empty($name)){
		global $name;
		$name = "placeholder.png";
	}
	
	query("update classes set class_name='$classTitle',class_disc='$classDesc',class_age='$classAge',
	class_seats=$classSeats,class_time='$classTime',class_fee=$classPrc,class_img='img/$name'
	,teacher_id=$Teacher,class_cat_id=$classCat where class_id=$classID");
	
	addOperationInfo($_SESSION['username'],"Update Class($classTitle)");
	
		 echo "<script>window.location.href='edit_product.php';</script>";
    exit;
	
}


function addUser(){
	
	connection();
	$admin2;
	$user   = $_POST['user_name'];
	$fname  = $_POST['fname'];
	$lname  = $_POST['lname'];
	$email  = $_POST['email'];
	$admin  = $_POST['admin2'];
	$admin2 = substr($_POST['admin2'],0,strpos($_POST['admin2'],"-"));
	$pass   = $_POST['pass'];
	
 query("insert into users(userid,username,first_name,last_name,email,password,user_type)
 values('','$user','$fname','$lname','$email','$pass',$admin2)");
 
 addOperationInfo($_SESSION['username'],"Add User($user)");
 
 echo "<script>window.location.href='add_user.php';</script>";
    exit;

}


function getUserID($name){
	connection();
	return query("select userid from users where username='$name'");
}


function updateUser(){
	
	connection();
	$admin2;
	$user   = $_POST['user_name'];
	$fname  = $_POST['fname'];
	$lname  = $_POST['lname'];
	$email  = $_POST['email'];
	$admin  = $_POST['admin2'];
	$admin2 = substr($_POST['admin2'],0,strpos($_POST['admin2'],"-"));
	$pass   = $_POST['pass'];
	$res = getUserID($user);
	$row = mysqli_fetch_array($res);
	$userID = $row[userid];
	
	query("update users set username='$user',first_name='$fname',last_name='$lname',
	email='$email',password='$pass',user_type=$admin2 where userid=$userID");
	
	addOperationInfo($_SESSION['username'],"Update User($user)");
	
	echo "<script>window.location.href='edit_user.php';</script>";
    exit;
}


function getOperations(){
	connection();
	return query("select * from operations order by OID");
}


function getClassInfoByName($name){
	connection();
	return query("select * from classes where class_name='$name'");
} 


function getUserInfoByName($name){
	connection();
	return query("select * from users where username='$name'");
} 

?>

