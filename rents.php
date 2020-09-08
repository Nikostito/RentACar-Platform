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
			$query = "DELETE FROM `rents` WHERE `RentID` = $ID";

			if (!mysqli_query($mysql_connection, $query)) {
				$er = mysqli_error($mysql_connection);
				$error = "<div class='alert alert-danger alert-dismissable fade in'>
							<strong>$er<strong>.
						</div>";
			}
			else
			{				
				mysqli_close($mysql_connection);

				header("Location:rents.php");
			}
		}
		else
		{
			$error = "<div class='alert alert-danger alert-dismissable fade in'>
	    					<strong>Δεν υπάρχει ενοικίαση με αυτό το ID<strong>.
					</div>";
		}
	}	

?>

<html>

<body>

	<div class="container">
		<?php echo $error;?>	
		<a href="rentAdd.php" class="btn btn-primary">Add Rent</a>
		<div class="table-responsive">
			<table class="table table-striped">
				<thead>
				<tr>
					<th>Rent ID</th>
					<th>Employee SSN</th>
					<th>Customer SSN</th>
					<th>Vehicle ID</th>
					<th style="width:90px">Start Date</th>
					<th style="width:90px">Finish date</th>
					<th>Start Location</th>
					<th>Finish Location</th>
					<th>Handing Employee
					<th>Receiving Employee</th>
					<th style="width:90px">Return State</th>
				</tr>
				</thead>
				
			<?php
				require 'connectToDB.php';

				$query = "SELECT * FROM rents";

				if($query_run = mysqli_query($mysql_connection,$query))
				{
					while($row = mysqli_fetch_assoc($query_run))
					{
						$id = $row["RentID"];
						$essn = $row["SSN_emp"];
						$cssn = $row["SSN_cust"];
						$vid = $row["VehicleID"];
						$sdate = $row["StartDate"];
						$fdate = $row["FinishDate"];
						$sloc = $row["StartLocation"];
						$floc = $row["FinishLocation"];
						$ehand = $row["Employee_Hand"];				
						$erec = $row["Employee_Receive"];
						$rstate = $row["ReturnState"];

						echo '<tr><td>'.$id.'</td><td>'.$essn.'</td><td>'.$cssn.'</td><td>'.$vid.'</td><td>'.$sdate.'</td><td>'.$fdate.'</td><td>'.$sloc.'</td><td>'.$floc.'</td><td>'.$ehand.'</td><td>'.$erec.'</td><td>'.$rstate.'</td>';
						echo '<td><div class="btn-group btn-group-justified"><a class="btn btn-default" href="rentUpdate.php?id='.$id.'">Edit</a>';
						echo '<a class="btn btn-danger" href="rents.php?id='.$id.'">Delete</a></dive></td></tr>';
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