<!DOCTYPE html>
<?php



	require "menu.php";
	require 'connectToDB.php';
	$ssn = $doc = "";
	$error = "";

	if(isset($_POST["submit"]))
	{
		//isset()
		$ssn = isset($_POST['ssn']) ? $_POST['ssn'] : "";
		//empty()
		$ssn = !empty($_POST['ssn']) ? $_POST['ssn'] : "";

		//isset()
		$doc = isset($_POST['doc']) ? $_POST['doc'] : "";
		//empty()
		$doc = !empty($_POST['doc']) ? $_POST['doc'] : "";

		
		if(is_numeric($ssn))
		{
			if(strlen($ssn) == 11)
			{
							$query = "INSERT INTO `residents_abroad_docs` VALUES ('$ssn','$doc')";

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
<html>
<body>

<div class="container">
<form method="post" action = "abroadAdd.php">	
<?php echo $error;?>
<div class="form-group row">
        <label class="col-md-2 control-label">SSN Number</label>
        <div class="col-md-5">
            <input type="text" class="form-control" name="ssn" placeholder="SSN Number" value="<?php echo $ssn;?>" required />
</div>
 </div>
 <div class="form-group row">
        <label class="col-md-2 control-label">Documents</label>
        <div class="col-md-5">
            <input type="text" class="form-control" name="doc" placeholder="Customer's Documents" value="<?php echo $doc;?>" required />
</div>
</div>
	<br></br>

    <div class="form-group row">
        <div class="col-md-offset-2 col-md-7">
            <button type="submit" class="btn btn-success" name="submit">Submit</button>
        </div>
    </div>
</form>

</body>
</html>