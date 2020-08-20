<?php
	require('includes/db_connection.php');


		function GetImageExtension($imagetype)
		{
			if(empty($imagetype)) return false;
			switch($imagetype)
			{
				case 'image/bmp': return '.bmp';
				case 'image/gif': return '.gif';
				case 'image/jpeg': return '.jpg';
				case 'image/png': return '.png';
				default: return false;
			}
		}
			if (!empty($_FILES["bill"]["name"])) 
			{
				$file_name=$_FILES["bill"]["name"];
				$temp_name=$_FILES["bill"]["tmp_name"];
				$imgtype=$_FILES["bill"]["type"];
				$ext= GetImageExtension($imgtype);
				$imagename=date("d-m-Y")."-".time().$ext;
				$target_path = mysqli_real_escape_string($db,"bill/".$imagename);
				
				if(move_uploaded_file($temp_name, $target_path))
					{
					$person_id=mysqli_real_escape_string($db,$_POST['person_id']);
					$title=mysqli_real_escape_string($db,$_POST['title']);
					$date=mysqli_real_escape_string($db,$_POST['date']);
					$amount=mysqli_real_escape_string($db,$_POST['amount_spent']);

					$insert_query="INSERT INTO `expense`(`id`, `person_id`, `title`, `date`, `amount`,bill) 
									VALUES (NULL,'$person_id','$title','$date','$amount','$target_path')";
					$expense=mysqli_query($db,$insert_query) or die(mysqli_error($db));
					$plan_id = mysqli_insert_id($db);

					$select_amount="SELECT  * FROM person, plan 
					WHERE person.plan_id=plan.id AND person.id='" . $person_id. "'";

					$amount_query=mysqli_query($db,$select_amount) or die(mysqli_error($db));
					$amount_data=mysqli_fetch_array($amount_query);

					$id=$amount_data['id'];
					$total_amount=$amount_data['total_expense'];
					$total_amount=$total_amount+$amount;

					$update_query="UPDATE `person` SET total_expense=".$total_amount." WHERE  id=". $person_id. "";
					$update=mysqli_query($db,$update_query) or die(mysqli_error($db));

						echo '<script>alert("Expense Added Sucessfully")</script>';
						echo ("<script>location.href='viewplan.php?plan_id=".$id."'</script>");
					}
		}
		else
		{
					$person_id=mysqli_real_escape_string($db,$_POST['person_id']);
					$title=mysqli_real_escape_string($db,$_POST['title']);
					$date=mysqli_real_escape_string($db,$_POST['date']);
					$amount=mysqli_real_escape_string($db,$_POST['amount_spent']);

					$insert_query="INSERT INTO `expense`(`id`, `person_id`, `title`, `date`, `amount`,bill) 
									VALUES (NULL,'$person_id','$title','$date','$amount',NULL)";
					$expense=mysqli_query($db,$insert_query) or die(mysqli_error($db));
					$plan_id = mysqli_insert_id($db);

					$select_amount="SELECT  * FROM person, plan 
					WHERE person.plan_id=plan.id AND person.id='" . $person_id. "'";

					$amount_query=mysqli_query($db,$select_amount) or die(mysqli_error($db));
					$amount_data=mysqli_fetch_array($amount_query);

					$id=$amount_data['id'];
					$total_amount=$amount_data['total_expense'];
					$total_amount=$total_amount+$amount;

					$update_query="UPDATE `person` SET total_expense=".$total_amount." WHERE  id=". $person_id. "";
					$update=mysqli_query($db,$update_query) or die(mysqli_error($db));

						echo '<script>alert("Expense Added Sucessfully")</script>';
						echo ("<script>location.href='viewplan.php?plan_id=".$id."'</script>");	
		}
?>