<!DOCTYPE html>

<html>
<?php

	session_start();

	require "menu.php";
	require 'connectToDB.php';

	$id = $irs = $idn = $fname = $lname = $driverl = $city = $street = $streetn = $postal = "";

	$error = "";
	
	if(isset($_GET['id']))
	{
		$id = $_GET["id"];
		$_SESSION["id"] = $id;
		
		$query = "SELECT * FROM employee WHERE SSN_emp='".$id."'";

		if (!($query_run = mysqli_query($mysql_connection, $query))) {
			$er = mysqli_error($mysql_connection);
			$error = "<div class='alert alert-danger alert-dismissable fade in'>
					<strong>$er<strong>.
					</div>";
		}
		else
		{
						$row = mysqli_fetch_assoc($query_run);
						$irs = $row["IRS_emp"];
						$idn = $row["IdentityNumber"];
						$lname = $row["LastName"];
						$fname = $row["FirstName"];
						$driverl = $row["DriverLicense"];
						$city = $row["City"];
						$street = $row["Street"];
						$streetn = $row["StreetNumber"];
						$postal = $row["PostalCode"];	
		}
	}
	if(isset($_POST["submit"]))
	{
				
		//isset()
		$irs = isset($_POST['irs']) ? $_POST['irs'] : "";
		//empty()
		$irs = !empty($_POST['irs']) ? $_POST['irs'] : "";
		
		//isset()
		$idn = isset($_POST['idn']) ? $_POST['idn'] : "";
		//empty()
		$idn = !empty($_POST['idn']) ? $_POST['idn'] : "";
		
		//isset()
		$lname = isset($_POST['lname']) ? $_POST['lname'] : "";
		//empty()
		$lname = !empty($_POST['lname']) ? $_POST['lname'] : "";

		//isset()
		$fname = isset($_POST['fname']) ? $_POST['fname'] : "";
		//empty()
		$fname = !empty($_POST['fname']) ? $_POST['fname'] : "";
		
		//isset()
		$driverl = isset($_POST['driverl']) ? $_POST['driverl'] : "";
		//empty()
		$driverl = !empty($_POST['driverl']) ? $_POST['driverl'] : "";
		
		//isset()
		$city = isset($_POST['city']) ? $_POST['city'] : "";
		//empty()
		$city = !empty($_POST['city']) ? $_POST['city'] : "";
		
		//isset()
		$street = isset($_POST['street']) ? $_POST['street'] : "";
		//empty()
		$street = !empty($_POST['street']) ? $_POST['street'] : "";
		
		//isset()
		$streetn = isset($_POST['streetn']) ? $_POST['streetn'] : "";
		//empty()
		$streetn = !empty($_POST['streetn']) ? $_POST['streetn'] : "";
		
		//isset()
		$postal = isset($_POST['postal']) ? $_POST['postal'] : "";
		//empty()
		$postal = !empty($_POST['postal']) ? $_POST['postal'] : "";
		
		$id = $_SESSION["id"];

		if(is_numeric($id))
		{
			if(strlen($id) == 11)
			{
				if(is_numeric($irs))
				{
					if(strlen($irs) == 9)
					{
						if(is_numeric($postal))
						{
							if(is_numeric($streetn))
							{
								if(is_numeric($driverl))
									{
										$query = "UPDATE employee SET IRS_emp='$irs', IdentityNumber='$idn', LastName='$lname', FirstName='$fname', DriverLicense='$driverl', City='$city', Street='$street', StreetNumber='$streetn', PostalCode='$postal' WHERE SSN_emp='$id'";
										
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

												header("Location:employees.php");	
										}
									}	
									else
									{
										$error = "<div class='alert alert-danger alert-dismissable fade in'>
													<strong>Η άδεια οδήγησης πρέπει να είναι αριθμός<strong>.
														</div>";
									}
										
							}else
							{
								$error = "<div class='alert alert-danger alert-dismissable fade in'>
    						<strong>Ο Αριθμός Οδού πρέπει να είναι αριθμός<strong>.
							</div>";
							}
						}else
							{
							$error = "<div class='alert alert-danger alert-dismissable fade in'>
    						<strong>Ο ταχυδρομικός κωδικός πρέπει να είναι αριθμός<strong>.
							</div>";
							}
					}else
						{
						$error = "<div class='alert alert-danger alert-dismissable fade in'>
    						<strong>To ΑΦΜ πρέπει να είναι 9 νούμερα<strong>.
						</div>";
						}
				}else
					{
					$error = "<div class='alert alert-danger alert-dismissable fade in'>
    						<strong>To ΑΦΜ πρέπει να είναι αριθμός<strong>.
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
<form method="post" action = "employeeUpdate.php">	
<?php echo $error;?>
<div class="form-group row">
        <label class="col-md-2 control-label">SSN Number</label>
        <div class="col-md-5">
            <input type="text" class="form-control" name="id" placeholder="SSN Number" value="<?php echo $id;?>" disabled />
</div>
 </div>
 <div class="form-group row">
        <label class="col-md-2 control-label">IRS Number</label>
        <div class="col-md-5">
            <input type="text" class="form-control" name="irs" placeholder="Irs Number" value="<?php echo $irs;?>" required />
</div>
 </div>
 <div class="form-group row">
        <label class="col-md-2 control-label">Identity Number</label>
        <div class="col-md-5">
            <input type="text" class="form-control" name="idn" placeholder="Identity Number" value="<?php echo $idn;?>" required />
        </div>
</div>		
 

    <div class="form-group row">
        <label class="col-md-2 control-label">Full Name</label>
        <div class="col-md-5">
            <input type="text" class="form-control" name="fname" required value="<?php echo $fname;?>" placeholder="First Name"/>
        </div>
		<div class="col-md-5">
            <input type="text" class="form-control" name="lname" placeholder="Last Name" value="<?php echo $lname;?>" required />
        </div>
    </div>
	<div class="form-group row">
        <label class="col-md-2 control-label">Driver's License</label>
        <div class="col-md-5">
            <input type="text" class="form-control" name="driverl" placeholder="License ID" value="<?php echo $driverl;?>" required />
</div>
 </div>
 <div class="form-group row">
        <label class="col-md-2 control-label">City</label>
        <div class="col-md-5">
            <input type="text" class="form-control" name="city" placeholder="City Name" value="<?php echo $city;?>" required />
</div>
 </div>
	<div class="form-group row">
        <label class="col-md-2 control-label">Street Address</label>
        <div class="col-md-5">
            <input type="text" class="form-control" name="street" placeholder="Street Name" value="<?php echo $street;?>" required />
</div>
        <div class="col-md-5">
            <input type="text" class="form-control" name="streetn" placeholder="Street Number" value="<?php echo $streetn;?>" required />
</div>
 </div>
  <div class="form-group row">
        <label class="col-md-2 control-label">Postal Code</label>
        <div class="col-md-5">
            <input type="text" class="form-control" name="postal" placeholder="Postal Code" value="<?php echo $postal;?>" required />
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