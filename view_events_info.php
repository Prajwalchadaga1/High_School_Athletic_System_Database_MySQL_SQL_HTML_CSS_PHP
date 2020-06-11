<?php include('update_event.php');
session_start();
 ?>

<html>
	<head>
	<title>
		View all events
  	</title>
    <link rel="stylesheet" type="text/css" href="style.css">
  <? if($userid){
  echo  "<div class='topnav-right'>
        <a href='logout.php'>Logout</a>
      </div>";
} ?>

      <script language="javascript" type="text/javascript">
      function showRow(row)
  {
  var x=row.cells;
  document.getElementById("event_id").value = x[0].innerHTML;
  //alert("id is saved"+document.getElementById("event_id").value);
  document.getElementById("event_name").value = x[1].innerHTML;
  document.getElementById("event_venue").value = x[2].innerHTML;
  document.getElementById("event_date").value = x[3].innerHTML;
  document.getElementById("event_time").value = x[4].innerHTML;
  document.getElementById("event_manager_num").value = x[5].innerHTML;
  }
      </script>
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

    $sql= "SELECT event_id,event_name,event_venue,event_date,event_time,event_manager_num FROM events e";
    if($userid!= NULL)
	{
      $sql = $sql .
              " WHERE event_mgr_id='$userid';";

    }
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
      echo "<tr><th>Event Name</th><th>Event Venue</th><th>Event Date</th><th>Event Time</th><th>Event Manager Number</th></tr>";
			while($row=mysqli_fetch_assoc($result))
			{
				//Store each SQL row's column name/value pair in a PHP variable
				foreach($row as $key=>$value) ${$key}=$value;

				//Construct a table row where <td> = table division, i.e. a single column
				echo "<tr onclick='javascript:showRow(this);'><td style=\"display:none;\">$event_id</td><td>$event_name</td><td>$event_venue</td><td>$event_date</td><td>$event_time</td><td>$event_manager_num</td></tr>";
			}

			//End the table
			echo "</table>";
      echo "<br><br>";
      if($userid!=NULL){
        echo
        "<form method='post' action='view_events_info.php'>
        <div class='input-group'>
            <input type='hidden' id='event_id' name='event_id' />
            </div>
            <div class='form-group'>
        						<div class='col-sm-10 col-sm-offset-2'>
		                    $message
                        </div>
            <div class='input-group'>
            Event name <input type='text' id='event_name' name='event_name' />
            </div>
            <div class='input-group'>
            Event Venue  <input type='text' id='event_venue' name='event_venue'/>
            </div>
              <div class='input-group'>
              Event Date <input type='date' id='event_date' name='event_date'/>
            </div>
          <div class='input-group'>
          Event Time <input type='time' id='event_time' name='event_time'/>
          </div>
            <div class='input-group'>
            Event Manager Number  <input type='text' id='event_manager_num' name='event_manager_num'/>
            </div>
            
            <div class='input-group'>
                <button type='submit' class='btn' name='update_event'>Update</button>
              </div>
              <div class='input-group'>
                  <button type='submit' class='btn' name='delete_event'>Delete</button>
                </div>
            </form>
        </body>";
      }

					}

    else {
      echo "Currently you are not manager of any of the events";

        }


?>