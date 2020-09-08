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
			$query = "DELETE FROM `damages/malfunctions` WHERE `VehicleID` = $ID";

			if (!mysqli_query($mysql_connection, $query)) {
				$er = mysqli_error($mysql_connection);
				$error = "<div class='alert alert-danger alert-dismissable fade in'>
							<strong>$er<strong>.
						</div>";
			}
			else
			{
				mysqli_close($mysql_connection);

				header("Location:damages.php");

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
	<a href="damageAdd.php" class="btn btn-primary">Add Damage/Malfunction</a>
		<div class="table-responsive">
			<table class="table table-striped">
				<thead>
				<tr>
					<th>Vehicle ID</th>
					<th>Damages/Malfunctions</th>
				</tr>
				</thead>
				
<?php
		require 'connectToDB.php';

		$query = "SELECT * FROM `damages/malfunctions`";

				if($query_run = mysqli_query($mysql_connection,$query))
				{
					while($row = mysqli_fetch_assoc($query_run))
					{
						$id = $row["VehicleID"];
						$dmg = $row["Damages/Malfunctions"];				

						echo '<tr><td>'.$id.'</td><td>'.$dmg.'</td>';
						echo '<td><div class="btn-group"><a class="btn btn-default" href="damageUpdate.php?id='.$id.'">Edit</a>';
						echo '<a class="btn btn-danger" href="damages.php?id='.$id.'">Delete</a></div></td></tr>';
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