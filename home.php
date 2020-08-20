<?php
require('includes/db_connection.php');


	$select_query="SELECT `id`, `user_id`, `intitial_budget`, `no_of_person`, `title`, `from`, `to`
				 FROM `plan` 
				 WHERE user_id='" . $_SESSION['user_id'] . "'";
	$user=mysqli_query($db,$select_query) or die(mysqli_error($db));
	$no_of_user=mysqli_num_rows($user);

?>
<!DOCTYPE html>
<html>
<head>
	<?php
	include'includes/head.php'
	?>
</head>
<body class="container" >
	<!--Header Nav Bar-->
	<?php
	include 'includes/navbar.php'
	?>

	<?php
		if ($no_of_user==0) 
		{
	?>
	<!--There Is Not Plans-->
	<dir >
		<div>
			<h1>You don't have any active plans</h1>
		</div>
		<br>
		<br>
		<center>
			<div class="col-md-3 jumbotron">
				<i class="material-icons" style="font-size: 18px;">add_circle</i>
				<a  style="font-size: 18px;" href="addnewplan.php">Create a New Plan</a>
			</div>
		</center>
		
	</dir>
	<?php
		}
		else 
		{
	?>
	<!--Plans-->
		<div>
			<h1>Your Plans</h1>
		</div>
		<br>
	<div class="row">
		<?php
			while ( $user_data=mysqli_fetch_array($user)) 
			{	
		?>
			<div class="col-md-4">
				<div class="">
					<div class="card text-black border-secondary m-2 ">
		  				<div class="card-header">
		  					<div class="row">
		  						<div class="col-8">
		  							<center>
		  								<h3>
		  									<?php
		  										echo $user_data['title']; 
		  									?>
		  								</h3>
		  							</center>
		  						</div>
		  						<div class="col-4"> 
		  							<h3><span class="fa fa-user"> 
		  								<?php 
		  								echo $user_data['no_of_person']; 
		  								?>
		  							</h3>
		  						</div>
		  					</div>
		  				</div>
		  				<div class="card-body text-secondary">
		  					<div style="float: left;">
		  						<strong>Budget:</strong> 
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
		    				<div style="float: left;">
		    					<strong>Date:</strong>
		    				</div>
		    				<div style="float: right;">
		    					<strong>
		    						<?php 
		    							echo $user_data['from']."/".$user_data['to']; 
		    						?>
		    					</strong>
		  					</div>
		  					<br>
		  					<br>
		  					<div>
		  						<a href="viewplan.php?plan_id=<?php echo $user_data['id']?>" 
		  							class="btn btn-dark btn-block">View Plan</a>
		  					</div>
		    			</div>
		  			</div>
				</div>
			</div>
		
		<?php
			}
		?>
	</div>
	<div class="fixed-bottom " style="padding-bottom: 75px;">
		<div style="float: right;" class="mr-2">
			<a href="addnewplan.php">
				<i class="material-icons" style="font-size:48px;color: black;">add_circle</i>
			</a>
		</div>
	</div>

	<?php
		}
	?>

	<br><br>
	<br><br>
	<!--Footer-->
	<?php
	include 'includes/footer.php'
	?>
</body>
</html>