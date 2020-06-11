<?php
session_start();
  require_once 'login_prajwalkrishnamurthy.php';

  $db_server = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);
  if (!$db_server) die("Unable to connect to MySQL: " . mysqli_error($db_server));
if (isset($_POST['Participate'])){
  foreach($_POST as $key=>$value) ${$key}=$value;

  //echo "Got the values";
  /*foreach ($_POST as $entry)
{
     print $entry . "<br>";
}*/
  //echo $event_name;
  //echo $event_venue;
  //echo $event_date;
  //echo $event_time;
  //echo $event_manager_num;
  $find_event_id= "SELECT event_id FROM events WHERE event_name='$event_name';";
  $result = mysqli_query($db_server, $find_event_id);
  $Event_id=mysqli_fetch_object($result);
  $value=$Event_id->event_id;
  //echo "event id retrieved";
  $userid= $_SESSION['User_id'];
  //echo $userid;
$check_query="SELECT * FROM participants WHERE user_id='$userid' AND event_id='$value'";
$check_query_result=mysqli_query($db_server,$check_query);
$participant=mysqli_fetch_assoc($check_query_result);
if($participant)//exists
{ $message='<div class="alert alert-danger">Sorry, you are already registered as a participant for this event </div>'; 
}

  else
  {
  $sql = "INSERT INTO participants(user_id,event_id) VALUES('{$_SESSION['User_id']}',(SELECT event_id FROM events WHERE event_name='$event_name'));";

  $result2 = mysqli_query($db_server, $sql);
  //if($result) echo "INSERT success!<br />"; else echo "INSERT failed!<br />";

  if($result2)
  {
    //Multiple lines of code should be wrapped in curly braces
    //echo "<p>Data was successfully INSERTED to the database.</p>";
    $message='<div class="alert alert-success">You have been added as a participant for the event!!!</div>';

  }
  else
  {
    $message='<div class="alert alert-danger">Sorry, could not add you as a participant</div>';
    //echo "<p>Your INSERT failed and here's why:</p>";
    die(mysqli_error($db_server));
  }
}
}