<?php
require('includes/db_connection.php');

$old_password=mysqli_real_escape_string($db,md5($_POST['old_password']));
$new_password=mysqli_real_escape_string($db,md5($_POST['new_password']));
$confirm_password=mysqli_real_escape_string($db,md5($_POST['confirm_password']));

	$select_query="SELECT password FROM users WHERE email='" . $_SESSION['email'] . "'";
	$user=mysqli_query($db,$select_query) or die(mysqli_error($db));
	$user_data=mysqli_fetch_array($user);



if ($old_password!=$user_data['password'])
			{
				echo "<script>alert('Old Password Not Match!!')</script>";
				echo ("<script>location.href='change_password.php'</script>");
			}
			elseif ($old_password==md5($user_data['password']))
			{	
				echo "<script>alert('New Password Is Same As Old Password!!')</script>";
				echo ("<script>location.href='change_password.php'</script>");
			}
			elseif ($new_password!=$confirm_password) 
			{	
				echo "<script>alert('New Password And Re-Entered Password Not Match!!')</script>";
				echo ("<script>location.href='change_password.php'</script>");
			}
			else
			{
				$update_query = "UPDATE users SET password ='".$new_password."'  
					WHERE email='".$_SESSION['email']."'";
				$updated=mysqli_query($db,$update_query) or die(mysqli_error($db));
				echo "<script>alert('Password Changed Successfully!!!')</script>";
				echo ("<script>location.href='logout.php'</script>");
			}

?>																											