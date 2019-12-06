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

        <div id="wrapper" class="container">
            <h1>Book Events</h1>

            <form id="bookingForm" action="javascript:alert('form submitted');" method="get" 
                  onsubmit="return valiadteForm();">
                <section id="selectEvent">
                    <h2>Select Events</h2>
                    <?php
                    include_once('database_conn.php');
                    $sqlEvents = 'SELECT eventID, eventTitle, eventStartDate, eventEndDate, catDesc, venueName, eventPrice FROM te_events e inner join te_category c on e.catID = c.catID inner join te_venue v on e.venueID = v.venueID WHERE eventPrice > 0 order by eventTitle';
                    $rsEvents = mysqli_query($conn, $sqlEvents);
                    while ($event = mysqli_fetch_assoc($rsEvents)) {
                        echo "\t<div class='item'>
            <span class='eventTitle'>" . filter_var($event['eventTitle'], FILTER_SANITIZE_SPECIAL_CHARS) . "</span>
            <span class='eventStartDate'>{$event['eventStartDate']}</span>
            <span class='eventEndDate'>{$event['eventEndDate']}</span>
            <span class='catDesc'>{$event['catDesc']}</span>
            <span class='venueName'>{$event['venueName']}</span>
            <span class='eventPrice'>{$event['eventPrice']}</span>
            <span class='chosen'><input type='checkbox' name='event[]' value='{$event['eventID']}' data-price='{$event['eventPrice']}' onclick=calculateEventsPrice(this,{$event['eventPrice']}) /></span>
      </div>\n";
                    }
                    ?>
                </section>

                <section id="collection">
                    <h2>Collection method</h2>
                    <p>Please select whether you want your chosen event(s) to be delivered to your home address (a charge applies for this) or whether you want to collect them yourself.</p>
                    <p>
                        Home address - &pound;4.99 <input type="radio" name="deliveryType" value="home" data-price="4.99" checked onclick="calculateDeliveryCharges()"/>&nbsp; | &nbsp;
                        Collect from ticket office - no charge <input type="radio" name="deliveryType" value="ticketOffice" data-price="0" onclick="calculateDeliveryCharges()"/>
                    </p>
                </section>

                <section id="checkCost">
                    <h2>Total cost</h2>
                    Total <input type="text" name="total" size="10" readonly />
                </section>

                <section id="placeOrder">
                    <h2>Place order</h2>
                    Your details
                    Customer Type: <select name="customerType">
                        <option value="">Customer Type?</option>
                        <option value="ret">Customer</option>
                        <option value="trd">Trade</option>
                    </select>

                    <div id="retCustDetails" class="custDetails">
                        Forename <input type="text" name="forename" />
                        Surname <input type="text" name="surname" />
                    </div>
                    <div id="tradeCustDetails" class="custDetails" style="visibility:hidden">
                        Company Name <input type="text" name="companyName" />
                    </div>
                    <label style="color: #FF0000; font-weight: bold;">I have read and agree to the terms and conditions
                        <input type="checkbox" name="termsChkbx" onclick="termsCheck()"/>
                    </label>

                    <p><input type="submit" name="submit" value="Order now!" disabled /></p>
                </section>
            </form>
        </div>
        <!-- script or link to script here -->
        <script src="js/task1.js"></script>
