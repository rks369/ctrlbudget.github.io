<?php
require("includes/db_connection.php");

if (isset($_SESSION['email'])) {
    header('location: home.php');
}

?>

<!DOCTYPE html>
<html>
<head>
	<?php
	include'includes/head.php'
	?>
</head>
<body class="background_image container-fluid">
	<!--Header Nav Bar-->
	<?php
	include 'includes/navbar.php'
	?>
	<div>
	<!--Banner Box-->
		<center>
			<div class="banner_content">
				<br>
				<h3>We Help You To Control Your Budget</h3>
				<br>
				<a href="login.php" class="btn btn-success btn-lg active">Start Today</a>
				<br>
				<br>
			</div>
		</center>
	</div>
	<!--Footer-->
	<?php
	include 'includes/footer.php'
	?>
</body>
</html>