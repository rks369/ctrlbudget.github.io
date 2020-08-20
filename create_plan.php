<?php
require('includes/db_connection.php');

	$user_id=$_SESSION['user_id'] ;
	$initialbudget=$_SESSION['initial_budget'];
	unset($_SESSION['initial_budget']);
	$no_of_people=$_SESSION['no_of_people'];
	unset($_SESSION['no_of_people']);
	$title=mysqli_real_escape_string($db,$_POST['title']);
	$from=mysqli_real_escape_string($db,$_POST['from']);
	$to=mysqli_real_escape_string($db,$_POST['to']);

	$insert_query="INSERT INTO `plan` (`id`, `user_id`, `intitial_budget`, `no_of_person`, `title`, `from`, `to`) VALUES (NULL, '$user_id', '$initialbudget', '$no_of_people', '$title', '$from', '$to')";
	$plan_create=mysqli_query($db,$insert_query) or die(mysqli_error($db));
	$plan_id = mysqli_insert_id($db);

		$n=1;
		while ($n <= $no_of_people)
		{   
			$name=mysqli_real_escape_string($db,$_POST["person_name$n"]);
			$insert_query="INSERT INTO `person` (`id`, `plan_id`, `name`) 
				VALUES (NULL, '$plan_id', '$name')";
			$plan_create=mysqli_query($db,$insert_query) or die(mysqli_error($db));
			$n++;
		}

		echo "<script>alert('Plan Created Successfully !!!')</script>";
		echo ("<script>location.href='home.php'</script>");	
?> 