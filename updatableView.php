<!DOCTYPE html>

<?php	
	
	require "menu.php";
	require "connectToDB.php";

	$error = "";

	$ID = "";
	
	if(isset($_GET['id']))
	{
		$ID = $_GET['id'];
	
		if(is_numeric($ID))
		{				
			$query = "DELETE FROM `vehicle_service` WHERE VehicleID = '$ID'";

			if (!mysqli_query($mysql_connection, $query)) {
				$er = mysqli_error($mysql_connection);
				$error = "<div class='alert alert-danger alert-dismissable fade in'>
							<strong>$er<strong>.
						</div>";
			}
			else
			{
				mysqli_close($mysql_connection);

				header("Location:updatableView.php");
			}	
		}else
		{
			$error = "<div class='alert alert-danger alert-dismissable fade in'>
	    					<strong>Δεν υπάρχει αυτοκίνητο με αυτόν τον κωδικό<strong>.
					</div>";
		}
	}
?>

<html>

<body>

	<div class="container">
		<?php echo $error;?>
		<a href="viewAdd.php" class="btn btn-primary">Add Vehicle Service</a>
		<div class="table-responsive">		
			<table class="table table-striped">
				<thead>
				<tr>
					<th>Vehicle ID</th>
					<th>Store ID</th>
					<th>License Plate</th>
					<th>Kilometers</th>
					<th>Next Service</th>
					<th>Last Service</th>
					<th>Insurance Expiry</th>
				</tr>
				</thead>
				
<?php
		require 'connectToDB.php';

		$query = "SELECT * FROM `vehicle_service`";

				if($query_run = mysqli_query($mysql_connection,$query))
				{
					while($row = mysqli_fetch_assoc($query_run))
					{
						$id = $row["VehicleID"];
						$sid = $row["StoreID"];
						$lplate = $row["LicensePlate"];
						$km = $row["Kilometers"];
						$nexts = $row["NextService"];
						$lasts = $row["LastService"];
						$expiry = $row["InsuranceExp"];

						echo '<tr><td>'.$id.'</td><td>'.$sid.'</td><td>'.$lplate.'</td><td>'.$km.'</td><td>'.$nexts.'</td><td>'.$lasts.'</td><td>'.$expiry.'</td>';
						echo '<td><div class="btn-group"><a class="btn btn-default" href="viewUpdate.php?id='.$id.'">Edit</a>';
						echo '<a class="btn btn-default" href="updatableView.php?id='.$id.'">Delete</a></div></td></tr>';
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