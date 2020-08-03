<?php
require('includes/db_connection.php');

	$select_query="SELECT `id`, `user_id`, `intitial_budget`, `no_of_person`, `title`, `from`, `to` 
		FROM `plan` WHERE id='" . $_GET['plan_id'] . "'";
	$user=mysqli_query($db,$select_query) or die(mysqli_error($db));
	$user_data=mysqli_fetch_array($user);

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
	<!--View Plans-->
	
	<div class="row">
			<div class="col-md-8">
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
	  						<strong>Budget:</strong> 
	  					</div>
	  					<div style="float: right;">
	  						<strong >
	  							<?php 
	  								echo 
	  								"₹".$user_data['intitial_budget']; 
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
	    						$select_persons="SELECT * FROM expense , person 
									WHERE expense.person_id=person.id 
									AND plan_id='" . $_GET['plan_id'] . "'";
								$person=mysqli_query($db,$select_persons) or die(mysqli_error($db));
								$no_of_person=mysqli_num_rows($person);
								$amount_remaining=$user_data['intitial_budget']; 

								while ( $person_data=mysqli_fetch_array($person)) 
									{
										$amount_remaining-=$person_data['amount'] ;
									}

	    						if($amount_remaining>=0)
	    						{
	    							?>
	    								<p style="color: green;">
	    									<?php echo "₹".$amount_remaining;?>
	    								</p>
	    							<?php
	    						}
	    						else
	    							{
	    							?>
	    								<p style="color: red;">
	    									<?php echo "₹".$amount_remaining;?>
	    								</p>
	    							<?php
	    						}

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
	    			</div>
	  			</div>
			</div>
			<div class="col-md-4">
				<div class="jumbotron mt-2 " style="height: 95%;">
					<br>
					<a href="expensedistribution.php?plan_id=<?php echo $_GET['plan_id']?>" class="btn btn-dark btn-block btn-lg">Expense Distribution</a>
				</div>	
			</div>
	</div>
	

<div class="row">
		<!--Expenses-->
	<div class="col-md-8">
		<br>
		<div class="row">
			<?php
				$select_expense="SELECT * FROM expense , person 
				WHERE expense.person_id=person.id AND plan_id='" . $_GET['plan_id'] . "'";
				$expense=mysqli_query($db,$select_expense) or die(mysqli_error($db));
				$no_of_expense=mysqli_num_rows($expense);
			?>

			<?php
			while ($expense_data=mysqli_fetch_array($expense)) 
				{	
			?>
				<div class="col-md-6">
					<div class="">
						<div class="card text-black border-secondary m-2 ">
			  				<div class="card-header">
			  					<div class="row">
			  						<div class="col-12">
			  							<center>
			  								<h3>
			  									<?php
			  										echo $expense_data['title']; 
			  									?>
			  								</h3>
			  							</center>
			  						</div>
			  					</div>
			  				</div>
			  				<div class="card-body text-secondary">
			  					<div style="float: left;">
			  						<strong>Amount:</strong> 
			  					</div>
			  					<div style="float: right;">
			  						<strong >
			  							<?php 
			  								echo $expense_data['amount']; 
			  							?>
			  						</strong>
			  					</div>
			  						<br>
			    				<div style="float: left;">
			    					<strong>Paid By:</strong>
			    				</div>
			    				<div style="float: right;">
			    					<strong>
			    						<?php 
			    							echo $expense_data['name']; 
			    						?>
			    					</strong>
			  					</div>
			  					<br>
			  					<div style="float: left;">
			    					<strong>Paid On:</strong>
			    				</div>
			    				<div style="float: right;">
			    					<strong>
			    						<?php 
			    							echo $expense_data['date']; 
			    						?>
			    					</strong>
			  					</div>
			  					<br>
			  					<br>
			  					<div>
			  						<?php
			  							if ($expense_data['bill']==NULL) 
			  							{
			  						?>
			  							<p class="btn btn-dark btn-block">Bill Is Not Available</p>
			  						<?php 
			  						}
			  						else{
			  						?>
			  							<a href="<?php echo $expense_data['bill']?> " target="_blank"class="btn btn-dark btn-block">View Bill</a>
			  						<?php 
			  						}
			  						?>
			  					</div>
			    			</div>
			  			</div>
					</div>
				</div>
			
		<?php
		}
		?>
		</div>
		<br><br>
	</div>
		<!--Add Expense-->
	<div class="col-md-4">
		<br> 
		<?php
			$select_query="SELECT `id`, `plan_id`, `name`, `total_expense` FROM `person` WHERE plan_id='" . $user_data['id'] . "'";
			$person=mysqli_query($db,$select_query) or die(mysqli_error($db));
			$no_of_person=mysqli_num_rows($person);	
		?>
		<div class="card text-black border-secondary ">
			<div class="card-header">
  				<center>
  					<h3>Add New Expense</h3>
  				</center>
  			</div>

		<div class="card-body text-secondary">
    		<form action="addnewexpense.php" method="POST" enctype="multipart/form-data">
				<div class="form-group">
				    <label for="title">Title: </label>
				    <input type="title" class="form-control" id="title" 
				    placeholder="Title" name="title" required>
				</div>
				<div class="form-group">
				    <label for="date">Date:</label>
				    <input type="date" min="<?php echo $user_data['from'] ?>" max="<?php echo $user_data['to'] ?>"  class="form-control" id="date"  name="date" required>
				</div>
				<div class="form-group">
				    <label for="amount_spent">Amount Spent: </label>
				    <input type="number" class="form-control" id="amount_spent" placeholder="Amount Spent" name="amount_spent" min="1" required>
				</div>
				<div class="form-group">
					<select class="form-control" id="person_id" name="person_id" required >
						<option value="" >
							Choose Person
						</option>
							<?php
								while ($person_data=mysqli_fetch_array($person))
								{
							?>
						    	<option value="<?php echo $person_data['id'] ?>">
						    		<?php 
						    			echo $person_data['name'];
						    		 ?>
						    	</option>
					    	<?php
					    		}
					    	?>

				    </select>
				</div>
				<div class="form-group">
				    <label for="bill">Amount Spent: </label>
				    <input type="file" class="form-control" id="bill" placeholder="Amount Spent" name="bill">
				</div>
				<button type="submit" class="btn btn-dark btn-block" name="upload">ADD</button>
			</form>
    	</div>	
	</div>
	<br><br>
	<br><br>	
</div>

	<br><br>
	<br><br>
	<!--Footer-->
	<?php
	include 'includes/footer.php'
	?>
</body>
</html>