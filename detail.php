<?php
include_once "database_conn.php";          /* including the database */
session_start();   							/* starting the session */
include_once "login.php";					/* including login area */
?>

	<!-- Navigations start -->

  <div>
<ul>

	<li><a class="active" href="index.php">Home</a></li>            
	<li><a  href="events.php">Events</a></li>
	<li><a href="search.php">Search</a></li>
	<li><a href="admin.php">Admin</a></li>
        <li><a href="bookEventsForm.php">Book Events</a></li>
	<li style="float:right"><a class="active" href="credit.html">Credit</a></li>   
	
</ul>
  </div>
  <!-- Navigations End -->
  
<?php
  include_once "login-form.php";/* include login form page */
?>
<div class="container"></div>
  <h2>Event Detail</h2>
  
<?php
 $eventID = $_GET['id']; /* $_GET['id']; will get id from the last page */
																		/* Query for listing all edit results */
	$sql = "SELECT * FROM te_events JOIN te_venue ON te_venue.venueID = te_events.venueID JOIN te_category ON te_category.catID = te_events.catID WHERE te_events.eventID = $eventID";
    $queryresult = mysqli_query($conn, $sql) or die(mysqli_error($conn));  /* check the connection error */
	while ($row = mysqli_fetch_array($queryresult)) {
		
            $venueName = $row['venueName'];
			$catName = $row['catDesc'];
			$eventStartDate = $row['eventStartDate'];
			$eventEndDate = $row['eventEndDate'];
			$eventPrice = $row['eventPrice'];
			$eventID = $row['eventID'];
			$eventTitle = $row['eventTitle'];
			$eventDescription = $row['eventDescription'];
			$location = $row['location'];
	

	}
    
?>
      <!-- Table for listing all results start -->
  <table>
  <tr>
        <th style="width:30%">Title: </th>
    <td><?php echo $eventTitle; ?></td>
  </tr>
  <tr>
    <th>Venue:</th>
    <td><?php echo $venueName; ?></td>
  </tr>
  <tr>
    <th>Category:</th>
    <td><?php echo $catName; ?></td>
  </tr>
    <tr>
    <th>Location:</th>
    <td><?php echo $location; ?></td>
  </tr>
 
  <tr>
    <th>Start Date:</th>
    <td><?php echo $eventStartDate; ?></td>
  </tr>
  <tr>
    <th>End Date:</th>
    <td><?php echo $eventEndDate; ?></td>
  </tr>
  <tr>
    <th>Price (£)</th>
    <td><?php echo $eventPrice; ?></td>
  </tr>
  <tr>
    <th>Description:</th>
    <td><?php echo $eventDescription; ?></td>
  </tr>
</table>
</div>
		<!-- Table for listing all results start -->

</body>
</html>
	