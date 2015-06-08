<?php

$sid = $_POST['request-id'];
$confirmation = $_POST['transaction-id'];
$status = $_POST['status'];
$errormsg = $_POST['error-message'];
$ordernum = $_POST['order-number'];
$sql = "SELECT nid from {webform_submissions} where sid=%d";
$eventId = db_result(db_query($sql,$sid));

//insert payment confirmation into table
$table = 'events_payment_confirmation';
$record = new stdClass();
$record->nid = $eventId;
$record->sid = $sid;
$record->confirmation = $confirmation;
$record->ordernum = $ordernum;
$record->created = time();

drupal_write_record($table,$record);
echo 'ok';
?>

