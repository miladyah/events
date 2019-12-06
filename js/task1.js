'use strict';
//the total proce of selected events + deleivery charges
var total_price = 0;
//get the dom element that represents the total price
var total_price_input = document.getElementsByName("total")[0];
//number of selected events
var total_events_count = 0;

//checks if the term checkbox is checked or not
function termsCheck(){
    var termsChkbx = document.getElementsByName("termsChkbx")[0] ;
    //if the term checkbox is checked the text turns into black and normal
    if(termsChkbx.checked){
        termsChkbx.parentElement.style.color             = "black";
        termsChkbx.parentElement.style.fontWeight        = "normal";
        //enable the form submit button
        document.getElementsByName('submit')[0].disabled = false;
    }else{
      //if the term checkbox isn't checked the text turns into red and bold      
        termsChkbx.parentElement.style.color             = "#FF0000";
        termsChkbx.parentElement.style.fontWeight        = "bold";
        //disable the form submit button
        document.getElementsByName('submit')[0].disabled = true;
    }

}

//validates if all the text fields are completed before form submition
    //we have to cases : 
    //1- forename , surname are required and at least one event is selected
    //2- company is required and at lease one event is selected
function valiadteForm(){
    var forename = document.getElementsByName('forename')[0].value;
    var surname  = document.getElementsByName('surname')[0].value;
    var company  = document.getElementsByName('companyName')[0].value;
    
    if(((forename !== "" && surname !== "") || company !== "")
            && total_events_count !== 0 ){
        return true;
    }else{
        alert("please complete the form to submit");
        return false;
    }
    
}

//calculated the total price of selected events
function calculateEventsPrice(event , eventPrice){
    // if the event is checked add its price to the total price
    if(event.checked){
        total_price += eventPrice;
        total_events_count++;
    }else{
    // if the event is unchecked subtract its price from the total price
        total_price -= eventPrice;
        total_events_count--;
    }
     calculateDeliveryCharges();
}

//calculated the deleivery charges : either 4.99 if it will be deleiverd 
//or 0 if the buyer will pick it up by himself
function calculateDeliveryCharges(){
    //checkes if there is events that are selected
    if(total_price > 0){
        var delivery_charges = document.getElementsByName('deliveryType');
        //first case that will be deleiverd
        if(delivery_charges[0].checked){
            total_price_input.value = (total_price + 4.99).toFixed( 2 );
        }else if(delivery_charges[1].checked){    
        //second case where there is no deleivery
            total_price_input.value = total_price.toFixed( 2 );     
        }
    }else{
        //if there is no events make the total price = 0
        total_price_input.value = 0;
    }
}

// the dom element of the customer type
var customerType = document.getElementsByTagName('select')[0];

//changes the visibility of the input fields according to the customer type
customerType.onchange = function() {
  var selected_option = this[this.selectedIndex];
  var selected_text = selected_option.value;
  if(selected_text === "trd" ){
      document.getElementById('tradeCustDetails').style.visibility = 'visible';
      document.getElementById('retCustDetails').style.visibility   = 'hidden';
  }else{
      document.getElementById('tradeCustDetails').style.visibility = 'hidden';
      document.getElementById('retCustDetails').style.visibility   = 'visible';   
  }
};