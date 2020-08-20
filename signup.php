<!DOCTYPE html>
<html>
<head>
	<?php
	include'includes/head.php'
	?>
</head>
<body class="container">
	<!--Header Nav Bar-->
	<?php
	include 'includes/navbar.php'
	?>
	<!--Sign Up Form-->
	<div class="row mb-5">
		<div class="col-md-6 offset-md-3 ">
			<div class="card text-black border-secondary  ">
  				<div class="card-header">
  					<center>
  						<h3>Sign Up</h3>
  					</center>
  				</div>
  				<div class="card-body text-secondary">
    				<form action="signup_script.php" method="POST">
    					<div class="form-group">
				    		<label for="Name">Name: </label>
				    		<input type="Name" class="form-control" id="name" placeholder="Name" name="name" required>
				  		</div>
						<div class="form-group">
				    		<label for="email">Email: </label>
				    		<input type="email" class="form-control" id="email" placeholder="Enter Valid Email" title="Please Enter A VAlid Email ID"   name="email" required>
				  		</div>
				 		<div class="form-group">
				    		<label for="password">Password:</label>
				    		<input type="password" class="form-control" id="password" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" name="password" required>
				  		</div>
				  		<div class="form-group">
				    		<label for="phoneno">Phone Number:</label>
				    		<input type="Phone" class="form-control" id="phoneno" placeholder="Enter Valid Phone Number (Ex:8448444853)"
				    		pattern="[0-9]{10}" title="Please Enter 10 Digit Phone Number" name="phoneno" required>
				  		</div>
				  		<button type="submit" class="btn btn-dark btn-block">Sign Up</button>
					</form>
    			</div>
		</div>
	</div>
	<!--Footer-->
	<?php
	include 'includes/footer.php'
	?>
</body>
</html>