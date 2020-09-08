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
			$query = "DELETE FROM `residents_abroad_docs` WHERE `SSN_cust` = $ID";

			if (!mysqli_query($mysql_connection, $query)) {
				$er = mysqli_error($mysql_connection);
				$error = "<div class='alert alert-danger alert-dismissable fade in'>
							<strong>$er<strong>.
						</div>";
			}
			else
			{
				mysqli_close($mysql_connection);

				header("Location:abroad.php");

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
	<a href="abroadAdd.php" class="btn btn-primary">Add Foreign Customer's Documents</a>
		<div class="table-responsive">
			<table class="table table-striped">
				<thead>
				<tr>
					<th>SSN Number</th>
					<th>Documents</th>
				</tr>
				</thead>
				
<?php
		require 'connectToDB.php';

		$query = "SELECT * FROM residents_abroad_docs";

				if($query_run = mysqli_query($mysql_connection,$query))
				{
					while($row = mysqli_fetch_assoc($query_run))
					{
						$ssn = $row["SSN_cust"];
						$doc = $row["Documents"];				

						echo '<tr><td>'.$ssn.'</td><td>'.$doc.'</td>';
						echo '<td><div class="btn-group"><a class="btn btn-default" href="abroadUpdate.php?id='.$ssn.'">Edit</a>';
						echo '<a class="btn btn-danger" href="abroad.php?id='.$ssn.'">Delete</a></div></td></tr>';
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