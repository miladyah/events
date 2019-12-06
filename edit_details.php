<?php
session_start();							/* starting the session */
include_once "database_conn.php";			/* including the database */

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>TyneEvents</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/style-details.css">


</head>
<body>
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
include_once "login-form.php"; /* include login form page */
?>


<?php
  if(empty($_SESSION['userName'])) {/* If user is not logged in then it will display this message */
	  
	  echo "<h2>Please login to continue</h2>";
		return;  
  }
  
?>

  <h2>Event Detail</h2>
 <?php
 $eventID = $_GET['id'];// $_GET['id']; will get id from the last page

																/* update */

 if(isset($_POST['submit']))/* If user press submit then it will go in this condition */
 {
								          /* If user press submit then it will be in this condition */
    $title = $_POST['title'];
	$category= $_POST['category'];
	$venue= $_POST['venue'];
    $startdate = $_POST['syy']."-".$_POST['smm']."-".$_POST['sdd'] ;
    $enddate = $_POST['eyy']."-".$_POST['emm']."-".$_POST['edd'] ;
    $price = $_POST['price'] ;
    $description = $_POST['description'];
	
				/* filters been used to remove tags and remove or encode special characters from a string. */
				$title = filter_var($title, FILTER_SANITIZE_STRING, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
				$description = filter_var($description, FILTER_SANITIZE_STRING, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
				$price = filter_var($price, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
				/* trim removes whitespace or other predefined characters from both sides of a string */
				$title = trim($title);
				$description = trim($description);
				$price = trim($price);


											    /* Update query */
    $sql = "UPDATE te_events SET eventTitle='$title',catID='$category',venueID='$venue',eventStartDate='$startdate',eventEndDate='$enddate',eventPrice='$price',eventDescription='$description' WHERE eventID=$eventID";

    if ($conn->query($sql) === TRUE)/* If update was done successfully */
      {
          header('Location:admin.php');
      }
      else /* If update was not done successfully*/
      {
          echo "Error updating record";
      }
 }

											/* Showing all values in the form on edit */
    $sql = "SELECT * FROM te_events,te_category,te_venue where eventID='$eventID' and te_category.catID=te_events.catID and te_venue.venueID=te_events.venueID";
    $result = $conn->query($sql);

    while($row = $result->fetch_assoc())
    {
			$eventTitle = $row['eventTitle'];
			$eventDescription = $row['eventDescription'];
			$eventStartDate = $row['eventStartDate'];
			$eventEndDate = $row['eventEndDate'];
			$eventPrice = $row['eventPrice'];
			$catid= $row['catID'];
			$venueid= $row['venueID'];

    }
  ?>


  <form method="post" >
    <label>Title</label><br/>
    <input name="title" type="text" value="<?php echo $eventTitle; ?>"  required /><br/>
 <!--New-->
    <label>Venue</label><br/>
   <select name="venue">
		<?php

							
        $sql1= "SELECT * FROM te_venue";/* Listing all venue in the drop down from database */
        $result1 = $conn->query($sql1);

        while($row1 = mysqli_fetch_array($result1))
        {
			if($venueid==$row1['venueID'])
	        	echo "<option value='$row1[venueID]' selected='selected'>$row1[venueName]</option>";
			else
				echo "<option value='$row1[venueID]' >$row1[venueName]</option>";
        }
        ?>

</select>
   <br/>
	<label>Category</label><br/>
<select name="category">
    <?php


	  $sql2 = "SELECT * FROM te_category";/* Listing all categories in the drop down from database */
      $result2 = $conn->query($sql2);

      while($row2 = mysqli_fetch_array($result2))
      {
		  if($catid==$row2['catID'])
		  	echo "<option value='$row2[catID]' selected='selected'>$row2[catDesc]</option>";
		  else
		  	echo "<option value='$row2[catID]'>$row2[catDesc]</option>";
	  }


  ?>



  </select>

	<br/>

												<!--Start Date(loop)-->
  <label>Start Date</label><br/>
  <select name="syy">
  <option>yyyy</option>
  	<?php
		for($i=2016;$i<=2030;$i++)
		{
			echo "<option>$i</option>";
		}
	?>
  </select>
  <select name="smm">
  <option>mm</option>
  	<?php
		for($i=1;$i<=12;$i++)
		{
			echo "<option>$i</option>";
		}
	?>
  </select>
  <select name="sdd">
    <option>dd</option>
    	<?php
  		for($i=1;$i<=31;$i++)
  		{
  			echo "<option>$i</option>";
  		}
  	?>
  </select>
  <br/><br/>

													<!--End Date(loop)-->
  <label>End Date</label><br/>
  <select name="eyy">
  <option>yyyy</option>					       	
    <?php
    for($i=2016;$i<=2030;$i++)
    {
      echo "<option>$i</option>";
    }
  ?>
  </select>
  <select name="emm">
  <option>dd</option>
  <?php
  for($i=1;$i<=12;$i++)
  {
    echo "<option>$i</option>";
  }
?>
  </select>
  <select name="edd">
    <option>dd</option>
  	<?php
		for($i=1;$i<=31;$i++)
		{
			echo "<option>$i</option>";
		}
	?>
  </select><br/><br/>
    <label>Price (£)</label><br/>
    <input type="number" step="any" name="price" required value="<?php echo $eventPrice; ?>" /><br/>
    <label>Description</label><br/>
    <textarea name="description" cols="55" rows="5"><?php echo $eventDescription; ?></textarea><br/>
    <input type="submit" name="submit" value="Update" class="button">


  </form>

</div>

</body>
</html>
