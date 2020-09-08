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
			$query = "DELETE FROM `works` WHERE `SSN_emp` = $ID";

			if (!mysqli_query($mysql_connection, $query)) {
				$er = mysqli_error($mysql_connection);
				$error = "<div class='alert alert-danger alert-dismissable fade in'>
							<strong>$er<strong>.
						</div>";
			}
			else
			{
				mysqli_close($mysql_connection);

				header("Location:works.php");

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
	<a href="workAdd.php" class="btn btn-primary">Add Employee Info</a>
		<div class="table-responsive">
			<table class="table table-striped">
				<thead>
				<tr>
					<th>SSN Number</th>
					<th>Store ID</th>
					<th>Start Date</th>
					<th>End of Collaboration</th>
					<th>Employee Position</th>
					<th>Slary</th>
				</tr>
				</thead>
				
			<?php
				require 'connectToDB.php';

				$query = "SELECT * FROM works";

				if($query_run = mysqli_query($mysql_connection,$query))
				{
					while($row = mysqli_fetch_assoc($query_run))
					{
						$ssn = $row["SSN_emp"];
						$sid = $row["StoreID"];
						$sdate = $row["StartDate"];
						$fdate = $row["FinishDate"];
						$pos = $row["Position"];
						$salary = $row["Salary"];
						
						echo '<tr><td>'.$ssn.'</td><td>'.$sid.'</td><td>'.$sdate.'</td><td>'.$fdate.'</td><td>'.$pos.'</td><td>'.$salary.'</td>';
						echo '<td><div class="btn-group"><a class="btn btn-default btn-md" href="workUpdate.php?id='.$ssn.'">Edit</a>';
						echo '<a class="btn btn-danger btn-md" href="works.php?id='.$ssn.'">Delete</a></div></td></tr>';
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