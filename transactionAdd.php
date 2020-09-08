<!DOCTYPE html>
<html>
<body>

<?php

	require "menu.php";
	require 'connectToDB.php';
	$id = $methp = $amp = "";
	$error = "";

	if(isset($_POST["submit"]))
	{
		//isset()
		$id = isset($_POST['id']) ? $_POST['id'] : "";
		//empty()
		$id = !empty($_POST['id']) ? $_POST['id'] : "";

		//isset()
		$methp = isset($_POST['methp']) ? $_POST['methp'] : "";
		//empty()
		$methp = !empty($_POST['methp']) ? $_POST['methp'] : "";
		
		//isset()
		$amp = isset($_POST['amp']) ? $_POST['amp'] : "";
		//empty()
		$amp = !empty($_POST['amp']) ? $_POST['amp'] : "";
		
		

		if(is_numeric($amp))
		{
		if(is_numeric($id))
		{
				$query = "INSERT INTO `transaction_history` VALUES ('$id','$methp','$amp')";

							if (!mysqli_query($mysql_connection, $query)) {
								$er = mysqli_error($mysql_connection);
								$error = "<div class='alert alert-danger alert-dismissable fade in'>
				    					<strong>$er<strong>.
										</div>";
							}
							else
							{								
								mysqli_close($mysql_connection);
								header("Location:transactions.php");	
							}
		
		}
		else
				{
					$error = "<div class='alert alert-danger alert-dismissable fade in'>
						    	<strong>Ο κωδικός αυτοκινήτου πρέπει να είναι αριθμός<strong>.
							</div>";
				}
		}else
		{
			$error = "<div class='alert alert-danger alert-dismissable fade in'>
						    	<strong>Το ποσό πληρωμής πρέπει να είναι αριθμός<strong>.
							</div>";
	}
?>

<body>

<div class="container">
<form method="post" action = "transactionAdd.php">	
<?php echo $error;?>
<div class="form-group row">
        <label class="col-md-2 control-label">Rent ID</label>
        <div class="col-md-5">
            <input type="text" class="form-control" name="id" placeholder="Rent ID" value="<?php echo $id;?>" required />
</div>
 </div>
 <div class="form-group row">
        <label class="col-md-2 control-label">Payment Method</label>
        <div class="col-md-5">
            <input type="text" class="form-control" name="methp" placeholder="Payment Method" value="<?php echo $methp;?>" required />
</div>
</div> 
<div class="form-group row">
        <label class="col-md-2 control-label">Payment Amount</label>
        <div class="col-md-5">
            <input type="text" class="form-control" name="amp" placeholder="Payment Amount" value="<?php echo $amp;?>" required />
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