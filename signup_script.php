<?php
require('includes/db_connection.php');

$email=mysqli_real_escape_string($db,$_POST['email']);
$name=mysqli_real_escape_string($db,$_POST['name']);
$password=mysqli_real_escape_string($db,md5($_POST['password']));
$phoneno=mysqli_real_escape_string($db,$_POST['phoneno']);

$regex_email = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";
$regex_phoneno = "/^[789][0-9]{9}$/";

	$check_user = "SELECT * FROM users WHERE email='$email'";
  	$users_in_db = mysqli_query($db, $check_user)or die($mysqli_error($db));
  	$user_exixts = mysqli_num_rows($users_in_db);

if ($user_exixts != 0) 
				{
				    echo "<script >alert('Email Already Exists')</script>";
				     echo ("<script>location.href='signup.php'</script>");
			  	} else if (!preg_match($regex_email, $email)) 
			  	{
				    echo "<script>alert('Enter A valid Email')</script>";
				     echo ("<script>location.href='signup.php'</script>");
			  	} else if (!preg_match($regex_phoneno, $phoneno))
			   	{
				    echo "<script>alert('Enter A Valid Phone Number')</script>";
				     echo ("<script>location.href='signup.php'</script>");
			 	}
			    else 
			    { 
			    	$user_reg_query="INSERT INTO `users` (`id`, `name`, `email`, `password`, `phoneno`, `reg_time`) 
					VALUES (NULL, '$name', '$email', '$password', '$phoneno', current_timestamp())";
				$user_reg_submit=mysqli_query($db,$user_reg_query) or die(mysqli_error($db));
				$user_id = mysqli_insert_id($db);
	            $_SESSION['email'] = $email;
	            $_SESSION['user_id'] = $user_id;
	            echo "<script>alert('Sign Up Successfully !!!')</script>";
				echo ("<script>location.href='home.php'</script>");
				}
?>