<?php
  session_start();
    //echo "Login success:".$_SESSION["User_id"].".";
    //echo "Login success:".$_SESSION["username"].".";
?>

<html>
  <head>
    <title>Login success</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <div class="topnav-right">
        <a href="logout.php">Logout</a>
      </div>

  </head>

  <body>
    <div class="header">
      <h2>Pradaga HS Athletics Events Management System</h2>
      </div>
<form>

      <button type="button" onclick="location.href='create_event_page.php'" class="btn" name="create_event">Create an event</button><br><br>
  	  <button type="button" onclick="location.href='participant_event_page.php'" class="btn" name="participate_event">Participate in an event</button><br><br>
      <button type="button" onclick="location.href='sponsor_event.php'" class="btn" name="sponsor_event">Sponsor an event</button><br><br>
      <button type="button" onclick="location.href='view_events_info.php'" class="btn" name="View managing events">View managing events</button><br><br>
      <button type="button" onclick="location.href='view_sponsoring_events.php'" class="btn" name="View sponsoring events">View sponsoring events</button><br><br>
      <button type="button" onclick="location.href='view_participating_events.php'" class="btn" name="View participating events">View participating events</button><br><br>
	  

  </form>
  </body>