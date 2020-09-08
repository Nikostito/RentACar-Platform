<?php

	require "menu.php";
	require 'connectToDB.php';
	$StoreID = $City = $StreetName = $StreetNumber = $PostalCode = "";
	$error = "";

	if(isset($_POST["submit"]))
	{
		//isset()
		$StoreID = isset($_POST['storeId']) ? $_POST['storeId'] : "";
		//empty()
		$StoreID = !empty($_POST['storeId']) ? $_POST['storeId'] : "";

		//isset()
		$City = isset($_POST['city']) ? $_POST['city'] : "";
		//empty()
		$City = !empty($_POST['city']) ? $_POST['city'] : "";

		//isset()
		$StreetName = isset($_POST['streetName']) ? $_POST['streetName'] : "";
		//empty()
		$StreetName = !empty($_POST['streetName']) ? $_POST['streetName'] : "";

		//isset()
		$StreetNumber = isset($_POST['streetNumber']) ? $_POST['streetNumber'] : "";
		//empty()
		$StreetNumber = !empty($_POST['streetNumber']) ? $_POST['streetNumber'] : "";

		//isset()
		$PostalCode = isset($_POST['postal']) ? $_POST['postal'] : "";
		//empty()
		$PostalCode = !empty($_POST['postal']) ? $_POST['postal'] : "";
		
		if(is_numeric($StoreID))
		{
			if(is_numeric($PostalCode))
				{
					if(is_numeric($StreetNumber))
					{
							$query = "INSERT INTO `stores` VALUES ('$StoreID','$City','$StreetName','$StreetNumber','$PostalCode')";

							if (!mysqli_query($mysql_connection, $query)) {
								$er = mysqli_error($mysql_connection);
								$error = "<div class='alert alert-danger alert-dismissable fade in'>
				    					<strong>$er<strong>.
										</div>";
							}
							else
							{								
								mysqli_close($mysql_connection);

								header("Location:stores.php");	
							}
					}
					else
						{
							$error = "<div class='alert alert-danger alert-dismissable fade in'>
    								<strong>O αριθμός της κατοικίας πρέπει να είναι αριθμός<strong>.
								</div>";
						}
				
				}
				else
				{
					$error = "<div class='alert alert-danger alert-dismissable fade in'>
						    	<strong>O ταχυδρομικός κώδικας πρέπει να είναι αριθμός<strong>.
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
<form method="post" action = "storeAdd.php">	
<?php echo $error;?>
<div class="form-group row">
        <label class="col-md-2 control-label">Store ID</label>
        <div class="col-md-5">
            <input type="text" class="form-control" name="storeId" placeholder="Store ID" value="<?php echo $StoreID;?>" required />
</div>
 </div>
 <div class="form-group row">
        <label class="col-md-2 control-label">City</label>
        <div class="col-md-5">
            <input type="text" class="form-control" name="city" placeholder="City Name" value="<?php echo $City;?>" required />
</div>
 </div>
	
    <div class="form-group row">
        <label class="col-md-2 control-label">Address</label>
        <div class="col-md-5">
            <input type="text" class="form-control" name="streetName" placeholder="Street Name" value="<?php echo $StreetName;?>" required />
        </div>
        <div class="col-md-5">
            <input type="text" class="form-control" name="streetNumber" placeholder="Street Number" value="<?php echo $StreetNumber;?>" required />
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-2 control-label">Postal Code</label>
        <div class="col-md-5">
            <input type="text" class="form-control" name="postal" required value="<?php echo $PostalCode;?>" placeholder="Postal Code"/>
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