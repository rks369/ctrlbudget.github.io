<?php
require('includes/db_connection.php');

$email=mysqli_real_escape_string($db,$_POST['email']);
$password=mysqli_real_escape_string($db,md5($_POST['password']));

	$select_query="SELECT id,email,password FROM users WHERE email='" . $email . "'";
	$user=mysqli_query($db,$select_query) or die(mysqli_error($db));
	$no_of_user=mysqli_num_rows($user);

if($no_of_user == 0)
				{	echo '<script>alert("Email Not Exists!!!")</script>';
					echo ("<script>location.href='login.php'</script>");
				}
				else
				{	$user_data=mysqli_fetch_array($user);
						if ($user_data['password']!=$password) 
							{	
								echo "<script>alert('Password Not Match !!!')</script>";
								echo ("<script>location.href='login.php'</script>");
							}
						else
							{
								$_SESSION['email'] = $user_data['email'];
								$_SESSION['user_id'] =$user_data['id'];
								echo "<script>alert('Login Successfully !!!')</script>";
								echo ("<script>location.href='home.php'</script>");		
							}
				}
?>