<!DOCTYPE html>

<html>
<?php

	require "menu.php";
	require 'connectToDB.php';

	$ssn = $sid = $sdate = $fdate = $pos = $salary = "";

	$error = "";

	if(isset($_POST["submit"]))
	{
		//isset()
		$ssn = isset($_POST['ssn']) ? $_POST['ssn'] : "";
		//empty()
		$ssn = !empty($_POST['ssn']) ? $_POST['ssn'] : "";
		
		//isset()
		$sid = isset($_POST['sid']) ? $_POST['sid'] : "";
		//empty()
		$ssid = !empty($_POST['sid']) ? $_POST['sid'] : "";
		
		//isset()
		$sdate = isset($_POST['sdate']) ? $_POST['sdate'] : "";
		//empty()
		$sdate = !empty($_POST['sdate']) ? $_POST['sdate'] : "";

		//isset()
		$fdate = isset($_POST['fdate']) ? $_POST['fdate'] : "";
		//empty()
		$fdate = !empty($_POST['fdate']) ? $_POST['fdate'] : "";
		
		//isset()
		$pos = isset($_POST['pos']) ? $_POST['pos'] : "";
		//empty()
		$pos = !empty($_POST['pos']) ? $_POST['pos'] : "";
		
		//isset()
		$salary = isset($_POST['salary']) ? $_POST['salary'] : "";
		//empty()
		$salary = !empty($_POST['salary']) ? $_POST['salary'] : "";
		

		if(is_numeric($ssn))
		{
			if(strlen($ssn) == 11)
			{
				if(is_numeric($sid))
				{
					if(is_numeric($salary))
						{
							
										$query = "INSERT INTO `works` VALUES ('$ssn','$sid','$sdate','$fdate','$pos','$salary')";
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

												header("Location:works.php");	
										}
						}	
					    else
						{
							$error = "<div class='alert alert-danger alert-dismissable fade in'>
													<strong>Ο μισθός πρέπει να είναι αριθμός<strong>.
														</div>";
							}
										
				}else
				{
					$error = "<div class='alert alert-danger alert-dismissable fade in'>
    				<strong>Ο Κωδικός Καταστήματος πρέπει να είναι αριθμός<strong>.
					</div>";
				}
					
			}else
			{
				
				$error = "<div class='alert alert-danger alert-dismissable fade in'>
    						<strong>To ΑΜΚΑ πρέπει να είναι 11 νούμερα<strong>.
						</div>";
				}
		}else
			{
			$error = "<div class='alert alert-danger alert-dismissable fade in'>
    						<strong>To ΑΜΚΑ πρέπει να είναι αριθμος<strong>.
						</div>";
			}
	}
?>

<body>

<div class="container">
<form method="post" action = "workAdd.php">	
<?php echo $error;?>
<div class="form-group row">
        <label class="col-md-2 control-label">SSN Number</label>
        <div class="col-md-5">
            <input type="text" class="form-control" name="ssn" placeholder="SSN Number" value="<?php echo $ssn;?>" required />
</div>
 </div>
 <div class="form-group row">
        <label class="col-md-2 control-label">Store ID</label>
        <div class="col-md-5">
            <input type="text" class="form-control" name="sid" placeholder="Store ID" value="<?php echo $sid;?>" required />
        </div>
</div>	
 <div class="form-group row">
        <label class="col-md-2 control-label">Employee Dates</label>
        <div class="col-md-5">
            <input type="date" class="form-control" name="sdate" required value="<?php echo $sdate;?>" placeholder="Hiring Date"/>
        </div>
		<div class="col-md-5">
            <input type="date" class="form-control" name="fdate" value="<?php echo $fdate;?>"  placeholder="Firing Date"/>
        </div>
 </div>		
 <div class="form-group row">
        <label class="col-md-2 control-label">Position</label>
        <div class="col-md-5">
            <input type="text" class="form-control" name="pos" placeholder="Working Position" value="<?php echo $pos;?>" required />
</div>
 </div>
 <div class="form-group row">
        <label class="col-md-2 control-label">Salary</label>
        <div class="col-md-5">
            <input type="text" class="form-control" name="salary" placeholder="Salary" value="<?php echo $salary;?>" required />
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