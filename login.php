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
	<!--Login Form-->
	<div class="row">
		<div class="col-md-6 offset-md-3 ">
			<div class="card text-black border-secondary  ">
  				<div class="card-header">
  					<center>
  						<h3>Login</h3>
  					</center>
  				</div>
  				<div class="card-body text-secondary">
    				<form action="login_script.php" method="POST">
						<div class="form-group">
				    		<label for="emailid">Email: </label>
				    		<input type="email" class="form-control" id="email" placeholder="Email" name="email"
				    		title="Please Enter A VAlid Email ID" required>
				  		</div>
				 		 <div class="form-group">
				    		<label for="password">Password:</label>
				    		<input type="password" class="form-control" id="password" placeholder="Password"
				    		pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" name="password" required>
				  		</div>
				  		<button type="submit" class="btn btn-dark btn-block">Login</button>
					</form>
    			</div>
    			<div class="card-footer">
    				<center>No Account?<a href="signup.php">Create One!</a></center>
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