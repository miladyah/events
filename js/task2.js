'use strict';

//usnig jquery to make an ajax call to get an offer in json form
window.onload = function () {
    getOffer("getOffers.php", callback);

    $.ajax({
        url: "getOffers.php?useJSON",
        type: "GET",
        dataType: "json",
        success: function (result) {
            // when the response is returned successfully , we add the event details to our index page
            var eventTitle   = result.eventTitle;
            var catDesc      = result.catDesc;
            var eventPrice   = result.eventPrice;
            var specialOffer = '<p>&#8220;' + eventTitle + '&#8221;<br />\n<span class=\"category\">Category: '
                    + catDesc + '</span><br />\n<span class=\"price\">Price: ' + eventPrice + '</span></p>';
            document.getElementById("JSONoffers").innerHTML = specialOffer;
        },
        error: function (result) {
            alert("failed " + result);
        }
    });
};

// making ajax call using xmlhttprequest
function getOffer(url, callback) {
    
    //get the http request object
    var xmlhttp;
    if (window.XMLHttpRequest) { // Mozilla, Safari
        xmlhttp = new XMLHttpRequest();
    } else if (window.ActiveXObject) { // Mozilla, Safari
        try {
            xmlhttp = new ActiveXObject("MSXML2.XmlHttp");
        } catch (exception) {
            xmlhttp = new ActiveXObject("Microsoft.XmlHttp");
        }
    } else {
        alert("can't create xmlhttp object");
    }
    //set http request onReadyStateChange to a funciton
    xmlhttp.onreadystatechange = function () {
        //check if http request ready state is completed
        if (xmlhttp.readyState === XMLHttpRequest.DONE) {
            //check if the status is successfull
            if (xmlhttp.status === 200) {
                //invoke callback with http request response text
                callback(xmlhttp.responseText);
            }
            else if (xmlhttp.status === 400) {
                alert('400 Error!!');
            }
            else {
                alert(xmlhttp.status + ' Error!!');
            }
        }
    };
    
    //open http request
    xmlhttp.open("GET", url, true);
    //send http request
    xmlhttp.send();

    //calling getOffer method every 5 sec to get a new request
    setTimeout(function () {
        getOffer(url, callback);
    }, 5000);

}

// used to set the dom element with id offers with the response text
function callback(responseText) {
    document.getElementById("offers").innerHTML = responseText;
}

//using ui jquery to implement autocomplete of the events in the index page
$(function () {
    
    //starting the autocomplete after typing 3 letters and the source is getEvents.php
    $(".tags").autocomplete({
        minLength: 3,
        source : "getEvents.php"
    });

    //showing the selected event details
    $('.tags').on('autocompleteselect', function (e, ui) {
        
        //getting all the event details
        $.ajax({
            url: "getEvents.php?getEvent",
            type: "GET",
            data: {title: ui.item.value},
            dataType: "json",
            success: function (data) {
                
                //on success, display all the event details
                var title ='&#8220;' + data.eventTitle + '&#8221;<br />\n';
                var category = '<span class=\"category\">Category: ' + data.catDesc + '</span><br />\n'
                var price = '<span class=\"price\">Price: ' + data.eventPrice + '</span><br />\n'
                var venue = '<span class=\"price\">Venue: ' + data.venueName + '</span><br />\n';
                var location =
                        '<span class=\"price\">Location: ' + data.location + '</span><br />\n';
                var startDate =
                        '<span>start Date: ' + data.eventStartDate + '</span><br />\n';
                var endDate ='<span>End Date: ' + data.eventEndDate + '</span><br />\n';
                        
                var event = '<p>'+title+category+price+venue+location+startDate+endDate+'</p>';
                document.getElementsByClassName("selectedEventDetails")[0].innerHTML = event;

            },
            error: function (xhr, status, error) {
                alert(error);
            }
        });
    });

});