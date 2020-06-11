<?php
session_start();
  require_once 'login_prajwalkrishnamurthy.php';
$message='';
$isupdate = isset($_POST['update_event']);
$isdelete = isset($_POST['delete_event']);
if ($isupdate || $isdelete)
{
  $db_server = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);
  if (!$db_server)
  {
    die("Unable to connect to MySQL: " . mysqli_error($db_server));
  }

  foreach($_POST as $key=>$value) ${$key}=$value;
  $userid= $_SESSION['User_id'];
  $eventid=$event_id;
  $query_string = '';
  $operation_string = '';
  if($isupdate)
  {
    $query_string = "UPDATE events SET event_name='$event_name',event_venue='$event_venue',event_date='$event_date',event_time='$event_time',event_manager_num='$event_manager_num'
                  WHERE event_id='$event_id'";
    $operation_string = 'updated';
  }
  else if($isdelete)
  {
    $query_string = "DELETE FROM events WHERE event_id='$eventid'";
    $operation_string = 'deleted';
  }

  $query_result = mysqli_query($db_server,$query_string);
  if($query_result)
  {
    $message="<div class='alert alert-success'>The event has been ".$operation_string." successfully</div>";
    //echo"Update success";
  }
  else {
    //echo "Update not working";
    $message='Operation failed';
  }
}