<?php
include 'includes/db_connection.php'
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
	<div class="row">
		<div class="col-md-6 offset-md-3 ">
			<div class="card text-black border-secondary  ">
  				<div class="card-header">
  					<center>
  						<h3>Create New Plan</h3>
  					</center>
  				</div>
  				<div class="card-body text-secondary">
    				<form action="plandetails.php" method="POST">
						<div class="form-group">
				    		<label for="initialbudget">Initial Budget: </label>
				    		<input type="number" class="form-control" id="initialbudget" placeholder="Initial Budget (Ex:4000)" min="50" name="initialbudget" required>
				  		</div>
				 		 <div class="form-group">
				    		<label for="no_of_people">How Many People you want to add in your group?</label>
				    		<input type="number" class="form-control" id="no_of_people" placeholder="No. Of People" min=1 name="no_of_people" required>
				  		</div>
				  		<button type="submit" class="btn btn-dark btn-block">Next</button>
					</form>
    			</div>
  			</div>
		</div>
	</div>
	<!--Footer-->
	<?php
	include 'includes/footer.php'
	?>
</body>
</html>