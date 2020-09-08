<!DOCTYPE html>
<html>
<body>

<?php
session_start();

	require "menu.php";
	require 'connectToDB.php';
	
	$id = $City = $StreetName = $StreetNumber = $PostalCode = "";
	$error = "";
	if(isset($_GET['id']))
	{
		$id = $_GET["id"];
		$_SESSION["id"] = $id;
		
		$query = "SELECT * FROM stores WHERE StoreID='".$id."'";

		if (!($query_run = mysqli_query($mysql_connection, $query))) {
			$er = mysqli_error($mysql_connection);
			$error = "<div class='alert alert-danger alert-dismissable fade in'>
					<strong>$er<strong>.
					</div>";
		}
		else
		{
			$row = mysqli_fetch_assoc($query_run);
			$City = $row["City"];
			$StreetName = $row["Street"];
			$StreetNumber = $row["StreetNumber"];		
			$PostalCode = $row["PostalCode"];
		}
	}	
	if(isset($_POST["submit"]))
	{
		//isset()
		$id = isset($_POST['id']) ? $_POST['id'] : "";
		//empty()
		$id = !empty($_POST['id']) ? $_POST['id'] : "";

		//isset()
		$City = isset($_POST['City']) ? $_POST['City'] : "";
		//empty()
		$City = !empty($_POST['City']) ? $_POST['City'] : "";

		//isset()
		$StreetName = isset($_POST['StreetName']) ? $_POST['StreetName'] : "";
		//empty()
		$StreetName = !empty($_POST['StreetName']) ? $_POST['StreetName'] : "";

		//isset()
		$StreetNumber = isset($_POST['StreetNumber']) ? $_POST['StreetNumber'] : "";
		//empty()
		$StreetNumber = !empty($_POST['StreetNumber']) ? $_POST['StreetNumber'] : "";

		//isset()
		$PostalCode = isset($_POST['PostalCode']) ? $_POST['PostalCode'] : "";
		//empty()
		$PostalCode = !empty($_POST['PostalCode']) ? $_POST['PostalCode'] : "";
		
		$id = $_SESSION["id"];
		
		if(is_numeric($PostalCode))
				{
					if(is_numeric($StreetNumber))
					{		
							$query = "UPDATE stores SET City='$City', Street='$StreetName', StreetNumber='$StreetNumber', PostalCode='$PostalCode' WHERE StoreID='$id'";
		
							if (!mysqli_query($mysql_connection, $query)) {
								$er = mysqli_error($mysql_connection);
								$error = "<div class='alert alert-danger alert-dismissable fade in'>
				    					<strong>$er<strong>.
										</div>";
							}
							else
							{	mysqli_close($mysql_connection);

								session_destroy();


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
?>

<body>

<div class="container">
<form method="post" action = "storeUpdate.php">	
<?php echo $error;?>
<div class="form-group row">
        <label class="col-md-2 control-label">Store ID</label>
        <div class="col-md-5">
            <input type="text" class="form-control" name="id" placeholder="Store ID" value="<?php echo $id;?>" disabled />
</div>
 </div>
 <div class="form-group row">
        <label class="col-md-2 control-label">City</label>
        <div class="col-md-5">
            <input type="text" class="form-control" name="City" placeholder="City Name" value="<?php echo $City;?>" required />
</div>
 </div>
	
    <div class="form-group row">
        <label class="col-md-2 control-label">Address</label>
        <div class="col-md-5">
            <input type="text" class="form-control" name="StreetName" placeholder="Street Name" value="<?php echo $StreetName;?>" required />
        </div>
        <div class="col-md-5">
            <input type="text" class="form-control" name="StreetNumber" placeholder="Street Number" value="<?php echo $StreetNumber;?>" required />
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-2 control-label">Postal Code</label>
        <div class="col-md-5">
            <input type="text" class="form-control" name="PostalCode" required value="<?php echo $PostalCode;?>" placeholder="Postal Code"/>
        </div>
    </div>
	<br></br>

    <div class="form-group row">
        <div class="col-md-offset-2 col-md-8">
            <button type="submit" class="btn btn-success" name="submit">Update</button>
        </div>
    </div>
</form>

</body>
</html>
