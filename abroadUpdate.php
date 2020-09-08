<!DOCTYPE html>
<html>
<body>

<?php
	
	
	session_start();
	require "menu.php";
	require 'connectToDB.php';
	$id = $doc = "";
	$error = "";

	
	if(isset($_GET['id']))
	{
		$id = $_GET["id"];
		$_SESSION["id"] = $id;
		
		$query = "SELECT * FROM residents_abroad_docs WHERE SSN_cust='".$id."'";

		if (!($query_run = mysqli_query($mysql_connection, $query))) {
			$er = mysqli_error($mysql_connection);
			$error = "<div class='alert alert-danger alert-dismissable fade in'>
					<strong>$er<strong>.
					</div>";
		}
		else
		{
						$row = mysqli_fetch_assoc($query_run);
						$doc =$row["Documents"];
		}
	}
	
	if(isset($_POST["submit"]))
	{
		
		//isset()
		$doc = isset($_POST['doc']) ? $_POST['doc'] : "";
		//empty()
		$doc = !empty($_POST['doc']) ? $_POST['doc'] : "";

		$id = $_SESSION["id"];
		
		if(is_numeric($id))
		{
			if(strlen($id) == 11)
			{
							$query = "UPDATE `residents_abroad_docs` SET Documents='$doc' WHERE SSN_cust='$id'";

							if (!mysqli_query($mysql_connection, $query)) {
								$er = mysqli_error($mysql_connection);
								$error = "<div class='alert alert-danger alert-dismissable fade in'>
				    					<strong>$er<strong>.
										</div>";
							}
							else
							{								
								mysqli_close($mysql_connection);

								header("Location:abroad.php");	
							}
			}
			else
						{
							$error = "<div class='alert alert-danger alert-dismissable fade in'>
    								<strong>Το ΑΜΚΑ πρέπει να είναι 11 νούμερα<strong>.
								</div>";
						}
				
		}
		else
				{
					$error = "<div class='alert alert-danger alert-dismissable fade in'>
						    	<strong>Το ΑΜΚΑ πρέπει να είναι αριθμός<strong>.
							</div>";
				}
	}
?>

<body>

<div class="container">
<form method="post" action = "abroadUpdate.php">	
<?php echo $error;?>
<div class="form-group row">
        <label class="col-md-2 control-label">SSN Number</label>
        <div class="col-md-5">
            <input type="text" class="form-control" name="id" placeholder="SSN Number" value="<?php echo $id;?>" disabled />
</div>
 </div>
 <div class="form-group row">
        <label class="col-md-2 control-label">Documents</label>
        <div class="col-md-5">
            <input type="text" class="form-control" name="doc" placeholder="Customer's Documents" value="<?php echo $doc;?>" required />
</div>
	<br></br>
	<br></br>

    <div class="form-group row">
        <div class="col-md-offset-2 col-md-7">
            <button type="submit" class="btn btn-success" name="submit">Submit</button>
        </div>
    </div>
</form>

</body>
</html>