<div class="row pb-3">
    
<?php	

   $res=getBlogs();
   for($i=1;$i<=3;$i++){
   $row=mysqli_fetch_array($res);

   echo'
        
		 <div class="col-lg-4 mb-4">
            <div class="card border-0 shadow-sm mb-2">
              <img class="card-img-top mb-2" src="'.$row[blog_img].'" alt="" />
              <div class="card-body bg-light text-center p-4">
                <h4 class="">'.$row[blog_title].'</h4>
                <div class="d-flex justify-content-center mb-3">
                  <small class="mr-3"
                    ><i class="fa fa-user text-primary"></i>'.$row[blog_writer].'</small
                  >';
				  
				  $result=getBlogCategoryByID($row[blog_id]);
				  $row2=mysqli_fetch_array($result);
				  echo'
				  
                  <small class="mr-3"
                    ><i class="fa fa-folder text-primary"></i> '.$row2[blogCat_name].'</small
                  >
                  <small class="mr-3"
                    ><i class="fa fa-comments text-primary"></i> '.$row[blog_comments].'</small
                  >
                </div>
                <p>
                   '.substr($row[blog_content],0,140).'...
                </p>
                <a href="blogpage.php?blogid1='.$row[blog_id].'." class="btn btn-primary px-4 mx-auto my-2"
                  >Read More</a
                >
              </div>
            </div>
			 </div>
			';
   }
	?>		
			
         
         





	 </div>
    