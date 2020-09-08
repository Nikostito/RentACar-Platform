<!DOCTYPE html>
<?php	
	
	require "menu.php";
	require "connectToDB.php";

	$ID = "";
	$error = "";
	
	if(isset($_GET['id']))
	{
		$ID = $_GET['id'];
		
		if(is_numeric($ID))
		{
			$query = "DELETE FROM `phone_store` WHERE `StoreID` = $ID";
			$query = "DELETE FROM `e-mail.store` WHERE `StoreID` = $ID";

			if (!mysqli_query($mysql_connection, $query)) {
				$er = mysqli_error($mysql_connection);
				$error = "<div class='alert alert-danger alert-dismissable fade in'>
							<strong>$er<strong>.
						</div>";
			}
			else
			{
				mysqli_close($mysql_connection);

				header("Location:contactstores
				.php");

			}
		}else
		{
			$error = "<div class='alert alert-danger alert-dismissable fade in'>
	    					<strong>Δεν υπάρχει κατάστημα με αυτό το ID<strong>.
					</div>";
		}
	}	
?>
<html>

<body>

<div class="container">
	<?php echo $error;?>
	<a href="contactstoreAdd.php" class="btn btn-primary">Add Contact Info</a>
		<div class="table-responsive">
			<table class="table table-striped">
				<thead>
				<tr>
					<th>Store ID</th>
					<th>Phone Number</th>
					<th>E-mail</th>
				</tr>
				</thead>
				
<?php
		require 'connectToDB.php';
		
	
		
		$query = "SELECT PhoneNumber, E-mail FROM phone_store, e-mail.store WHERE phone_store.StoreID = e-mail.store.StoreID";


				if($query_run = mysqli_query($mysql_connection,$query))
				{
					while($row = mysqli_fetch_assoc($query_run))
					{
						$phone = $row["PhoneNumber.phone_store"];
						$email = $row["E-mail.e-mail.store"];

						echo '<tr><td>'.$phone.'</td><td>'.$email.'</td>';
						echo '<td><div class="btn-group"><a class="btn btn-default" href="contactstoreUpdate.php?id='.$id.'">Edit</a>';
						echo '<a class="btn btn-danger" href="contactstores.php?id='.$id.'">Delete</a></div></td></tr>';
				}
				}
				else
				{
					echo 'Error';
				}

				mysqli_close($mysql_connection);
?>
			</table>

		</div>
	</div>
</body>

</html>