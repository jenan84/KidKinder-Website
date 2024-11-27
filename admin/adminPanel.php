<?php
include("../config.php");
?>




<?php
		  
		  $res = countOrders();
		  $result = mysqli_fetch_array($res);
		  
		  ?>

<div class="row">

                            <div class="col-lg-4 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-shopping-cart fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $result[0]; ?></div>
                                        <div>New Orders!</div>
                                    </div>
                                </div>
                            </div>
                           <!-- <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>  -->
                        </div>
                    </div>


        <?php
		  
		  $res = countClasses();
		  $result = mysqli_fetch_array($res);
		  
		  ?>


                    <div class="col-lg-4 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-support fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $result[0]; ?></div>
                                        <div>Classes!</div>
                                    </div>
                                </div>
                            </div>
                          <!--  <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a> -->
                        </div>
                    </div>
          
		  
		  <?php
		  
		  $res = countCategories();
		  $result = mysqli_fetch_array($res);
		  
		  ?>
		  
                    <div class="col-lg-4 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-tasks fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $result[0];?></div>
                                        <div>Categories!</div>
                                    </div>
                                </div>
                            </div>
                          <!--  <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>  -->
                        </div>
                    </div>
            
              
                </div>