<?php

// include the file for the database connection
include_once("database_conn.php");

if (isset($_REQUEST['getEvent'])) {
    echo getJSONEvent($conn);
} else {
    echo getJSONTitles($conn);
}

function getJSONEvent($conn) {
    $title = $_GET['title'];

    $sql = "SELECT e.eventTitle, e.eventID, e.venueID, e.catID, e.eventStartDate, e.eventEndDate,v.location, e.eventPrice, v.venueName, c.catDesc FROM te_events_special_offers as e join te_venue as v on e.venueID = v.venueID join te_category as c on c.catID = e.catID where e.eventTitle = '" . $title . "' ORDER BY eventTitle ASC";
    $rsEvent = mysqli_query($conn, $sql);

    $arr = array();
    $row = mysqli_fetch_assoc($rsEvent);

    return json_encode($row);
}

function getJSONTitles($conn) {
    $sql = "SELECT e.eventTitle FROM te_events_special_offers as e ORDER BY eventTitle ASC";
    $rsEvent = mysqli_query($conn, $sql);
    $term = $_GET["term"];
    $arr = array();

    while ($row = mysqli_fetch_array($rsEvent)) {
        if (strpos(strtoupper($row["eventTitle"]), strtoupper($term)) !== false) {
            array_push($arr, $row["eventTitle"]);
        }
    }

    return json_encode($arr);
}

?>