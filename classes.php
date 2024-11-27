<div class="container">
        <div class="text-center pb-2">
          <p class="section-title px-5">
            <span class="px-2">Popular Classes</span>
          </p>
          <h1 class="mb-4">Classes for Your Kids</h1>
        </div>
        <div class="row">
        
      <?php
	   $res=getClasses();
	  
	   for($i=1;$i<=3;$i++){
		   $row=mysqli_fetch_array($res);
		 echo '
<div class="col-lg-4 mb-5">
            <div class="card border-0 bg-light shadow-sm pb-2">
              <img class="card-img-top mb-2" src='.$row[class_img].' alt="" />
              <div class="card-body text-center">
                <h4 class="card-title"><a href="classpage.php?classid='.$row[class_id].'.">'.$row[class_name].'</a></h4>
               
			   <p class="card-text">'.substr($row[class_disc],0,150).' </p>
              
			  </div>
              <div class="card-footer bg-transparent py-4 px-5">
                <div class="row border-bottom">
                  <div class="col-6 py-1 text-right border-right">
                    <strong>Age of Kids</strong>
                  </div>
                  <div class="col-6 py-1">'.$row[class_age].' Years</div>
                </div>
                <div class="row border-bottom">
                  <div class="col-6 py-1 text-right border-right">
                    <strong>Total Seats</strong>
                  </div>
                  <div class="col-6 py-1">'.$row[class_seats].' Seats</div>
                </div>
                <div class="row border-bottom">
                  <div class="col-6 py-1 text-right border-right">
                    <strong>Class Time</strong>
                  </div>
                  <div class="col-6 py-1">'.$row[class_time].'</div>
                </div>
                <div class="row">
                  <div class="col-6 py-1 text-right border-right">
                    <strong>Tution Fee</strong>
                  </div>
                  <div class="col-6 py-1">&#36;'.$row[class_fee].'/ Month</div>
                </div>
              </div>
              <a href="cart.php?classid='.$row[class_id].'" class="btn btn-primary px-4 mx-auto mb-4">Join Class</a>
            </div>
          </div> ';
		
		  
	   }
	   
    ?>
	
			<a style="position:relative;left:1000px;top:10px" href="class.php" class="btn btn-outline-primary m-1">see more</a>

	   </div>
      </div>
	  <br>
   