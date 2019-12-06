<?php
session_start();                                /* starting the session */
include_once "database_conn.php";				/* including the database */
include_once "login.php";						/* including login area */

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
<div class="container">
  <h2>Search</h2>
 <form method="post" class="search" >
<label>Title</label><br>
  <input type="text" name="search" placeholder="Event Title" size="35" style="text-align:center" /><br/><br/>
  
  <label>Venue</label><br/>
  <select name="venue">
  <option value="all">All Venues</option>
<?php
	                                           /* (fetch Venue) DropDown for Venues in the search */

      $sql1= "SELECT * FROM te_venue";
      $result1 = $conn->query($sql1);

      while($row1 = $result1->fetch_array(MYSQLI_ASSOC))
      {
		      echo "<option value='$row1[venueID]'>$row1[venueName]</option>";
	  }
?>

   </select><br/><br/>
   <label>Category</label><br/>
  <select name="category">
<?php
									/* (fetch Category) DropDown for Category in the search */

      $sql2 = "SELECT * FROM te_category";
      $result2 = $conn->query($sql2);
	  echo "<option value='all'>All Category</option>";
      while($row2 = $result2->fetch_array(MYSQLI_ASSOC))
      {
	echo "<option value='$row2[catID]'>$row2[catDesc]</option>";
		}
?>
</select><br/><br/>
										<!--Start Date(loop)-->
  <label>Start Date</label><br>
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
  <option>mm</option>
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
  <label>Price</label><br/>
  <input type="number" name="price" placeholder="0.00" step="any"  style="text-align:center" /><br/><br/>

  <input type="submit" name="submit" value="Search"/>

</form>
<?php
if(isset($_POST['submit'])) /* When User press submit, then this condition will be true */
  {


    $venue = $_POST['venue'];
    $category = $_POST['category'];
    $startdate = $_POST['syy']."-".$_POST['smm']."-".$_POST['sdd'];
    $enddate = $_POST['eyy']."-".$_POST['emm']."-".$_POST['edd'];
    $price = $_POST['price'];
    $search = $_POST['search'];

               
	$query = "SELECT * FROM te_events,te_category,te_venue";    /* Search Query */				
	$conditions = array();	/*  if statement will true it will added to query (start) */	
	if($search!='')			/* making a string of query and saving in an array variable named $condistions */	
	{
		$conditions[]= "MATCH (eventTitle) AGAINST ('*$search*' IN BOOLEAN MODE)"; /* eventTitle like '$search'; */
	}
	if($venue!='all')                              
	{
		$conditions[]= "te_events.venueID='$venue'";           
	}
	if($category!='all')
	{
		$conditions[]= "te_events.catID='$category'";
	}
	if($price!='')
	{
		$conditions[]= "eventPrice='$price'";
	}
	if($startdate!='yyyy-mm-dd')
	{
		$conditions[]= "eventStartDate='$startdate'";
	}
	if($enddate!='yyyy-mm-dd')
	{
		$conditions[]= "eventEndDate='$enddate'";
	}
										/*  if statement will true it will added to query (End) */

	$sql = $query;						/* All this to make a valid query, for any number Of filters used in search */
    if (count($conditions) > 0) {       /* If count of condition[] is more than 0 then it will added to string with 'and' charactr or else */  
      $sql .= " WHERE " . implode(' AND ', $conditions)." and te_category.catID=te_events.catID and te_venue.venueID=te_events.venueID order by te_events.eventTitle ASC ";    /* Implode is used to convert arrays to string */
    }
	else
	{                                  
		$sql .= " WHERE  te_category.catID=te_events.catID and te_venue.venueID=te_events.venueID order by te_events.eventTitle ASC ";
	}
      $result = $conn->query($sql);
	echo "
	  <table border=1>
		<thead>
		  <tr>
			<th>Title</th>
			<th>Venue</th>
			<th>Category</th>
			<th>Start Date</th>
			<th>End Date</th>
			<th>Price</th>
			<th>Location</th>
		  </tr>
		</thead>
		<tbody>";

      while($row = mysqli_fetch_array($result))
      {
		echo "<tr>

          <td><a href='detail.php?id=$row[eventID]'>$row[eventTitle]</a></td>
          <td>$row[venueName]</td>
          <td>$row[catDesc]</td>
          <td>$row[eventStartDate]</td>
          <td>$row[eventEndDate]</td>
          <td>$row[eventPrice]</td>
          <td>$row[location]</td>
        </tr>";
      }
	  echo "</tbody>
	  		</table>";

  }

    ?>

</div>
</body>
</html>
