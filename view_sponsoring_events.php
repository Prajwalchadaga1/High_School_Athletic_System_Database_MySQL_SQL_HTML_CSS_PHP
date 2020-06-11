<?php
session_start();
 ?>

<html>
	<head>
	<title>
		View all events
  	</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <div class="topnav-right">
      <a href="login_success_page.php">Return to options</a><br>
        <a href="logout.php">Logout</a>
      </div>


  </head>
	<body>

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

    $userid= $_SESSION['User_id'];

    $sql= "SELECT e.event_id,e.event_name,e.event_venue,e.event_date,e.event_time,e.event_manager_num,s.sponsor_amt,s.company_name,s.contact_person,s.contact_num FROM events e
		   INNER JOIN sponsors s ON s.sponsor_event_id=e.event_id
		   WHERE s.user_id='$userid';";

    $result = mysqli_query($db_server, $sql);



		//As we have already connected to the database, execute the query stored in the $sql variable

		//Check if the query was successfully executed: if the result is NOT FALSE
		//if($result)
			//echo "SELECT query successful!</br></br>";
		//else
			//die("SELECT query failed</br></br>");


		//More advanced logic can also be done based on success or failure
		if(mysqli_num_rows($result)>0)
		{
			//Start a table
			echo "<table id='myTable',cellspacing='1'>";
      echo "<tr><th>Event name</th><th>Event Venue</th><th>Event Date</th><th>Event Time</th><th>Event Manager Number</th><th>Sponsor Amount</th><th>Sponsor Company</th><th>Sponsor Contact</th><th>Sponsor Contact Number</th></tr>";
			while($row=mysqli_fetch_assoc($result))
			{
				//Store each SQL row's column name/value pair in a PHP variable
				foreach($row as $key=>$value) ${$key}=$value;

				//Construct a table row where <td> = table division, i.e. a single column
				echo "<tr onclick='javascript:showRow(this);'><td style=\"display:none;\">$event_id</td><td>$event_name</td><td>$event_venue</td><td>$event_date</td><td>$event_time</td><td>$event_manager_num</td><td>$sponsor_amt</td><td>$company_name</td><td>$contact_person</td><td>$contact_num</td></tr>";
			}

			//End the table
			echo "</table>";
      echo "<br><br>";

					}

          else {
            echo "Currently you are not sponsoring any of the events";

              }

?>