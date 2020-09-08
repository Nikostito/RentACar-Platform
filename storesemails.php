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

				header("Location:storesemails.php");

			}
		}else
		{
			$error = "<div class='alert alert-danger alert-dismissable fade in'>
	    					<strong>Δεν υπάρχει κατάστημα με αυτόν τον κωδικό<strong>.
					</div>";
		}
	}	
?>
<html>

<body>

<div class="container">
	<?php echo $error;?>
	<a href="storesemailAdd.php" class="btn btn-primary">Add Store Email</a>
		<div class="table-responsive">
			<table class="table table-striped">
				<thead>
				<tr>
					<th>Store ID</th>
					<th>E-mail Address</th>
				</tr>
				</thead>
				
<?php
		require 'connectToDB.php';

		$query = "SELECT * FROM `e-mail.store`";

				if($query_run = mysqli_query($mysql_connection,$query))
				{
					while($row = mysqli_fetch_assoc($query_run))
					{
						$id = $row["StoreID"];
						$email = $row["E-mail"];				

						echo '<tr><td>'.$id.'</td><td>'.$email.'</td>';
						echo '<td><div class="btn-group"><a class="btn btn-default" href="storesemailUpdate.php?id='.$id.'">Edit</a>';
						echo '<a class="btn btn-danger" href="storesemails.php?id='.$id.'">Delete</a></div></td></tr>';
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