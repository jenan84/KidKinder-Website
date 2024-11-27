 
 <?php
 //include('config.php');
 ?>
 
 <div class="container-fluid pt-5">
      <div class="container pb-3">
        <div class="row">
         
     <?php
	  $res=getFacilities();
	 while($row=mysqli_fetch_array($res)){
		  echo '
		 <div class="col-lg-4 col-md-6 pb-1">
            <div
              class="d-flex bg-light shadow-sm border-top rounded mb-4"
              style="padding: 30px"
            >
              <i
                class="flaticon-'.$row[fac_img].' h1 font-weight-normal text-primary mb-3"
              ></i>
              <div class="pl-4">
                <h4>'."$row[fac_name]".'</h4>
                <p class="m-0"> '.substr($row[fac_disc],0,100).'
                  
                </p>
              </div>
            </div>
          </div>
    ';
	   }
	   ?>
		
	   </div>
      </div>
    </div>
	