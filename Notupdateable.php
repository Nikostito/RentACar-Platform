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
			<th>Customer SSN</th>
			<th>Customer IRS</th>
			<th>Driver's License</th>
			<th>First Registration</th>
			<th>Country</th>
			<th>Documents</th>
			<th>Customer Type</th>
			<th>Customer Name</th>
		</tr>
		</thead>

		<?php
			require 'connectToDB.php';

			$query = "SELECT * FROM customers_info";

			if($query_run = mysqli_query($mysql_connection,$query))
			{
				while($row = mysqli_fetch_assoc($query_run))
				{
					$ssn = $row["SSN_cust"];
					$irs = $row["IRS_cust"];
					$driverl = $row["DriverLicense"];
					$freg = $row["FirstRegistration"];
					$country = $row["Country"];
					$doc = $row["Documents"];
					$type = $row["cust_Type"];
					$name = $row["Name"];
					

					echo '<tr><td>'.$ssn.'</td><td>'.$irs.'</td><td>'.$driverl.'</td><td>'.$freg.'</td><td>'.$country.'</td><td>'.$doc.'</td><td>'.$type.'</td><td>'.$name.'</td></tr>';
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
</body>
</html>