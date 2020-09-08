<!DOCTYPE html>

<html>
<?php

	session_start();
	require "menu.php";
	require 'connectToDB.php';

	$id = $essn = $cssn = $vid = $sdate = $fdate = $sloc = $floc = $ehand = $erec = $rstate = "";

	$error = "";

	if(isset($_GET['id']))
	{
		$id = $_GET["id"];
		$_SESSION["id"] = $id;
		
		$query = "SELECT * FROM rents WHERE RentID='".$id."'";

		if (!($query_run = mysqli_query($mysql_connection, $query))) {
			$er = mysqli_error($mysql_connection);
			$error = "<div class='alert alert-danger alert-dismissable fade in'>
					<strong>$er<strong>.
					</div>";
		}
		else
		{
						$row = mysqli_fetch_assoc($query_run);
						$essn = $row["SSN_emp"];
						$cssn = $row["SSN_cust"];
						$vid = $row["VehicleID"];
						$sdate = $row["StartDate"];
						$fdate = $row["FinishDate"];
						$sloc = $row["StartLocation"];
						$floc = $row["FinishLocation"];
						$ehand = $row["Employee_Hand"];				
						$erec = $row["Employee_Receive"];
						$rstate = $row["ReturnState"];
		}
	}
	
	if(isset($_POST["submit"]))
	{
		
		//isset()
		$essn = isset($_POST['essn']) ? $_POST['essn'] : "";
		//empty()
		$essn = !empty($_POST['essn']) ? $_POST['essn'] : "";
		
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
		$sloc = isset($_POST['sloc']) ? $_POST['sloc'] : "";
		//empty()
		$sloc = !empty($_POST['sloc']) ? $_POST['sloc'] : "";
		
		//isset()
		$floc = isset($_POST['floc']) ? $_POST['floc'] : "";
		//empty()
		$floc = !empty($_POST['floc']) ? $_POST['floc'] : "";
		
		//isset()
		$ehand = isset($_POST['ehand']) ? $_POST['ehand'] : "";
		//empty()
		$ehand = !empty($_POST['ehand']) ? $_POST['ehand'] : "";
		
		//isset()
		$erec = isset($_POST['erec']) ? $_POST['erec'] : "";
		//empty()
		$erec = !empty($_POST['erec']) ? $_POST['erec'] : "";
		
		//isset()
		$rstate = isset($_POST['rstate']) ? $_POST['rstate'] : "";
		//empty()
		$rstate = !empty($_POST['rstate']) ? $_POST['rstate'] : "";
		
		$id = $_SESSION["id"];
		

		if(is_numeric($id))
		{
			
		if(is_numeric($essn))
		{
			if(strlen($essn) == 11)
			{
				if(is_numeric($cssn))
				{
					if(strlen($cssn) == 11)
						
					{
					if(is_numeric($vid))
						{
						if(is_numeric($ehand))
						{
							if(strlen($ehand)==11)
							{
								if(is_numeric($erec))
								{
									if(strlen($erec)==11)
									{
																			
										$query = "UPDATE rents SET SSN_emp='$essn', SSN_cust='$cssn', VehicleID='$vid', StartDate='$sdate', FinishDate='$fdate', StartLocation='$sloc', FinishLocation='$floc', Employee_Hand='$ehand', Employee_Receive='$erec', ReturnState='$rstate' WHERE RentID='$id'";
										
										
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

												header("Location:rents.php");	
										}
									}	
									else
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
			
	}else
			{
			$error = "<div class='alert alert-danger alert-dismissable fade in'>
    						<strong>Ο κωδικός ενοικίασης πρέπει να είναι αριθμος<strong>.
						</div>";
			}
	}
			
?>

<body>

<div class="container">
<form method="post" action = "rentUpdate.php">	
<?php echo $error;?>
<div class="form-group row">
        <label class="col-md-2 control-label">Rent ID</label>
        <div class="col-md-5">
            <input type="text" class="form-control" name="id" placeholder="Rent ID" value="<?php echo $id;?>" disabled />
</div>
</div>
<div class="form-group row">
        <label class="col-md-2 control-label">Employee SSN Number</label>
        <div class="col-md-5">
            <input type="text" class="form-control" name="essn" placeholder="Employee SSN Number" value="<?php echo $essn;?>" required />
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
        <label class="col-md-2 control-label">Rent Dates</label>
        <div class="col-md-5">
            <input type="date" class="form-control" name="sdate" required value="<?php echo $sdate;?>" placeholder="Start Date"/>
        </div>
		<div class="col-md-5">
            <input type="date" class="form-control" name="fdate" value="<?php echo $fdate;?>" required placeholder="Start Date"/>
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
        <label class="col-md-2 control-label">Handing Employee's SSN</label>
        <div class="col-md-5">
            <input type="text" class="form-control" name="ehand" placeholder="SSN Number" value="<?php echo $ehand;?>" required />
</div>
 </div>
 <div class="form-group row">
        <label class="col-md-2 control-label">Receiving Employee's SSN</label>
        <div class="col-md-5">
            <input type="text" class="form-control" name="erec" placeholder="SSN Number" value="<?php echo $erec;?>" required />
</div>
 </div>

  <div class="form-group row">
        <label class="col-md-2 control-label">Return State</label>
        <div class="col-md-5">
            <input type="text" class="form-control" name="rstate" placeholder="Return State" value="<?php echo $rstate;?>" required />
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