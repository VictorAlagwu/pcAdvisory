<?php

$title = 'Other Source';

include 'views/layout/header.php';
?>
<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<?php
					if (isset($_GET['search'])) {
						 $search = $_GET['search'];
						// die();
                 				 /* Search Entry */
               
              

                 				 /* Query */
			                
			                
                              ?>
                        	        <div class="panel-group results">
                        			    <div class="panel panel-success">
	                            			<div class="panel-heading">
	                            			<p>Sorry, it seems like we don't have any solution for your PC problem</p>
	                             				<p>Check Other Online Resourses</p> 
	                            			</div>
		                            		<div class="panel-body text-center">
		                             			<p><a href="https://www.google.com.ng/search?q=<?php echo $search;?>" class="btn btn-info "> Google</a></p>
		                                    	<p><a href="index.php" class="btn btn-info "> FixIT</a></p>
	                            			</div>
                          				</div>
                     			    </div>
                     			 <?php
              }

			?>
		</div>
		
	</div>
</div>


<?php
include 'views/layout/footer.php'
?>