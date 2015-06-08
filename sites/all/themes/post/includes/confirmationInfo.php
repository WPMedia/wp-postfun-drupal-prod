<?php

$sid = $_SESSION['value'];

$sql= "SELECT nid from {webform_submissions} where sid=%d";
$eventId = db_result(db_query($sql,$sid));
//what should I do if I get an sid not in the db

// GET EVENT TITLE
$sql = "select title from {node} where nid=%d";
$commentT = db_result(db_query($sql,$eventId));

// GET EVENT DESCRIPTION
$sql = "select body from {node_revisions} where nid=%d";
$descriptionT = db_result(db_query($sql,$eventId));

// GET SUBMISSION DETAILS
$sql = "select data from {webform_component} wc, {webform_submitted_data} wsd
        where wc.form_key='%s' and wc.nid=%d and wc.nid=wsd.nid and wc.cid=wsd.cid and wsd.sid=%d";
$firstnameT = db_result(db_query($sql,'first_name',$eventId,$sid));
$lastnameT = db_result(db_query($sql,'last_name',$eventId,$sid));
$addressT = db_result(db_query($sql,'address',$eventId,$sid));
$apartmentT = db_result(db_query($sql,'apartment',$eventId,$sid));
$cityT = db_result(db_query($sql,'city',$eventId,$sid));
$stateT = db_result(db_query($sql,'state',$eventId,$sid));
$zipT = db_result(db_query($sql,'zip',$eventId,$sid));

$emailT = db_result(db_query($sql,'email',$eventId,$sid));
$phoneT = db_result(db_query($sql,'phone',$eventId,$sid));

// GET TICKET QUANTITY
$quantity = db_result(db_query($sql,'quantity',$eventId,$sid));

// GET PAYMENT AMOUNT
$sql = "select field_paycost_value from {content_type_webform} where nid=%d";
$payamount = db_result(db_query($sql,$eventId));

// CALCULATE TOTAL TO BE CHARGED
$totalchargedT = $payamount * $quantity;

// GET CONFIRMATION NUMBER
$sql = "select ordernum from {events_payment_confirmation} where nid=%d and sid=%d";
$ordernumT = db_result(db_query($sql,$eventId,$sid));

// PRINT OUT DETAILS COLLECTED ABOVE
?>
<h2>Confirmation details for <?php print $commentT; ?></h2>
<p>Below are the details of your payment received by The Washington Post.</p>
<p><strong><?php print $firstnameT . " " . $lastnameT; ?></strong><br />
<?php if ($phoneT != null || ""):
    print $phoneT;
    print "<br />";
    endif;
?>
<?php print $emailT; ?></p>
<p><span class='bold'><?php print $quantity; ?></span> tickets at <span class='bold'>$<?php print $payamount; ?></span> each.<br />
Total amount charged to your credit card: <span class='bold'>$<?php print $totalchargedT; ?></span></p>
<p>Your order number is: <span class="bold"><?php print $ordernumT; ?></span></p>
<p>A confirmation email with the details above will be sent to the email address you provided.</p>
<div class="terms-use">
Read our <a onclick="window.open('<?php print BASEURL.RETURNPOLICYURL; ?>', 'Rules', 'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,width=460,height=500');return false;" href="#">Return Policy</a>
to learn about ticket purchase returns.
</div>

