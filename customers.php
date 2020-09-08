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
			$query = "DELETE FROM `customers` WHERE `SSN_cust` = $ID";

			if (!mysqli_query($mysql_connection, $query)) {
				$er = mysqli_error($mysql_connection);
				$error = "<div class='alert alert-danger alert-dismissable fade in'>
							<strong>$er<strong>.
						</div>";
			}
			else
			{
				mysqli_close($mysql_connection);

				header("Location:customers.php");

			}
		}else
		{
			$error = "<div class='alert alert-danger alert-dismissable fade in'>
	    					<strong>Δεν υπάρχει πελάτης με αυτό το ΑΜΚΑ<strong>.
					</div>";
		}
	}	

?>

<html>

<body>

<div class="container">
	<?php echo $error;?>
	<a href="customerAdd.php" class="btn btn-primary">Add Customer</a>
		<div class="table-responsive">
			<table class="table table-striped">
				<thead>
				<tr>
					<th>SSN Number</th>
					<th>IRS Number</th>
					<th>Last Name</th>
					<th>First Name</th>
					<th>Driver's License</th>
					<th>Identity Number</th>
					<th>First Registration</th>
					<th>Country</th>
					<th>City</th>
					<th>Street</th>
					<th>Street Number</th>
					<th>Postal Code</th>
					<th>Phone Number</th>
					<th>E-mail</th>
					<th style="width:100px">Customer Type</th>
					<th style="width:160px">Actions</th>
				</tr>
				</thead>
				
			<?php
				require 'connectToDB.php';

				$query = "SELECT * FROM customers";

				if($query_run = mysqli_query($mysql_connection,$query))
				{
					while($row = mysqli_fetch_assoc($query_run))
					{
						$ssn = $row["SSN_cust"];
						$irs = $row["IRS_cust"];
						$lname = $row["LastName"];
						$fname = $row["FirstName"];
						$driverl = $row["DriverLicense"];
						$id = $row["IdentityNumber"];
						$first = $row["FirstRegistration"];
						$country = $row["Country"];
						$city = $row["City"];
						$street = $row["Street"];
						$streetn = $row["StreetNumber"];
						$postal = $row["PostalCode"];
						$phone = $row["PhoneNumber"];
						$email = $row["E-mail"];
						$type = $row["cust_Type"];

						echo '<tr><td>'.$ssn.'</td><td>'.$irs.'</td><td>'.$lname.'</td><td>'.$fname.'</td><td>'.$driverl.'</td><td>'.$id.'</td><td>'.$first.'</td><td>'.$country.'</td><td>'.$city.'</td><td>'.$street.'</td><td>'.$streetn.'</td><td>'.$postal.'</td><td>'.$phone.'</td><td>'.$email.'</td><td>'.$type.'</td>';
						echo '<td><div class="btn-group btn-group-justified"><a class="btn btn-default btn-xs"href="customerUpdate.php?id='.$ssn.'">Edit</a>';
						echo '<a class="btn btn-danger btn-xs" href="customers.php?id='.$ssn.'">Delete</a></div></td></tr>';
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