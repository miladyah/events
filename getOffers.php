<?php
// include the file for the database connection
include_once("database_conn.php");


if (isset($_REQUEST['useJSON'])) {
	// echo what getJSONOFfer returns
	echo getJSONOffer($conn);
}

else {    // otherwise just an html record is required

    // so echo whatever getHTMLOffer returns to the browser or back to the ajax script
    echo getHTMLOffer($conn);
}

function getHTMLOffer($conn) {
    // store the sql for a random special offer, the sql wraps things using concat in an html 'wrapper'
    $sql = "select concat('<p>&#8220;',eventTitle,'&#8221;<br />\n<span class=\"category\">Category: ',catDesc,'</span><br />\n<span class=\"price\">Price: ',eventPrice,'</span></p>') as offer from te_events_special_offers inner join te_category on te_events_special_offers.catID = te_category.catID order by rand() limit 1";

    // execute the query
    $rsOffer = mysqli_query($conn, $sql);

    // get the one quotation returned
    $offer = mysqli_fetch_assoc($rsOffer);
    // return the quote
    return $offer['offer'];

}

function getJSONOffer($conn) {
    $sql = "select eventTitle, catDesc, eventPrice from te_events_special_offers inner join te_category on te_events_special_offers.catID = te_category.catID order by rand() limit 1";
    $rsOffer = mysqli_query($conn, $sql);
    //$offer = mysqli_fetch_all($rsOffer, MYSQLI_ASSOC);
    $offer = mysqli_fetch_assoc($rsOffer);
    return json_encode($offer);
}

?>