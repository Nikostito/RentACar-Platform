<!DOCTYPE html>
<?php



	require "menu.php";
	require 'connectToDB.php';
	$id = $email = "";
	$error = "";

	if(isset($_POST["submit"]))
	{
		//isset()
		$id = isset($_POST['id']) ? $_POST['id'] : "";
		//empty()
		$id = !empty($_POST['id']) ? $_POST['id'] : "";

		//isset()
		$email = isset($_POST['email']) ? $_POST['email'] : "";
		//empty()
		$email = !empty($_POST['email']) ? $_POST['email'] : "";

		if(strlen($id)==11)
		{
		  if(is_numeric($id))
		  {
					$query = "INSERT INTO `e-mail.employee` VALUES ('$id','$email')";

							if (!mysqli_query($mysql_connection, $query)) {
								$er = mysqli_error($mysql_connection);
								$error = "<div class='alert alert-danger alert-dismissable fade in'>
				    					<strong>$er<strong>.
										</div>";
							}
							else
							{								
								mysqli_close($mysql_connection);
								header("Location:employeesemails.php");	
							}
			
				
		  }
		  else
				{
					$error = "<div class='alert alert-danger alert-dismissable fade in'>
						    	<strong>Το ΑΜΚΑ πρέπει να είναι αριθμός<strong>.
							</div>";
				}
		}else
		{
			$error = "<div class='alert alert-danger alert-dismissable fade in'>
						    	<strong>Το ΑΜΚΑ πρέπει να είναι 11 νούμερα<strong>.
							</div>";
		}
	}
?>
<html>
<body>

<div class="container">
<form method="post" action = "employeesemailAdd.php">	
<?php echo $error;?>
<div class="form-group row">
        <label class="col-md-2 control-label">SSN Number</label>
        <div class="col-md-5">
            <input type="text" class="form-control" name="id" placeholder="Employee SSN Number" value="<?php echo $id;?>" required />
</div>
 </div>
 <div class="form-group row">
        <label class="col-md-2 control-label">E-mail Address</label>
        <div class="col-md-5">
            <input type="email" class="form-control" name="email" placeholder="Phone Number" value="<?php echo $email;?>" required />
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