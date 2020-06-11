<?php
  session_start();
  $eventname="";
  $eventvenue="";
  $eventdate="";
  $eventtime="";
  $eventmanagernum="";
  $errors = array();
  require_once 'login_prajwalkrishnamurthy.php'; // Change this to the file name with your name

  //Create the connection to the MySQL database
  $db_server = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);
  if (!$db_server) die("Unable to connect to MySQL: " . mysqli_error($db_server));
    foreach($_POST as $key=>$value) ${$key}=$value;
  //$_POST is the ARRAY containing all HTML data that is sent to POST method
if (isset($_POST['submit_event'])){
  if (empty($eventname)) {
    array_push($errors, "Please enter event name");
  }
  if (empty($eventvenue)) {
    array_push($errors, "Please enter venue for event");
  }
  if (empty($eventdate)) {
    array_push($errors, "Please enter the event date");
  }

  if (empty($eventtime)) {
    array_push($errors, "Please enter event time");
  }
  if (empty($eventmanagernum)) {
    array_push($errors, "Please enter the event manager number");
  }
  
//Store each POST key/value pair in a PHP variable




$userid= $_SESSION["User_id"];

echo "$errors[0]";

if (!($errors))
{ //echo "Executing query";
$sql = "INSERT INTO events(event_name, event_venue, event_date, event_time, event_mgr_id,event_manager_num)
        VALUES ('$eventname', '$eventvenue', '$eventdate', '$eventtime', '$userid', '$eventmanagernum');";
  //echo $eventname
  //echo "Sql statement is $sql";
	$result = mysqli_query($db_server, $sql);
  //Check if the query was successfully executed: if the result is NOT FALSE
  //if($result) echo "INSERT success!<br />"; else echo "INSERT failed!<br />";

  if($result)
  {
    //Multiple lines of code should be wrapped in curly braces
    //echo "Event created successfully";
    $message='<div class="alert alert-success">The event has been created and you are assigned the manager for the event!!!
    </div>';
    //echo $message;
    //header('location: view_events_info.php');
    //echo "<p>Data was successfully INSERTED from the database.</p>";
  }
  else
  {
    //echo "<p>Your INSERT failed and here's why:</p>";
    $message='<div class="alert alert-danger">Sorry, there was a problem in creating the event</div>';
    die(mysqli_error($db_server));
  }
}
}
?>