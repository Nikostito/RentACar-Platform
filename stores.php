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
			$query = "DELETE FROM `stores` WHERE `StoreID` = $ID";

			if (!mysqli_query($mysql_connection, $query)) {
				$er = mysqli_error($mysql_connection);
				$error = "<div class='alert alert-danger alert-dismissable fade in'>
							<strong>$er<strong>.
						</div>";
			}
			else
			{				
				mysqli_close($mysql_connection);

				header("Location:stores.php");
			}
		}
		else
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
		<a href="storeAdd.php" class="btn btn-primary">Add Store</a>
		<div class="table-responsive">
			<table class="table table-striped">
				<thead>
				<tr>
					<th>Store ID</th>
					<th>City</th>
					<th>Street Name</th>
					<th>Street Number</th>
					<th>Postal Code</th>
				</tr>
				</thead>
				
			<?php
				require 'connectToDB.php';

				$query = "SELECT * FROM stores";

				if($query_run = mysqli_query($mysql_connection,$query))
				{
					while($row = mysqli_fetch_assoc($query_run))
					{
						$id = $row["StoreID"];
						$City = $row["City"];
						$Street = $row["Street"];
						$StreetNumber = $row["StreetNumber"];		
						$PostalCode = $row["PostalCode"];

						echo '<tr><td>'.$id.'</td><td>'.$City.'</td><td>'.$Street.'</td><td>'.$StreetNumber.'</td><td>'.$PostalCode.'</td>';
						echo '<td><div class="btn-group"><a class="btn btn-default" href="storeUpdate.php?id='.$id.'">Edit</a>';
						echo '<a class="btn btn-danger" href="stores.php?id='.$id.'">Delete</a></div></td></tr>';
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