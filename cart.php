<?php
require_once('config.php');




$classCount = 0;
$classSum = 0;	

if(isset($_GET['classid'])){
	addToCart($_GET['classid']);

}	

function addToCart($id){
	if(isset($_SESSION['class'.$id])){
		$_SESSION['class'.$id]++;
	}else{
		$_SESSION['class'.$id]=1;
	}
	  	echo "<script>window.location.href='class.php?';</script>";
    exit;
}


function checkoutTable(){

$classCounter = 0;

	foreach($_SESSION as $key => $value){
		$classCounter++;
		if(substr($key,0,5) == 'class'){
			connection();
			$classid = substr($key,5);	
			$res = query("select * from classes where class_id=$classid");
	        $class = mysqli_fetch_array($res);
			
			$totalClass=$class[class_fee]*$value;
			global $classCount;
			$classCount += $value;
			global $classSum ;
	        $classSum += $totalClass;
	$row = '<tr>
                <td>'.$class[class_name].'</td>
                <td>&#36;'.$class[class_fee].'</td>
                <td>'.$value.'</td>
                <td>&#36;'.$totalClass.'</td>
				<td> 
				<a href="checkout.php?minimize=1&classid2='.$key.'"><button  type="button" class="btn"><img src="img/minus.png" /></button></a>
				<a href="checkout.php?increase=1&classid2='.$key.'"><button type="button" class="btn"><img src="img/plus.png" /></button></a>
				<a href="checkout.php?delete=1&classid2='.$key.'"><button type="button"  class="btn"><img src="img/bin.png" /></button></a>
				</td>
            </tr>';
			
			
			echo
			'<input type="hidden" name="item_name_'.$classCounter.'" value="'.$class[class_name].'"> 
            <input type="hidden" name="item_number_'.$classCounter.'" value="'.$classCounter.'"> 
            <input type="hidden" name="amount_'.$classCounter.'" value="'.$class[class_fee].'">
			<input type="hidden" name="quantity_'.$classCounter.'" value="'.$value.'">';
			
			
			echo $row; 
			
		}// end if
	}//end loop
}// end unction



function checkoutTable2(){



	foreach($_SESSION as $key => $value){
		
		if(substr($key,0,5) == 'class'){
			connection();
			$classid = substr($key,5);	
			$res = query("select * from classes where class_id=$classid");
	        $class = mysqli_fetch_array($res);
			
			$totalClass=$class[class_fee]*$value;
			
		    global $classCount;
			$classCount += $value;
			global $classSum ;
	        $classSum += $totalClass;
	$row = '<tr>
                <td>'.$class[class_name].'</td>
                <td>&#36;'.$class[class_fee].'</td>
                <td>'.$value.'</td>
                <td>&#36;'.$totalClass.'</td>
				
            </tr>';
			
			
			echo $row; 
			
		}// end if
	}//end loop
}// end function


?>