 
 
 <?php
 //include('submit.php');
 
 

 ?>
 
 <div class="container-fluid py-5">
      <div class="container p-0">
        <div class="text-center pb-2">
          <p class="section-title px-5">
            <span class="px-2">Testimonial</span>
          </p>
          <h1 class="mb-4">What Parents Say!</h1>
        </div>
 
 
 
 <div class="owl-carousel testimonial-carousel">
          
		  <?php
		  $res=getTestimonials();
		  while($row=mysqli_fetch_array($res)){
		  echo'
		  
		  <div class="testimonial-item px-3">
            <div class="bg-light shadow-sm rounded mb-4 p-4">
              <h3 class="fas fa-quote-left text-primary mr-3"></h3>
              '.$row[test_comment].'
            </div>
            <div class="d-flex align-items-center">
              <img
                class="rounded-circle"
                src="'.$row[test_img].'"
                style="width: 70px; height: 70px"
                alt="Image"
              />
              <div class="pl-3">
                <h5>'.$row[test_name].'</h5>
                <i>'.$row[test_profession].'</i>
              </div>
            </div>
          </div>';}
        
?>

     
	  </div>
    
	</div>
    </div>
	
	
	<br><br>
	<h2 style="position:relative;left:500px">Add a Testimonial</h2>
	 <div class="col-lg-9 col-md-6 mb-5">
         
          <form action="" method="get"  style="position:relative;left:150px;border: 2px solid"> 
		  
		  <div style="padding: 10px 10px 10px 10px">
            <div class="form-group">
             &nbsp; <input
                type="text"
                class="form-control border-0 py-4"
                placeholder="Your Name"
                required="required"
				name="n"
              />
			  
			  
            </div>
			
			<div class="form-group"  >
              <input
                type="text"
                class="form-control border-0 py-4"
                placeholder="Your Profession"
                required="required"
			    name="sub"
              />
            </div>
            <div class="form-group">
             
			 &nbsp; <textarea  style="width:600px" col="40" rows="2" placeholder="add a comment" maxlength="200" name="text" required="required" ></textarea>


			
			
			
            </div>
			
		  &nbsp;<label>	choose a picture</label> &nbsp;&nbsp;
		  <input type="file" name="pic" accept="image/png, image/gif, image/jpeg"  style="position:relative;left:8px"/><br><br>
			
			
            <div>
			
		
              
			  
			  <button
                class="btn btn-primary btn-block border-0 py-3"
                type="submit"
				style="width:200px"
				name="submit">
				
             
                Submit Now
              </button>
          
		
			
			</div>
			</div>
          </form>
		  
		
	
		  
	
			<?php
			  
             if(isset($_GET['submit'])) {
                submitTestimonial();
				
           }
		   
			?>
		  
        </div>