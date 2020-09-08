<!DOCTYPE html>

<html>
<?php

	require "menu.php";
	require 'connectToDB.php';

	$id = $sid = $lplate = $km = $nexts = $lasts = $expiry = "";

	$error = "";

	if(isset($_POST["submit"]))
	{
		//isset()
		$id = isset($_POST['id']) ? $_POST['id'] : "";
		//empty()
		$id = !empty($_POST['id']) ? $_POST['id'] : "";
		
		//isset()
		$sid = isset($_POST['sid']) ? $_POST['sid'] : "";
		//empty()
		$sid = !empty($_POST['sid']) ? $_POST['sid'] : "";
		
		//isset()
		$lplate = isset($_POST['lplate']) ? $_POST['lplate'] : "";
		//empty()
		$lplate = !empty($_POST['lplate']) ? $_POST['lplate'] : "";
		
		//isset()
		$km = isset($_POST['km']) ? $_POST['km'] : "";
		//empty()
		$km = !empty($_POST['km']) ? $_POST['km'] : "";
		
		//isset()
		$nexts = isset($_POST['nexts']) ? $_POST['nexts'] : "";
		//empty()
		$nexts = !empty($_POST['nexts']) ? $_POST['nexts'] : "";
		
		
		//isset()
		$lasts = isset($_POST['lasts']) ? $_POST['lasts'] : "";
		//empty()
		$lasts = !empty($_POST['lasts']) ? $_POST['lasts'] : "";
		
		//isset()
		$expiry = isset($_POST['expiry']) ? $_POST['expiry'] : "";
		//empty()
		$expiry = !empty($_POST['expiry']) ? $_POST['expiry'] : "";
		
		

		if(is_numeric($id))
		{
			if(is_numeric($sid))
			{
				if(is_numeric($km))
						{
							$query = "INSERT INTO `vehicle_service` VALUES ('$id','$sid','$lplate','$km','$nexts','$lasts','$expiry')";
										if (!mysqli_query($mysql_connection, $query))
										{
										$er = mysqli_error($mysql_connection);
										$error = "<div class='alert alert-danger alert-dismissable fade in'>
										<strong>$er<strong>.
										</div>";
										
										}
								
										else
										{						
											mysqli_close($mysql_connection);

												header("Location:updatableView.php");	
										}
						}else
							{
							$error = "<div class='alert alert-danger alert-dismissable fade in'>
    						<strong>Τα χιλιόμετρα πρέπει να είναι αριθμός<strong>.
							</div>";
							}
			}else
				{
				$error = "<div class='alert alert-danger alert-dismissable fade in'>
    						<strong>Ο κωδικός καταστήματος πρέπει να είναι αριθμός<strong>.
						</div>";
				}
		}else
			{
			$error = "<div class='alert alert-danger alert-dismissable fade in'>
    						<strong>Ο κωδικός αυτοκινήτου πρέπει να είναι αριθμος<strong>.
						</div>";
			}
	}
?>

<body>

<div class="container">
<form method="post" action = "viewAdd.php">	
<?php echo $error;?>
<div class="form-group row">
        <label class="col-md-2 control-label">Vehicle ID</label>
        <div class="col-md-5">
            <input type="text" class="form-control" name="id" placeholder="Vehicle ID" value="<?php echo $id;?>" required />
</div>
 </div>
 <div class="form-group row">
        <label class="col-md-2 control-label">Store ID</label>
        <div class="col-md-5">
            <input type="text" class="form-control" name="sid" placeholder="Store ID" value="<?php echo $sid;?>" required />
</div>
 </div>
 <div class="form-group row">
        <label class="col-md-2 control-label">License Plate</label>
        <div class="col-md-5">
            <input type="text" class="form-control" name="lplate" placeholder="License Plate" value="<?php echo $lplate;?>" required />
        </div>
</div>		
 <div class="form-group row">
 <label class="col-md-2 control-label">Kilometers</label>
        <div class="col-xs-2">
            <input type="text" class="form-control" name="km" placeholder="Kilometers" value="<?php echo $km;?>" required />
</div>
</div>
 <div class="form-group row">
        <label class="col-md-2 control-label">Next Service</label>
        <div class="col-xs-2">
            <input type="date" class="form-control" name="nexts" placeholder="NextService" value="<?php echo $nexts;?>" required />
</div>     

        <label class="col-md-2 control-label">Last Service</label>
        <div class="col-xs-2">
            <input type="date" class="form-control" name="lasts" placeholder="Last Service" value="<?php echo $lasts;?>" required />
</div>     
 </div>
 <div class="form-group row">
        <label class="col-md-2 control-label">Insurance Expiry</label>
        <div class="col-xs-2">
            <input type="date" class="form-control" name="expiry" placeholder="Insurance Expiry" value="<?php echo $expiry;?>" required />
</div>     
 </div>
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