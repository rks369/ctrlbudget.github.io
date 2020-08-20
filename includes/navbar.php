<nav class=" navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
		
		<a class="navbar-brand" href="index.php">Ct₹l Budget</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

		<div class="collapse navbar-collapse justify-content-end" id="navbarToggler" >
			<ul class="navbar-nav ">
				<li class="nav-item">
					<a class="nav-link" href="Aboutus.php"><span class="fa fa-info-circle">	About Us</span></a>
				</li>
				<?php
 				if (isset($_SESSION['email'])) {
				?>
				<li class="nav-item">
					<a class="nav-link" href="change_password.php"><span class="fa fa-cog">	Change Password</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="logout.php"><span class="fa fa-sign-out">	Logout</span></a>
				</li>
				<?php
 				} else {
 				?>
				<li class="nav-item">
					<a class="nav-link" href="signup.php"><span class="fa fa-user">	Sign Up</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="login.php"><span class="fa fa-sign-in">	Login</span></a>
				</li>
				<?php
				}
				?>
			</ul>
		</div>
</nav>