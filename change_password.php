<?php
require('includes/db_connection.php');
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
	<!--Change Passward Form-->
	<div class="row">
		<div class="col-md-6 offset-md-3 ">
			<div class="card text-black border-secondary  ">
  				<div class="card-header">
  					<center>
  						<h3>Change Password</h3>
  					</center>
  				</div>
  				<div class="card-body text-secondary">
    				<form action="change_password_script.php" method="POST">
						<div class="form-group">
				    		<label for="old password">Old Password: </label>
				    		<input type="password" class="form-control" id="old_password" placeholder="Old Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" name="old_password" required>
				  		</div>
				 		 <div class="form-group">
				    		<label for="new password">New Password:</label>
				    		<input type="password" class="form-control" id="new_password" placeholder="New Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" name="new_password" required>
				  		</div>
				  		<div class="form-group">
				    		<label for="confirm password">Confirm Password:</label>
				    		<input type="password" class="form-control" id="confirm_password" placeholder="Re-type Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" name="confirm_password" required>
				  		</div>
				  		<button type="submit" class="btn btn-dark btn-block">Change</button>
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