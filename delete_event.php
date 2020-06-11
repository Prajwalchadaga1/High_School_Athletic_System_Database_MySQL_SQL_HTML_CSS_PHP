<?php
session_start();
  require_once 'login_prajwalkrishnamurthy.php';

  $db_server = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);
  if (!$db_server) die("Unable to connect to MySQL: " . mysqli_error($db_server));

  foreach($_POST as $key=>$value) ${$key}=$value;
$userid= $_SESSION['User_id'];
$eventid=$event_id;
$delete_query = mysqli_query($db_server,"DELETE FROM events WHERE event_id='$event_id'");
if($delete_query)
{
  echo"The event has been deleted";
}