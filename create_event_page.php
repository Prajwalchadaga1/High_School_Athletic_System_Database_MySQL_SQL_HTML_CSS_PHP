<?php include('event_insert.php') ?>
<html>
	<head>
	<title>
		Create event page
	</title>
  <link rel="stylesheet" type="text/css" href="style.css">
	<!-- datepicker include begin-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/flatpickr.css">
	<!-- datepicker include end-->
	<div class="topnav-right">
			<a href="logout.php">Logout</a><br>
			<a href="login_success_page.php">Return to options</a>
		</div>
    <h1 style="font-family:verdana; color:#ffac33;text-align:center"> Create Event </h1>
    <style type = "text/css">
      body {
          font-family:Arial, Helvetica, sans-serif;
          font-size:14px;
       }
       label {
          font-weight:bold;
          width:100px;
          font-size:14px;
       }
       .box {
          border:#666666 solid 1px;
       }
      </style>
	</head>
	<body>
		<div class="form-group">
						<div class="col-sm-10 col-sm-offset-2">
								<?php echo $message; ?>
						</div>
				</div>
		<form method="POST" action="create_event_page.php">
<?php include('errors.php'); ?>
      <div class="input-group">
				<label>Event Name</label>
			  <input type="text" name="eventname"/>
      </div>
        <div class="input-group">
				<label>Venue</label>
        <input type="text" name="eventvenue"/>
				</div>
				<div class="input-group">
					<label>Event date (YYYY-MM-DD)</label>
					<input class="date" name="eventdate" type="text">
        </div>
				<div class="input-group">
					<label>Event time (HH:MM:SS in 24-hr format)</label>
					<input class="time" name="eventtime" type="text">
        </div>
				<div class="input-group">
				<label>Event manager number</label>
        <input class="tel" type="tel" name="eventmanagernum">
				</div>
				
				</br>
        
        
          <div class="input-group">
        	  <button type="submit" class="btn" name="submit_event">Submit</button>
        	</div>

        </form>
				
	</body>
</html>