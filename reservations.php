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
			$query = "DELETE FROM `reservation` WHERE `ReservationID` = $ID";

			if (!mysqli_query($mysql_connection, $query)) {
				$er = mysqli_error($mysql_connection);
				$error = "<div class='alert alert-danger alert-dismissable fade in'>
							<strong>$er<strong>.
						</div>";
			}
			else
			{				
				mysqli_close($mysql_connection);

				header("Location:reservations.php");
			}
		}
		else
		{
			$error = "<div class='alert alert-danger alert-dismissable fade in'>
	    					<strong>Δεν υπάρχει κράτηση με αυτό το ID<strong>.
					</div>";
		}
	}	

?>

<html>

<body>

	<div class="container">
		<?php echo $error;?>	
		<a href="reservationAdd.php" class="btn btn-primary">Add Reservation</a>
		<div class="table-responsive">
			<table class="table table-striped">
				<thead>
				<tr>
					<th>Reservation ID</th>
					<th>Customer SSN</th>
					<th>Vehicle ID</th>
					<th style="width:90px">Start Date</th>
					<th style="width:90px">Finish date</th>
					<th>Date of Reservation</th>
					<th>Paid</th>
					<th>Start Location</th>
					<th>Finish Location</th>
					<th>License Plate</th>
				</tr>
				</thead>
				
			<?php
				require 'connectToDB.php';

				$query = "SELECT * FROM reservation";

				if($query_run = mysqli_query($mysql_connection,$query))
				{
					while($row = mysqli_fetch_assoc($query_run))
					{
						$id = $row["ReservationID"];
						$cssn = $row["SSN_cust"];
						$vid = $row["VehicleID"];
						$sdate = $row["StartDate"];
						$fdate = $row["FinishDate"];
						$rdate = $row["DateOfReserv"];
						$paid = $row["Paid"];
						$sloc = $row["StartLocation"];				
						$floc = $row["FinishLocation"];
						$lplate = $row["LicensePlate"];

						echo '<tr><td>'.$id.'</td><td>'.$cssn.'</td><td>'.$vid.'</td><td>'.$sdate.'</td><td>'.$fdate.'</td><td>'.$rdate.'</td><td>'.$paid.'</td><td>'.$sloc.'</td><td>'.$floc.'</td><td>'.$lplate.'</td>';
						echo '<td><div class="btn-group btn-group-justified"><a class="btn btn-default" href="reservationUpdate.php?id='.$id.'">Edit</a>';
						echo '<a class="btn btn-danger" href="reservations.php?id='.$id.'">Delete</a></dive></td></tr>';
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