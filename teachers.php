 
 <div class="row">
          
		  <?php
		     
			 $res=getTeachers();
			for($i=1;$i<=4;$i++){
		   $row=mysqli_fetch_array($res);
		 echo '
		  
		  <div class="col-md-6 col-lg-3 text-center team mb-5">
            <div
              class="position-relative overflow-hidden mb-4"
              style="border-radius: 100%"
            >
              <img class="img-fluid w-100" src='.$row[teacher_img].' alt="" />
              <div
                class="team-social d-flex align-items-center justify-content-center w-100 h-100 position-absolute"
              >
                <a
                  class="btn btn-outline-light text-center mr-2 px-0"
                  style="width: 38px; height: 38px"
                  href="'.$row[twitter].'"
                  ><i class="fab fa-twitter"></i
                ></a>
                <a
                  class="btn btn-outline-light text-center mr-2 px-0"
                  style="width: 38px; height: 38px"
                  href="'.$row[facebook].'"
                  ><i class="fab fa-facebook-f"></i
                ></a>
                <a
                  class="btn btn-outline-light text-center px-0"
                  style="width: 38px; height: 38px"
                  href="'.$row[linkedin].'"
                  ><i class="fab fa-linkedin-in"></i
                ></a>
              </div>
            </div>
            <h4><a href="teacherpage.php?teacherid='.$row[teacher_id].'.">'.$row[teacher_name].'</a></h4>
            <i>'.$row[teacher_subject].' Teacher</i>
			</div>';
			}
        ?>
		
		<a style="position:relative;left:1000px;top:30px"  href="team.php" class="btn btn-outline-primary m-1">see more</a>
		
		</div>
		<br><br>