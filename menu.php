<!DOCTYPE html>
<html>
<head>
<title>DB Project 2017-2018</title>
 <script data-require="jquery" data-semver="2.0.3" src="http://code.jquery.com/jquery-2.0.3.min.js"></script>

		<!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://bootswatch.com/3/united/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://bootswatch.com/3/united/bootstrap.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	
	
	</head>
<script src="https://bootswatch.com/_vendor/popper.js/dist/umd/popper.min.js"></script>
<script src="https://bootswatch.com/_vendor/jquery/dist/jquery.min.js"></script>
<script src="https://bootswatch.com/_vendor/bootstrap/dist/js/bootstrap.min.js"></script>


<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">Βάσεις Δεδομένων</a>
    </div>

	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
	  <li class="active"><a href="index.php">Home <span class="sr-only">(current)</span></a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Employees Information<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="employees.php">Employees</a></li>
			<li><a href="works.php">Working Info</a></li>
		  </ul>
		 </li>
		<li><a href="customers.php">Customers</a></li>
		<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Vehicles Info<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="vehicles.php">Vehicles</a></li>
			<li><a href="damages.php">Damages/Malfunctions</a></li>
		  </ul>
		 </li>
		<li><a href="reservations.php">Reservations</a></li>
		<li><a href="rents.php">Rents</a></li>
		<li><a href="stores.php">Stores</a></li>
		<li><a href="queries.php">Queries</a></li>
		<li><a href="triggers.php">Triggers</a></li>
		<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Contact Information <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="storesphones.php">Stores Phones</a></li>
			<li><a href="storesemails.php">Stores E-mails</a></li>
            <li><a href="employeesphones.php">Employees Phones</a></li>
			<li><a href="employeesemails.php">Employees E-mails</a></li>
		</ul>
		</li>
		<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Views <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="updatableView.php">Updateable View</a></li>
            <li><a href="Notupdateable.php">Not Updateable View</a></li>
          </ul>
        </li>
      </ul>
    </div>
 </div>
 </nav>
	<ul class="nav nav-pills">
  <li><a href="transactions.php">Transactions History</a></li>
  <li><a href="abroad.php">Foreign Customers's Documents</a></li>
  <li><a href="cust_companies.php">Companies</a></li>
</ul>
<br>
<br>





</body>

</html>