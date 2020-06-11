<?php
session_start();
  require_once 'login_prajwalkrishnamurthy.php';

  $db_server = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);
  if (!$db_server) die("Unable to connect to MySQL: " . mysqli_error($db_server));
if (isset($_POST['Sponsor'])){
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
  $find_event_id= "SELECT event_id FROM events WHERE event_name='$event_name';";
  $result = mysqli_query($db_server, $find_event_id);
  $Event_id=mysqli_fetch_object($result);
  $value=$Event_id->event_id;
  //echo "Event id retrieved";
  $userid= $_SESSION['User_id'];
  //echo $userid;
  if($result)
  {
  $sql = "INSERT INTO sponsors(user_id,sponsor_event_id,sponsor_amt,company_name,contact_person,contact_num) VALUES('{$_SESSION['User_id']}',(SELECT event_id FROM events WHERE event_name='$event_name'),'$sponsor_amt','$company_name','$contact_person','$contact_num');";
}
$result2 = mysqli_query($db_server, $sql);
  //if($result) echo "INSERT success!<br />"; else echo "INSERT failed!<br />";

  if($result2)
  {
    //Multiple lines of code should be wrapped in curly braces
    //echo "<p>Data was successfully INSERTED to the database.</p>";
    $message='<div class="alert alert-success">You are now a sponsor for the event!!!</div>';
  }
  else
  {
    //echo "<p>Your INSERT failed and here's why:</p>";
    $message='<div class="alert alert-danger">Sorry, could not add you as a sponsor</div>';
    die(mysqli_error($db_server));
  }
}