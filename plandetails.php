<?php
include 'includes/db_connection.php';

	$_SESSION['initial_budget'] =mysqli_real_escape_string($db,$_POST['initialbudget']);
	$_SESSION['no_of_people'] =mysqli_real_escape_string($db,$_POST['no_of_people']);

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
  				<div class="card-body text-secondary">
    				<form action="create_plan.php" method="POST">
						<div class="form-group">
				    		<label for="tilte">Title: </label>
				    		<input type="data" class="form-control" id="tilte" placeholder="Enter Title (Ex. Trip To Goa)" name="title" required>
				  		</div>
				  		<div class="row">
				  			<div class="col form-group">
				  				<label for="from">From: </label>
				  				<input type="date" min="<?php echo date("Y-m-d"); ?>" class="form-control" id="from" placeholder="dd/mm/yyyy" name="from" required>
				  			</div>
				  			<div class=" col form-group">
				  				<label for="from">To: </label>
				  				<input type="date" min="<?php echo date("Y-m-d"); ?>" class="form-control" id="to" placeholder="dd/mm/yyyy" name="to" required>
				  			</div>
				  		</div>
				  		<div class="row">
				  			 <div class="col form-group">
					    		<label for="initial_budget">Initial Budget:</label>
					    		<input type="initial_budget" class="form-control" id="initial_budget"  
					    		value="<?php echo $_POST['initialbudget'] ;?>" name="initial_budget"disabled>
				  			</div>
				  			 <div class="col form-group">
					    		<label for="no_of_people">No. of People</label>
					    		<input type="number" class="form-control" id="no_of_people"
					    		 value="<?php echo $_POST['no_of_people'] ;?>" name="no_of_people" disabled>
				  			</div>
				  		</div>
				  			<?php
					  			$n=1;
					  			while ($n <= $_POST['no_of_people'])
					  			{
				  			?>
					 		 <div class="form-group">
					    		<label for="person_name">Person 
					    			<?php 
					    				echo $n 
					    			?>
					    		</label>
					    		<input type="person_name" class="form-control" id="person_name<?php echo $n ?>" placeholder="Person <?php echo $n ?> Name" name="person_name<?php echo $n ?>" required>
					  		</div>
					  		<?php
					  			$n++;}
					  		?>
				  		<button type="submit" class="btn btn-dark btn-block">Submit</button>
					</form>
    			</div>
  			</div>
		</div>
	</div>

	<br><br>
	<br><br>
	
	<!--Footer-->
	<?php
	include 'includes/footer.php'
	?>
</body>
</html>