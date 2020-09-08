<!DOCTYPE html>
<html>
<body>

<?php

	session_start();
	require "menu.php";
	require 'connectToDB.php';
	$id = $name = "";
	$error = "";
	
	if(isset($_GET['id']))
	{
		$id = $_GET["id"];
		$_SESSION["id"] = $id;
		
		$query = "SELECT * FROM cust_companies WHERE SSN_cust='".$id."'";

		if (!($query_run = mysqli_query($mysql_connection, $query))) {
			$er = mysqli_error($mysql_connection);
			$error = "<div class='alert alert-danger alert-dismissable fade in'>
					<strong>$er<strong>.
					</div>";
		}
		else
		{
						$row = mysqli_fetch_assoc($query_run);
						$name = $row["Name"];
		}
	}
	
	
	if(isset($_POST["submit"]))
	{

		//isset()
		$name = isset($_POST['name']) ? $_POST['name'] : "";
		//empty()
		$name = !empty($_POST['name']) ? $_POST['name'] : "";

		$id = $_SESSION["id"];
		
		if(is_numeric($id))
		{
			if(strlen($id) == 11)
			{
							$query = "UPDATE cust_companies SET Name='$name' WHERE SSN_cust='$id'";

							if (!mysqli_query($mysql_connection, $query)) {
								$er = mysqli_error($mysql_connection);
								$error = "<div class='alert alert-danger alert-dismissable fade in'>
				    					<strong>$er<strong>.
										</div>";
							}
							else
							{								
								mysqli_close($mysql_connection);

								header("Location:cust_companies.php");	
							}
			}
			else
						{
							$error = "<div class='alert alert-danger alert-dismissable fade in'>
    								<strong>Το ΑΜΚΑ πρέπει να είναι 11 νούμερα<strong>.
								</div>";
						}
				
		}
		else
				{
					$error = "<div class='alert alert-danger alert-dismissable fade in'>
						    	<strong>Το ΑΜΚΑ πρέπει να είναι αριθμός<strong>.
							</div>";
				}
	}
?>

<body>

<div class="container">
<form method="post" action = "cust_companiesUpdate.php">	
<?php echo $error;?>
<div class="form-group row">
        <label class="col-md-2 control-label">SSN Number</label>
        <div class="col-md-5">
            <input type="text" class="form-control" name="id" placeholder="SSN Number" value="<?php echo $id;?>" disabled />
</div>
 </div>
 <div class="form-group row">
        <label class="col-md-2 control-label">Company Name</label>
        <div class="col-md-5">
            <input type="text" class="form-control" name="name" placeholder="Company Name" value="<?php echo $name;?>" required />
</div>
	<br></br>

    <div class="form-group row">
        <div class="col-md-offset-2 col-md-8">
            <button type="submit" class="btn btn-success" name="submit">Submit</button>
        </div>
    </div>
</form>

</body>
</html>