<?php include('sponsor_event_process.php') ?>
<html>
	<head>
	<title>
		Select event to sponsor
  	</title>
		<h1>Select an event for which you want to sponsor</h1>
    <link rel="stylesheet" type="text/css" href="style.css">
		<div class="topnav-right">
			<a href="login_success_page.php">Return to options</a><br>
				<a href="logout.php">Logout</a>
			</div>

    <script language="javascript" type="text/javascript">
    function showRow(row)
{
var x=row.cells;
document.getElementById("event_name").value = x[0].innerHTML;
}
    </script>
	</head>
	<body>
		<div class="form-group">
						<div class="col-sm-10 col-sm-offset-2">
								<?php echo $message; ?>
						</div>
				</div>
  <!-- HTML code can reside ABOVE and BELOW the starting and closing PHP tags -->

	<?php
	/*$uid = $_SESSION['User_id'];
	echo "User id is ".$uid;

	foreach ($_SESSION as $key=>$value)
	{
		echo "Key=".$key." value=".$value;
		echo "<br>";
	}*/
		require_once 'login_prajwalkrishnamurthy.php'; // Change this to the file name with your name

		//Create the connection to the MySQL database
		$db_server = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);
		if (!$db_server) die("Unable to connect to MySQL: " . mysql_error());

		$sql = "SELECT event_name,event_venue,event_date,event_time,event_manager_num FROM events;";

	//	echo "Query executed successfully";

		//As we have already connected to the database, execute the query stored in the $sql variable
		$result = mysqli_query($db_server, $sql);

		//Check if the query was successfully executed: if the result is NOT FALSE
		//if($result)
		//	echo "SELECT query successful!</br></br>";
		//else
			//die("SELECT query failed</br></br>");


		//More advanced logic can also be done based on success or failure
		if($result)
		{
			//Start a table
			echo "<table id='myTable',cellspacing='1'>";
      echo "<tr><th>Event name</th><th>Event Venue</th><th>Event Date</th><th>Event Time</th><th>Event Manager Number</th></tr>";
			while($row=mysqli_fetch_assoc($result))
			{
				//Store each SQL row's column name/value pair in a PHP variable
				foreach($row as $key=>$value) ${$key}=$value;

				//Construct a table row where <td> = table division, i.e. a single column
				echo "<tr onclick='javascript:showRow(this);'></td><td>$event_name</td><td>$event_venue</td><td>$event_date</td><td>$event_time</td><td>$event_manager_num</td></tr>";
			}

			//End the table
			echo "</table>";
      echo "<br><br>";

					}

	?>
  <form method="post" action="sponsor_event.php">
	<div class="input-group">
  Event name:<input type="text" id="event_name" name="event_name" required />
</div>
  <div class="input-group">
  Company name:<input type="text" id="company_name" name="company_name" required/>
</div>
<div class="input-group">
  Sponsor amount:<input type="number" id="sponsor_amt" name="sponsor_amt" required />
</div>
<div class="input-group">
  Contact Person<input type="text" id="contact_person" name="contact_person" required />
</div>
<div class="input-group">
  Contact number:<input type="tel" id="contact_num" name="contact_num" required />
</div>
  <div class="input-group">
  <button type="submit" class="btn" name="Sponsor">Sponsor</button>
  </div>

</form>
  <!-- HTML code can reside ABOVE and BELOW the starting and closing PHP tags -->
	</body>
</html>