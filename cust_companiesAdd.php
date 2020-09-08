<!DOCTYPE html>
<html>
<body>

<?php

	require "menu.php";
	require 'connectToDB.php';
	$ssn = $name = "";
	$error = "";

	if(isset($_POST["submit"]))
	{
		//isset()
		$ssn = isset($_POST['ssn']) ? $_POST['ssn'] : "";
		//empty()
		$ssn = !empty($_POST['ssn']) ? $_POST['ssn'] : "";

		//isset()
		$name = isset($_POST['name']) ? $_POST['name'] : "";
		//empty()
		$name = !empty($_POST['name']) ? $_POST['name'] : "";

		
		if(is_numeric($ssn))
		{
			if(strlen($ssn) == 11)
			{
							$query = "INSERT INTO `cust_companies` VALUES ('$ssn','$name')";

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
<form method="post" action = "cust_companiesAdd.php">	
<?php echo $error;?>
<div class="form-group row">
        <label class="col-md-2 control-label">SSN Number</label>
        <div class="col-md-5">
            <input type="text" class="form-control" name="ssn" placeholder="SSN Number" value="<?php echo $ssn;?>" required />
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