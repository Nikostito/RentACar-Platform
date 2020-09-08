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
			$query = "DELETE FROM `employee` WHERE `SSN_emp` = $ID";

			if (!mysqli_query($mysql_connection, $query)) {
				$er = mysqli_error($mysql_connection);
				$error = "<div class='alert alert-danger alert-dismissable fade in'>
							<strong>$er<strong>.
						</div>";
			}
			else
			{
				mysqli_close($mysql_connection);

				header("Location:employees.php");

			}
		}else
		{
			$error = "<div class='alert alert-danger alert-dismissable fade in'>
	    					<strong>Δεν υπάρχει υπάλληλος με αυτό το ΑΜΚΑ<strong>.
					</div>";
		}
	}	

?>

<html>

<body>

<div class="container">
	<?php echo $error;?>
	<a href="employeeAdd.php" class="btn btn-primary">Add Employee</a>
		<div class="table-responsive">
			<table class="table table-striped">
				<thead>
				<tr>
					<th>SSN Number</th>
					<th>IRS Number</th>
					<th style="width:92px">Identity Number</th>
					<th>Last Name</th>
					<th>First Name</th>
					<th>Driver's License</th>
					<th>City</th>
					<th style="width:160px">Street</th>
					<th style="width:60px">Street Number</th>
					<th style="width:60px">Postal Code</th>
				</tr>
				</thead>
				
			<?php
				require 'connectToDB.php';

				$query = "SELECT * FROM employee";

				if($query_run = mysqli_query($mysql_connection,$query))
				{
					while($row = mysqli_fetch_assoc($query_run))
					{
						$ssn = $row["SSN_emp"];
						$irs = $row["IRS_emp"];
						$id = $row["IdentityNumber"];
						$lname = $row["LastName"];
						$fname = $row["FirstName"];
						$driverl = $row["DriverLicense"];
						$city = $row["City"];
						$street = $row["Street"];
						$streetn = $row["StreetNumber"];
						$postal = $row["PostalCode"];				

						echo '<tr><td>'.$ssn.'</td><td>'.$irs.'</td><td>'.$id.'</td><td>'.$lname.'</td><td>'.$fname.'</td><td>'.$driverl.'</td><td>'.$city.'</td><td>'.$street.'</td><td>'.$streetn.'</td><td>'.$postal.'</td>';
						echo '<td><div class="btn-group btn-group-justified"><a class="btn btn-default" href="employeeUpdate.php?id='.$ssn.'">Edit</a>';
						echo '<a class="btn btn-danger" href="employees.php?id='.$ssn.'">Delete</a></div></td></tr>';
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