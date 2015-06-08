<?php

$sid = $_GET['sid'];
$_SESSION['sid']=$sid;

$sql = "select count(sid) from events_payment_confirmation where sid=%d";
$sidcount = db_result(db_query($sql,$sid));
if ($sidcount >0){
    header("HTTP/1.0 404 Not Found");
    exit;
}

$sql = "select submitted from webform_submissions where sid=%d";
$timesubmitted = db_result(db_query($sql,$sid));
$now = time();
if ($now > $timesubmitted+PAYMENTTIMEOUT){
    header("HTTP/1.0 404 Not Found");
    exit;
}

$sql= "SELECT nid from {webform_submissions} where sid=%d";
$eventId = db_result(db_query($sql,$sid));
//what should I do if I get an sid not in the db

// GET PAYMENT DESCRIPTION FIELD
$sql = "select field_paydescription_value from {content_type_webform} where nid=%d";
$descriptionT = db_result(db_query($sql,$eventId));

// GET PAYMENT AMOUNT
$sql = "select field_paycost_value from {content_type_webform} where nid=%d";
$payamount = db_result(db_query($sql,$eventId));

$sql = "select title from {node} where nid=%d";
$commentT = db_result(db_query($sql,$eventId));

$sql = "select data from {webform_component} wc, {webform_submitted_data} wsd
        where wc.form_key='%s' and wc.nid=%d and wc.nid=wsd.nid and wc.cid=wsd.cid and wsd.sid=%d";
$firstnameT = db_result(db_query($sql,'first_name',$eventId,$sid));
$lastnameT = db_result(db_query($sql,'last_name',$eventId,$sid));
$addressT = db_result(db_query($sql,'address',$eventId,$sid));
$apartmentT = db_result(db_query($sql,'apartment',$eventId,$sid));
$cityT = db_result(db_query($sql,'city',$eventId,$sid));
$stateT = db_result(db_query($sql,'state',$eventId,$sid));
$zipT = db_result(db_query($sql,'zip',$eventId,$sid));

// GET TICKET QUANTITY
$quantity = db_result(db_query($sql,'quantity',$eventId,$sid));
// CALCULATE TOTAL TO BE CHARGED
$totalchargedT = $payamount * $quantity;

$doc = new DomDocument('1.0');
$paymentrequest = $doc->createElementNS('http://www.washpost.com/paysvcs','twp-payment-request');
$doc->appendChild($paymentrequest);

$requestid = $doc->createElement('request-id');
$paymentrequest->appendChild($requestid);
$text = $doc->createTextNode($sid);
$requestid->appendChild($text);

$amount = $doc->createElement('amount');
$paymentrequest->appendChild($amount);
$text = $doc->createTextNode($totalchargedT);
$amount->appendChild($text);

$comments = $doc->createElement('comments');
$paymentrequest->appendChild($comments);
$text = $doc->createTextNode($commentT);
$comments->appendChild($text);

$description = $doc->createElement('description');
$paymentrequest->appendChild($description);
$text = $doc->createTextNode($descriptionT);
$description->appendChild($text);

$postbackurl = $doc->createElement('post-back-url');
$paymentrequest->appendChild($postbackurl);
$text = $doc->createTextNode(BASEURL.'post/proxy/process-confirmation');
$postbackurl->appendChild($text);

$thankyouurl = $doc->createElement('thankyou-url');
$paymentrequest->appendChild($thankyouurl);
$text = $doc->createTextNode(BASEURLHTTPS.'post/proxy/close-obox');
$thankyouurl->appendChild($text);

$cancelurl = $doc->createElement('cancel-url');
$paymentrequest->appendChild($cancelurl);
$text = $doc->createTextNode(BASEURL.'post/proxy/cancel-payment');
$cancelurl->appendChild($text);

$firstname = $doc->createElement('first-name');
$paymentrequest->appendChild($firstname);
$text = $doc->createTextNode($firstnameT);
$firstname->appendChild($text);

$lastname = $doc->createElement('last-name');
$paymentrequest->appendChild($lastname);
$text = $doc->createTextNode($lastnameT);
$lastname->appendChild($text);

$address = $doc->createElement('address');
$paymentrequest->appendChild($address);
$text = $doc->createTextNode($addressT);
$address->appendChild($text);

$apartment = $doc->createElement('apartment');
$paymentrequest->appendChild($apartment);
$text = $doc->createTextNode($apartmentT);
$apartment->appendChild($text);

$city = $doc->createElement('city');
$paymentrequest->appendChild($city);
$text = $doc->createTextNode($cityT);
$city->appendChild($text);

$state = $doc->createElement('state');
$paymentrequest->appendChild($state);
$text = $doc->createTextNode($stateT);
$state->appendChild($text);

$zip = $doc->createElement('zip');
$paymentrequest->appendChild($zip);
$text = $doc->createTextNode($zipT);
$zip->appendChild($text);

echo $doc->saveXML();

?>
