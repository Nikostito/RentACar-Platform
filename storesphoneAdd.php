<!DOCTYPE html>
<?php



	require "menu.php";
	require 'connectToDB.php';
	$id = $phone = "";
	$error = "";

	if(isset($_POST["submit"]))
	{
		//isset()
		$id = isset($_POST['id']) ? $_POST['id'] : "";
		//empty()
		$id = !empty($_POST['id']) ? $_POST['id'] : "";

		//isset()
		$phone = isset($_POST['phone']) ? $_POST['phone'] : "";
		//empty()
		$phone = !empty($_POST['phone']) ? $_POST['phone'] : "";

		
		if(is_numeric($id))
		{
			if(is_numeric($phone))
			{
							$query = "INSERT INTO `phone_store` VALUES ('$id','$phone')";

							if (!mysqli_query($mysql_connection, $query)) {
								$er = mysqli_error($mysql_connection);
								$error = "<div class='alert alert-danger alert-dismissable fade in'>
				    					<strong>$er<strong>.
										</div>";
							}
							else
							{								
								mysqli_close($mysql_connection);
								header("Location:storesphones.php");	
							}
			}
			else
						{
							$error = "<div class='alert alert-danger alert-dismissable fade in'>
    								<strong>Το τηλέφωνο πρέπει να είναι αριθμός<strong>.
								</div>";
						}
				
		}
		else
				{
					$error = "<div class='alert alert-danger alert-dismissable fade in'>
						    	<strong>Ο κωδικός καταστήματος πρέπει να είναι αριθμός<strong>.
							</div>";
				}
	}
?>
<html>
<body>

<div class="container">
<form method="post" action = "storesphoneAdd.php">	
<?php echo $error;?>
<div class="form-group row">
        <label class="col-md-2 control-label">Store ID</label>
        <div class="col-md-5">
            <input type="text" class="form-control" name="id" placeholder="Store ID" value="<?php echo $id;?>" required />
</div>
 </div>
 <div class="form-group row">
        <label class="col-md-2 control-label">Phone Number</label>
        <div class="col-md-5">
            <input type="text" class="form-control" name="phone" placeholder="Phone Number" value="<?php echo $phone;?>" required />
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