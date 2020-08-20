<?php
require('includes/db_connection.php');

	$select_plan="SELECT `id`, `user_id`, `intitial_budget`, `no_of_person`, `title`, `from`, `to` FROM `plan` WHERE id='" . $_GET['plan_id'] . "'";
	$user=mysqli_query($db,$select_plan) or die(mysqli_error($db));
	$no_of_user=mysqli_num_rows($user);

?>
<!DOCTYPE html>
<html>
<head>
	<?php
	include'includes/head.php'
	?>
</head>
<body>
	<!--Header Nav Bar-->
	<?php
	include 'includes/navbar.php'
	?>
	<!--Expense Distribution-->
	<div class="col-md-6 offset-md-3">

				<div class="card text-black border-secondary m-2 ">
	  				<div class="card-header">
	  					<div class="row">
	  						<div class="col-8">
	  							<center>
	  								<h3>
	  									<?php 
	  										$user_data=mysqli_fetch_array($user); 
	  										echo $user_data['title']; 
	  									?>
	  								</h3>
	  							</center>
	  						</div>
	  						<div class="col-4"> 
	  							<div style="float: right;">
	  							<h3>
	  								<span class="fa fa-user"> 
	  								<?php 
	  									echo $user_data['no_of_person']; 
	  								?>
	  							</h3>
	  							</div>
	  						</div>
	  					</div>
	  				</div>
	  				<div class="card-body text-secondary">
	  					<div style="float: left;">
	  						<strong>Initial Budget:</strong> 
	  					</div>
	  					<div style="float: right;">
	  						<strong >
	  							<?php 
	  								echo "₹".$user_data['intitial_budget']; 
	  								?>
	  						</strong>
	  					</div>
	  						<br>
	  						<br>
	  					<?php
		  					$select_persons="SELECT `id`, `plan_id`, `name`, `total_expense` 
		  							FROM `person` WHERE plan_id='" . $user_data['id']. "'";
							$person=mysqli_query($db,$select_persons) or die(mysqli_error($db));
							$no_of_person=mysqli_num_rows($person);
							$total_amount_spent=0;

							while ( $person_data=mysqli_fetch_array($person)) 
							{
	  					?>
		  					<div style="float: left;">
		    					<strong>
		    						<?php echo $person_data['name']; 
		    						$total_amount_spent+=$person_data['total_expense'] ;
		    						?>
		    					</strong>
		    				</div>
		    				<div style="float: right;">
		    					<strong>
		    						<?php 
		    							echo "₹".$person_data['total_expense'];
		    						?>
		    					</strong>
		  					</div>
		  					<br>
		  					<br>
	  					<?php
	  						}
	  					?>
	  					<div style="float: left;">
	    					<strong>Total Amount Spent</strong>
	    				</div>
	    				<div style="float: right;">
	    					<strong>
	    						<?php 
	    							echo "₹".$total_amount_spent;
	    						?>
	    					</strong>
	  					</div>
	  					<br>
	  					<br>
	    				<div style="float: left;">
	    					<strong>Reamining Ammount</strong>
	    				</div>
	    				<div style="float: right;">
	    					<strong>
	    						<?php 
	    						$rem_amount=$user_data['intitial_budget']-$total_amount_spent;
	    						if($rem_amount>=0)
	    						{
	    							?>
	    								<p style="color: green;">
	    									<?php 
	    										echo "₹".$rem_amount;
	    									?>
	    								</p>
	    							<?php
	    						}
	    						else
	    						{
	    							?>
	    								<p style="color: red;">
	    									<?php 
	    										echo "₹".$rem_amount;
	    									?>
	    								</p>
	    							<?php
	    						}

	    						?>
	    					</strong>
	  					</div>
	  					<br>
	  					<br>
	  					<div style="float: left;">
	    					<strong>Individual Shares:</strong>
	    				</div>
	    				<div style="float: right;">
	    					<strong>
	    						<?php 
	    							$Individual_share=$total_amount_spent/$no_of_person; 
	    							echo "₹".$Individual_share;
	    						?>
	    					</strong>
	  					</div>
	  					<br>
	  					<br>
	  					<?php
		  					$select_persons="SELECT `id`, `plan_id`, `name`, `total_expense` 
		  							FROM `person` WHERE plan_id='" . $user_data['id']. "'";
							$person=mysqli_query($db,$select_persons) or die(mysqli_error($db));
							
							while ( $person_data=mysqli_fetch_array($person)) 
							{
	  					?>
		  					<div style="float: left;">
		    					<strong>
		    						<?php 
		    							echo $person_data['name']; 
		    						?>
		    					</strong>
		    				</div>
		    				<div style="float: right;">
	    						<?php 
		    						$shares=$person_data['total_expense']-$Individual_share;
		    						if($shares>0)
		    						{
		    							?>
			    							<p style="color: green;">
			    								<?php 
			    									echo "Gtes Back ₹".$shares;
			    								?>
			    							</p>
		    							<?php
		    						}
		    						elseif ($shares<0) 
		    						{
		    							?>
			    							<p style="color: red;">
			    								<?php 
			    									echo "Owes ₹".$shares;
			    								?>
			    							</p>
		    							<?php
		    						}
		    						else
		    						{
		    							?>
		    								<strong>
		    									<?php 
		    										echo $shares;
		    									?>
		    								</strong>
		    							<?php
		    						}	

	    						?>
		  					</div>
		  					<br>
		  					<br>
	  					<?php
	  					}
	  					?>
	  					<div>
	  						<a href="viewplan.php?plan_id=<?php echo $_GET['plan_id']?>" class="btn btn-dark btn-block"><i class="fa fa-arrow-left"></i>  Go Back</a>
	  					</div>
	    			</div>
	  			</div>
			</div>
			<br>
	  		<br>
	  		<br>
	  		<br>
	<!--Footer-->
	<?php
	include 'includes/footer.php'
	?>
</body>
</html>