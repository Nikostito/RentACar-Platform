<!DOCTYPE html>

<html>
<?php

	require "menu.php";
	require 'connectToDB.php';

	$id = $cssn = $vid = $sdate = $fdate = $rdate = $paid = $sloc = $floc = $lplate = "";

	$error = "";

	if(isset($_POST["submit"]))
	{
		//isset()
		$id = isset($_POST['id']) ? $_POST['id'] : "";
		//empty()
		$id = !empty($_POST['id']) ? $_POST['id'] : "";
				
		//isset()
		$cssn = isset($_POST['cssn']) ? $_POST['cssn'] : "";
		//empty()
		$cssn = !empty($_POST['cssn']) ? $_POST['cssn'] : "";
		
		//isset()
		$vid = isset($_POST['vid']) ? $_POST['vid'] : "";
		//empty()
		$vid = !empty($_POST['vid']) ? $_POST['vid'] : "";

		//isset()
		$sdate = isset($_POST['sdate']) ? $_POST['sdate'] : "";
		//empty()
		$sdate = !empty($_POST['sdate']) ? $_POST['sdate'] : "";
		
		//isset()
		$fdate = isset($_POST['fdate']) ? $_POST['fdate'] : "";
		//empty()
		$fdate = !empty($_POST['fdate']) ? $_POST['fdate'] : "";
		
		//isset()
		$rdate = isset($_POST['rdate']) ? $_POST['rdate'] : "";
		//empty()
		$rdate = !empty($_POST['rdate']) ? $_POST['rdate'] : "";
		
		//isset()
		$sloc = isset($_POST['sloc']) ? $_POST['sloc'] : "";
		//empty()
		$sloc = !empty($_POST['sloc']) ? $_POST['sloc'] : "";
		
		//isset()
		$floc = isset($_POST['floc']) ? $_POST['floc'] : "";
		//empty()
		$floc = !empty($_POST['floc']) ? $_POST['floc'] : "";
		
		//isset()
		$paid = isset($_POST['paid']) ? $_POST['paid'] : "";
		//empty()
		$paid = !empty($_POST['paid']) ? $_POST['paid'] : "";
		
		//isset()
		$lplate = isset($_POST['lplate']) ? $_POST['lplate'] : "";
		//empty()
		$lplate = !empty($_POST['lplate']) ? $_POST['lplate'] : "";
		

		if(is_numeric($id))
		{
			
			if(is_numeric($cssn))
			{
				if(strlen($cssn) == 11)
				{
					if(is_numeric($vid))
					{
										$query = "INSERT INTO `reservation` VALUES ('$id','$cssn','$vid','$sdate','$fdate','$rdate','$paid','$sloc','$floc','$lplate')";
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

												header("Location:reservations.php");	
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
								<strong>Το ΑΜΚΑ πρέπει να είναι 11 νούμερα<strong>.
								</div>";
								}
			}else
			{
				$error = "<div class='alert alert-danger alert-dismissable fade in'>
    			<strong>Το ΑΜΚΑ πρέπει να είναι αριθμός<strong>.
				</div>";
			}
		}else
		{
			$error = "<div class='alert alert-danger alert-dismissable fade in'>
    		<strong>Ο κωδικός αυτοκινήτου πρέπει να είναι αριθμός<strong>.
			</div>";
		}
	}			
			
?>

<body>

<div class="container">
<form method="post" action = "reservationAdd.php">	
<?php echo $error;?>
<div class="form-group row">
        <label class="col-md-2 control-label">Reservation ID</label>
        <div class="col-md-5">
            <input type="text" class="form-control" name="id" placeholder="Reservation ID" value="<?php echo $id;?>" required />
</div>
</div>
<div class="form-group row">
    <label class="col-md-2 control-label">Customer SSN Number</label>
        <div class="col-md-5">
            <input type="text" class="form-control" name="cssn" placeholder="Customer SSN Number" value="<?php echo $cssn;?>" required />
</div>
 </div>
 
 <div class="form-group row">
        <label class="col-md-2 control-label">Vehicle ID</label>
        <div class="col-md-5">
            <input type="text" class="form-control" name="vid" placeholder="Vehicle ID" value="<?php echo $vid;?>" required />
        </div>
</div>	
 <div class="form-group row">
        <label class="col-md-2 control-label">Reservation Dates</label>
        <div class="col-xs-3">
            <input type="date" class="form-control" name="sdate" required value="<?php echo $sdate;?>" placeholder="Start Date"/>
        </div>
		<div class="col-xs-3">
            <input type="date" class="form-control" name="fdate" value="<?php echo $fdate;?>" required placeholder="Finish Date"/>
        </div>
		<div class="col-xs-3">
            <input type="date" class="form-control" name="rdate" value="<?php echo $rdate;?>" required placeholder="Reservation Date"/>
        </div>
 </div>	
 <div class="form-group row">
        <label class="col-md-2 control-label">Locations</label>
        <div class="col-md-5">
            <input type="text" class="form-control" name="sloc" required value="<?php echo $sloc;?>" placeholder="Start Location"/>
        </div>
		<div class="col-md-5">
            <input type="text" class="form-control" name="floc" value="<?php echo $floc;?>" required placeholder="Finish Location"/>
        </div>
 </div>	

	<div class="form-group row">
        <label class="col-md-2 control-label">License Plate</label>
        <div class="col-md-5">
            <input type="text" class="form-control" name="lplate" placeholder="License Plate" value="<?php echo $lplate;?>" required />
</div>
</div>

	<div class="form-group row">
      <label for="select" class="col-lg-2 control-label">Reservation Paid</label>
      <div class="col-xs-3">
        <select class="form-control" id="paid" name="paid" required>
			<option value="">Select One</option>
          <option value="YES">YES</option>
          <option value="NO">NO</option>
        </select>
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