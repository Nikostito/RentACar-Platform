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
			$query = "DELETE FROM `vehicle` WHERE `VehicleID` = $ID";

			if (!mysqli_query($mysql_connection, $query)) {
				$er = mysqli_error($mysql_connection);
				$error = "<div class='alert alert-danger alert-dismissable fade in'>
							<strong>$er<strong>.
						</div>";
			}
			else
			{
				mysqli_close($mysql_connection);

				header("Location:vehicles.php");

			}
		}else
		{
			$error = "<div class='alert alert-danger alert-dismissable fade in'>
	    					<strong>Δεν υπάρχει αυτοκίνητο με αυτό το ID<strong>.
					</div>";
		}
	}	

?>

<html>

<body>

<div class="container">
	<?php echo $error;?>
	<a href="vehicleAdd.php" class="btn btn-primary">Add Vehicle</a>
		<div class="table-responsive">
			<table class="table table-striped">
				<thead>
				<tr>
					<th>Vehicle ID</th>
					<th>Store ID</th>
					<th>License Plate</th>
					<th>Model</th>
					<th>Constructor</th>
					<th>Type</th>
					<th>Year</th>
					<th>Kilometers</th>
					<th>Cylinder Capacity</th>
					<th>Horse Power</th>
					<th>Fuel Type</th>
					<th>Next Service</th>
					<th>Last Service</th>
					<th>Insurance Expiry</th>
				</tr>
				</thead>
				
			<?php
				require 'connectToDB.php';

				$query = "SELECT * FROM vehicle";

				if($query_run = mysqli_query($mysql_connection,$query))
				{
					while($row = mysqli_fetch_assoc($query_run))
					{
						$id = $row["VehicleID"];
						$sid = $row["StoreID"];
						$lplate = $row["LicensePlate"];
						$model = $row["Model"];
						$con = $row["Constructor"];
						$type = $row["Type"];
						$year = $row["Year"];
						$km = $row["Kilometers"];
						$cc = $row["CylinderCapacity"];
						$hp = $row["HorsePower"];
						$ftype = $row["FuelType"];
						$nexts = $row["NextService"];
						$lasts = $row["LastService"];
						$expiry = $row["InsuranceExp"];
						

						echo '<tr><td>'.$id.'</td><td>'.$sid.'</td><td>'.$lplate.'</td><td>'.$model.'</td><td>'.$con.'</td><td>'.$type.'</td><td>'.$year.'</td><td>'.$km.'</td><td>'.$cc.'</td><td>'.$hp.'</td><td>'.$ftype.'</td><td>'.$nexts.'</td><td>'.$lasts.'</td><td>'.$expiry.'</td>';
						echo '<td><div class="btn-group btn-group-justified"><a class="btn btn-default" href="vehicleUpdate.php?id='.$id.'">Edit</a>';
						echo '<a class="btn btn-danger" href="vehicles.php?id='.$id.'">Delete</a></div></td></tr>';
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