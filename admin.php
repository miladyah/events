<?php
session_start();                               /* starting the session */
include_once "database_conn.php";				/* including the database */
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Tyne Events</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
			 <!-- Navigations start -->
 <div>
<ul>     
	<li><a class="active" href="index.php">Home</a></li>
	<li><a href="events.php">Events</a></li>
	<li><a href="search.php">Search</a></li>
	<li><a href="admin.php">Admin</a></li>
        <li><a href="bookEventsForm.php">Book Events</a></li>
	<li style="float:right"><a class="active" href="credit.html">Credit</a></li>
</ul>
  </div>
  
		      <!-- Navigations End -->
<?php
include_once "login-form.php";                // include login form page
?>
<div class="container">
  <h2>TyneEvents</h2>
</div>
<?php
  if(empty($_SESSION['userName'])) {  /* If user is not logged in then it will display a message */

	  echo "<h2>Please login to continue</h2>";
		return;
  }

?>
															<!-- header cells -->
  <table>
    <thead>
      <tr>
        <th>Title</th>
        <th>Venue</th>
        <th>Category</th>
	    <th>Location</th>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Price (£)</th>
        <th>Admin</th>									
      </tr>
    </thead>
    <tbody>
    <?php
																/* Query for listing all edit results */
	$sql ="SELECT e.eventTitle, e.eventID, v.location , e.venueID, e.catID, e.eventStartDate, e.eventEndDate, e.eventPrice, v.venueName, c.catDesc FROM te_events as e join te_venue as v on e.venueID = v.venueID join te_category as c on c.catID = e.catID ORDER BY eventTitle ASC";
    $queryresult = mysqli_query($conn, $sql) or die(mysqli_error($conn));
	while ($row = mysqli_fetch_array($queryresult)) {

            $venueName = $row['venueName'];
			$catName = $row['catDesc'];
			$eventStartDate = $row['eventStartDate'];
			$eventEndDate = $row['eventEndDate'];
			$eventPrice = $row['eventPrice'];
			$eventID = $row['eventID'];
			$eventTitle = $row['eventTitle'];
            $location = $row['location'];
																/* Table for listing all results */
																// When clicked on event title it will take the user to the details page ( event detail )
		echo "<tr>

        <td><a href='detail.php?id=$eventID'>$eventTitle</a></td>	 
        <td>$venueName</td>                     
        <td>$catName</td>
	    <td>$location</td>
        <td>$eventStartDate</td>
        <td>$eventEndDate</td>
        <td>$eventPrice</td>
        <td><a href='edit_details.php?id=$eventID'>Edit</a></td>
      </tr>";
      }

	?>

    </tbody>
  </table>
</div>

</body>
</html>
