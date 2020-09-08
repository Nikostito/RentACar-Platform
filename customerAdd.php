<!DOCTYPE html>

<html>
<?php

	require "menu.php";
	require 'connectToDB.php';

	$ssn = $irs = $fname = $lname = $driverl = $id = $first = $country = $city = $street = $streetn = $postal = $phone = $email = $type = "";

	$error = "";

	if(isset($_POST["submit"]))
	{
		//isset()
		$ssn = isset($_POST['ssn']) ? $_POST['ssn'] : "";
		//empty()
		$ssn = !empty($_POST['ssn']) ? $_POST['ssn'] : "";
		
		//isset()
		$irs = isset($_POST['irs']) ? $_POST['irs'] : "";
		//empty()
		$irs = !empty($_POST['irs']) ? $_POST['irs'] : "";
		
		//isset()
		$id = isset($_POST['id']) ? $_POST['id'] : "";
		//empty()
		$id = !empty($_POST['id']) ? $_POST['id'] : "";
		
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
		$first = isset($_POST['first']) ? $_POST['first'] : "";
		//empty()
		$first = !empty($_POST['first']) ? $_POST['first'] : "";
		
		//isset()
		$country = isset($_POST['country']) ? $_POST['country'] : "";
		//empty()
		$country = !empty($_POST['country']) ? $_POST['country'] : "";
		
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
		
		//isset()
		$phone = isset($_POST['phone']) ? $_POST['phone'] : "";
		//empty()
		$phone = !empty($_POST['phone']) ? $_POST['phone'] : "";
		
		//isset()
		$email = isset($_POST['email']) ? $_POST['email'] : "";
		//empty()
		$email = !empty($_POST['email']) ? $_POST['email'] : "";
		
		//isset()
		$type = isset($_POST['type']) ? $_POST['type'] : "";
		//empty()
		$type = !empty($_POST['type']) ? $_POST['type'] : "";

	if(is_numeric($ssn))
	{
		if(strlen($ssn) == 11)
		{
			if(is_numeric($irs))
			{
				if(strlen($irs) == 9)
				{
					if(is_numeric($streetn))
					{
							if(is_numeric($postal))
							{
								if(is_numeric($driverl))
								{
									if(is_numeric($phone))
									{
										$query = "INSERT INTO `customers` VALUES ('$ssn','$irs','$fname','$lname','$driverl','$id','$first','$country','$city','$street','$streetn','$postal','$phone','$email','$type')";
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

												header("Location:customers.php");	
										}
									}	
									else
									{
										$error = "<div class='alert alert-danger alert-dismissable fade in'>
													<strong>Το τηλέφωνο πρέπει να είναι αριθμός<strong>.
														</div>";
									}
										
							    }else
								{
								$error = "<div class='alert alert-danger alert-dismissable fade in'>
									<strong>Η άδεια οδήγησης πρέπει να είναι αριθμός<strong>.
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
    						<strong>Ο Αριθμός Οδού πρέπει να είναι αριθμός<strong>.
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
    						<strong>To ΑΜΚΑ πρέπει να είναι αριθμός<strong>.
						</div>";
	}
	}
?>

<body>

<div class="container">
<form method="post" action = "customerAdd.php">	
<?php echo $error;?>
<div class="form-group row">
        <label class="col-md-2 control-label">SSN Number</label>
        <div class="col-md-5">
            <input type="text" class="form-control" name="ssn" placeholder="SSN Number" value="<?php echo $ssn;?>" required />
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
            <input type="text" class="form-control" name="id" placeholder="Identity Number" value="<?php echo $id;?>" required />
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
        <label class="col-md-2 control-label">First Registration</label>
        <div class="col-md-5">
            <input type="date" class="form-control" name="first" required value="<?php echo $first;?>"/>
        </div>
</div>
 <div class="form-group row">
        <label class="col-md-2 control-label">Country</label>
        <div class="col-md-5">
            <input type="text" class="form-control" name="country" placeholder="Country Name" value="<?php echo $country;?>" required />
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
 <div class="form-group row">
        <label class="col-md-2 control-label">Contact Information</label>
        <div class="col-md-5">
            <input type="text" class="form-control" name="phone" required value="<?php echo $phone;?>" placeholder="Phone Number"/>
        </div>
		<div class="col-md-5">
            <input type="email" class="form-control" name="email" placeholder="E-mail Address" value="<?php echo $email;?>" required />
        </div>
    </div>
	  
	  
	<div class="form-group row">
      <label for="select" class="col-lg-2 control-label">Customer Type</label>
      <div class="col-lg-10">
        <select class="form-control" id="type" name="type" required>
			<option value="">Select One</option>
          <option value="Company">Company</option>
          <option value="Private Citizen">Private Citizen</option>
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