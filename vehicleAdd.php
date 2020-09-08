<!DOCTYPE html>

<html>
<?php

	require "menu.php";
	require 'connectToDB.php';

	$id = $sid = $lplate = $model = $con = $type = $year = $km = $cc = $hp = $ftype = $nexts = $lasts = $expiry = "";

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
		$model = isset($_POST['model']) ? $_POST['model'] : "";
		//empty()
		$model = !empty($_POST['model']) ? $_POST['model'] : "";

		//isset()
		$con = isset($_POST['con']) ? $_POST['con'] : "";
		//empty()
		$con = !empty($_POST['con']) ? $_POST['con'] : "";
		
		//isset()
		$type = isset($_POST['type']) ? $_POST['type'] : "";
		//empty()
		$type = !empty($_POST['type']) ? $_POST['type'] : "";
		
		//isset()
		$year = isset($_POST['year']) ? $_POST['year'] : "";
		//empty()
		$year = !empty($_POST['year']) ? $_POST['year'] : "";
		
		//isset()
		$km = isset($_POST['km']) ? $_POST['km'] : "";
		//empty()
		$km = !empty($_POST['km']) ? $_POST['km'] : "";
		
		//isset()
		$cc = isset($_POST['cc']) ? $_POST['cc'] : "";
		//empty()
		$cc = !empty($_POST['cc']) ? $_POST['cc'] : "";
		
		//isset()
		$hp = isset($_POST['hp']) ? $_POST['hp'] : "";
		//empty()
		$hp = !empty($_POST['hp']) ? $_POST['hp'] : "";
		
		//isset()
		$ftype = isset($_POST['ftype']) ? $_POST['ftype'] : "";
		//empty()
		$ftype = !empty($_POST['ftype']) ? $_POST['ftype'] : "";
		
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
				if(is_numeric($year))
				{
					if(is_numeric($km))
						{
							if(is_numeric($cc))
							{
								if(is_numeric($hp))
									{
										$query = "INSERT INTO `vehicle` VALUES ('$id','$sid','$lplate','$model','$con','$type','$year','$km','$cc','$hp','$ftype','$nexts','$lasts','$expiry')";
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

												header("Location:vehicles.php");	
										}
									}	
									else
									{
										$error = "<div class='alert alert-danger alert-dismissable fade in'>
													<strong>Οι Ίπποι πρέπει να είναι αριθμός<strong>.
														</div>";
									}
										
							}else
							{
								$error = "<div class='alert alert-danger alert-dismissable fade in'>
    						<strong>Τα κυβικά πρέπει να είναι αριθμός<strong>.
							</div>";
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
    						<strong>Το Έτος πρέπει να είναι αριθμός<strong>.
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
<form method="post" action = "vehicleAdd.php">	
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
        <label class="col-md-2 control-label">Model</label>
        <div class="col-md-5">
            <input type="text" class="form-control" name="model" placeholder="Model" value="<?php echo $model;?>" required />
</div>
 </div>
 <div class="form-group row">
        <label class="col-md-2 control-label">Constructor</label>
        <div class="col-md-5">
            <input type="text" class="form-control" name="con" placeholder="Constructor" value="<?php echo $con;?>" required />
</div>
 </div>
	<div class="form-group row">
        <label class="col-md-2 control-label">Car Type</label>
        <div class="col-xs-3">
            <input type="text" class="form-control" name="type" placeholder="Car Type" value="<?php echo $type;?>" required />
</div> 
<label class="col-md-1 control-label">Fuel Type</label>
        <div class="col-xs-3">
            <input type="text" class="form-control" name="ftype" placeholder="Fuel Type" value="<?php echo $ftype;?>" required />
</div> 
</div>
<div class="form-group row">
        <label class="col-md-2 control-label">Year</label>
        <div class="col-md-5">
            <input type="text" class="form-control" name="year" placeholder="Year" value="<?php echo $year;?>" required />
</div>     
 </div>
 <div class="form-group row">
 <label class="col-md-2 control-label">Car Info</label>
        <div class="col-xs-2">
            <input type="text" class="form-control" name="km" placeholder="Kilometers" value="<?php echo $km;?>" required />
</div>
<div class="col-xs-2">
            <input type="text" class="form-control" name="cc" placeholder="Cylinder Capacity" value="<?php echo $cc;?>" required />
</div>
<div class="col-xs-2">
            <input type="text" class="form-control" name="hp" placeholder="Horse Power" value="<?php echo $hp;?>" required />
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