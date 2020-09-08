<!DOCTYPE html>
<html>
<body>

<?php

	require "menu.php";
	require 'connectToDB.php';
	$id = $dmg = "";
	$error = "";

	if(isset($_POST["submit"]))
	{
		//isset()
		$id = isset($_POST['id']) ? $_POST['id'] : "";
		//empty()
		$id = !empty($_POST['id']) ? $_POST['id'] : "";

		//isset()
		$dmg = isset($_POST['dmg']) ? $_POST['dmg'] : "";
		//empty()
		$dmg = !empty($_POST['dmg']) ? $_POST['dmg'] : "";

		
		if(is_numeric($id))
		{
		
							$query = "INSERT INTO `damages/malfunctions` VALUES ('$id','$dmg')";

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
<form method="post" action = "damageAdd.php">	
<?php echo $error;?>
<div class="form-group row">
        <label class="col-md-2 control-label">Vehicle ID</label>
        <div class="col-md-5">
            <input type="text" class="form-control" name="id" placeholder="Vehicle ID" value="<?php echo $id;?>" required />
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