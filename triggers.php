<!DOCTYPE html>

<?php  
	require "menu.php";
?>

<html>

<body>

<div class="container">
<div class="table-responsive">
	<table class="table table-striped">
		<thead>
		<tr>
			<th>Rents</th>
			<th>Reservations</th>
			<th>Customers</th>
			<th>Employees</th>
			<th>Stores</th>
			<th>Vehicles</th>
		</tr>
		</thead>

<?php
				require 'connectToDB.php';

				$query = "SELECT * FROM counts";

				if($query_run = mysqli_query($mysql_connection,$query))
				{
					if($row = mysqli_fetch_assoc($query_run))
					{
						$rents = $row["Rents"];
						$res = $row["Reservations"];
						$cus = $row["Customers"];
						$emp = $row["Employees"];
						$stores = $row["Stores"];
						$veh = $row["Vehicles"];
						

						echo '<tr><td>'.$rents.'</td><td>'.$res.'</td><td>'.$cus.'</td><td>'.$emp.'</td><td>'.$stores.'</td><td>'.$veh.'</td></tr>';
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