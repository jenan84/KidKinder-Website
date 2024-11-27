
 <a       
          href=""
          class="navbar-brand font-weight-bold text-secondary"
          style="font-size: 45px"
        >
          <i class="flaticon-043-teddy-bear" style="position:relative;right:30px"></i>
          <span class="text-primary" style="position:relative;right:30px">KidKinder</span>
        </a>
        <button
          type="button"
          class="navbar-toggler"
          data-toggle="collapse"
          data-target="#navbarCollapse"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div
          class="collapse navbar-collapse justify-content-between"
          id="navbarCollapse"
        >
	
          <div class="navbar-nav font-weight-bold mx-auto py-0" style="position:relative;right:30px">
		  
		  
		  
            <a href="index.php" class="nav-item nav-link active">Home</a>
            <a href="about2.php" class="nav-item nav-link">About</a>
            <a href="class.php" class="nav-item nav-link">Classes</a>
            <a href="team.php" class="nav-item nav-link">Teachers</a>
            <a href="gallery.php" class="nav-item nav-link">Gallery</a>
            <div class="nav-item dropdown">
		
              <a
                href=""
                class="nav-link dropdown-toggle"
                data-toggle="dropdown"
                >Pages</a
              >
              <div class="dropdown-menu rounded-0 m-0">
                <a href="blog.php" class="dropdown-item">Blog Grid</a>
               <!-- <a href="single.html" class="dropdown-item">Blog Detail</a>-->
              </div>
            </div>
            <a href="contact.php" class="nav-item nav-link">Contact</a>
			<a href="checkout.php" class="nav-item nav-link">CheckOut</a>

			
			
			<a href="login.php" class="nav-item nav-link">Login</a>
			<a href="admin/index2.php" class="nav-item nav-link">Admin</a>
			
      
			
          </div>
		  
		  
		  
		  
		  <ul class="nav navbar-right top-nav" style="position:relative;right:30px">
              <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo  $_SESSION['firstname']." ". $_SESSION['lastname'] ; ?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                       
                        <li class="divider"></li>
						<?php
						if(isset($_SESSION['firstname'])){
							echo'
                        <li>
                            <a href="admin/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>';
						}
						?>
                    </ul>
                </li>
            </ul>
				
        
      