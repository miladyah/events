<?php
include_once "database_conn.php";           /* including the database */
session_start();       /* starting the session */
include_once "login.php";                   /* including login area */
?>
<link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css"
         rel = "stylesheet">
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

<!--Start the search bar-->
<div class="ui-widget">
  <label for="tags">Events: </label>
  <input class="tags">
</div>
<!--End the search bar-->
<!--Start of the selected event details-->
<asside class="selectedEventDetails"></asside>
<!--Start of the selected event details-->

<?php
include_once "login-form.php";    /* include login form page */
?>

<h3>Tyne Events</h3>
<p>Welcome to Tyne Events we specialise in event décor for Weddings, civil partnerships, corporate events, engagements, proms/ balls anniversaries, birthdays, christenings, theme nights, parties and much more we are one of the biggest family run events companies in the North East many of our bookings coming from returning customers and personal recommendation.</p>
<p>One of the very few companies that can offer the full alphabet and numbers in giant light up letters and at exceptionally reasonable prices. We supply Chair Covers, Venue Décor, Starlit Backdrops and Wedding Arches, Giant Light up Letters, Starlit Dance Floors, Photo Booths and Photo Boxes, starlit backdrops, giant light up letters and much more.</p>
<p>Why book several companies for the WOW factor when you can get everything from one award winning company. When booking with Tyne Events you are assured of our best price guarantee. We do not sub contract any of our hire stock everything is owned and managed under one roof by our dedicated team of staff, our excellent reputation is testament to the quality of our work.</p>
<p>Everything you wish to book can be seen at our showroom in Tyne mouth open 7 days per week by appointment. We do not display prices on our website but do not be put off by this we are one of the North Easts most reasonably priced companies offering exceptionally quality at realistic prices it is difficult to give individual prices as we need to take into account many factors, such as travelling to your venue and the amount of things you are booking to enable us to offer you our best price on all your event requirements.</p>
<p>Ring or email for a no obligation quotation. We do not operate on high pressure sales just genuinely want to offer our best price and allow you the opportunity to go away and consider your options leaving you free to get back in touch with us if you wish to take your enquiry any further.</p>


<aside id="offers"></aside>
<asside id="JSONoffers"></asside>
<img src="css/ncl.png" alt="Newcastle Image" class="fix"/>   <!-- Image -->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js" type="text/javascript"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="js/task2.js"></script>
