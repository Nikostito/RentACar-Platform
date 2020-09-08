<!DOCTYPE html>
<?php


	session_start();
	require "menu.php";
	require 'connectToDB.php';
	$id = $phone = "";
	$error = "";

	if(isset($_GET['id']))
	{
		$id = $_GET["id"];
		$_SESSION["id"] = $id;
		
		$query = "SELECT * FROM `phone_store` WHERE StoreID='".$id."'";

		if (!($query_run = mysqli_query($mysql_connection, $query))) {
			$er = mysqli_error($mysql_connection);
			$error = "<div class='alert alert-danger alert-dismissable fade in'>
					<strong>$er<strong>.
					</div>";
		}
		else
		{
						$row = mysqli_fetch_assoc($query_run);
						$phone = $row["PhoneNumber"];	
		}
	}
	
	
	if(isset($_POST["submit"]))
	{
		//isset()
		$phone = isset($_POST['phone']) ? $_POST['phone'] : "";
		//empty()
		$phone = !empty($_POST['phone']) ? $_POST['phone'] : "";

		$id = $_SESSION["id"];
		
		if(is_numeric($id))
		{
			if(is_numeric($phone))
			{
							$query = "UPDATE `phone_store` SET PhoneNumber='$phone' WHERE StoreID='$id'";

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
<form method="post" action = "storesphoneUpdate.php">	
<?php echo $error;?>
<div class="form-group row">
        <label class="col-md-2 control-label">Store ID</label>
        <div class="col-md-5">
            <input type="text" class="form-control" name="id" placeholder="Store ID" value="<?php echo $id;?>" disabled />
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