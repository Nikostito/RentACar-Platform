<!DOCTYPE html>
<html>
<body>

<?php
	session_start();
	require "menu.php";
	require 'connectToDB.php';
	$id = $dmg = "";
	$error = "";

	if(isset($_GET['id']))
	{
		$id = $_GET["id"];
		$_SESSION["id"] = $id;
		
		$query = "SELECT * FROM `damages/malfunctions` WHERE VehicleID='".$id."'";

		if (!($query_run = mysqli_query($mysql_connection, $query))) {
			$er = mysqli_error($mysql_connection);
			$error = "<div class='alert alert-danger alert-dismissable fade in'>
					<strong>$er<strong>.
					</div>";
		}
		else
		{
						$row = mysqli_fetch_assoc($query_run);
						$dmg =$row["Damages/Malfunctions"];
		}
	}
	
	if(isset($_POST["submit"]))
	{

		//isset()
		$dmg = isset($_POST['dmg']) ? $_POST['dmg'] : "";
		//empty()
		$dmg = !empty($_POST['dmg']) ? $_POST['dmg'] : "";

		$id = $_SESSION["id"];
		
		if(is_numeric($id))
		{
		
							$query = "UPDATE `damages/malfunctions` SET `Damages/Malfunctions`='$dmg' WHERE VehicleID='$id'";

							if (!mysqli_query($mysql_connection, $query)) {
								$er = mysqli_error($mysql_connection);
								$error = "<div class='alert alert-danger alert-dismissable fade in'>
				    					<strong>$er<strong>.
										</div>";
							}
							else
							{								
								mysqli_close($mysql_connection);

								header("Location:damages.php");	
							}
		
		}
		else
				{
					$error = "<div class='alert alert-danger alert-dismissable fade in'>
						    	<strong>Ο κωδικός αυτοκινήτου πρέπει να είναι αριθμός<strong>.
							</div>";
				}
	}
?>

<body>

<div class="container">
<form method="post" action = "damageUpdate.php">	
<?php echo $error;?>
<div class="form-group row">
        <label class="col-md-2 control-label">Vehicle ID</label>
        <div class="col-md-5">
            <input type="text" class="form-control" name="id" placeholder="Vehicle ID" value="<?php echo $id;?>" disabled />
</div>
 </div>
 <div class="form-group row">
        <label class="col-md-2 control-label">Damages/Malfunctions</label>
        <div class="col-md-5">
            <input type="text" class="form-control" name="dmg" placeholder="Damages/Malfunctions" value="<?php echo $dmg;?>" required />
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