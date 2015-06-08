<?php
include 'sites/all/themes/post/includes/sanitize.php';
global $sub;

$sub = sanitize_util($_GET["sid"]);
//$_SESSION['sid'] = $sub;

$sid = $_SESSION['value'];

$sql= "SELECT nid from {webform_submissions} where sid=%d";
$eventId = db_result(db_query($sql,$sid));
//what should I do if I get an sid not in the db

// GET EVENT TITLE
$sql = "select title from {node} where nid=%d";
$commentT = db_result(db_query($sql,$eventId));

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

// PRINT OUT DETAILS COLLECTED ABOVE
?>
<h2>Submission Summary</h2>
<p><strong><?php print $firstnameT . " " . $lastnameT; ?><br />
<?php print $addressT ?>
<?php if ($apartmentT != null || ""):
    print " " . $apartmentT;
    endif;
?><br />
<?php print $cityT . ", " . $stateT . " " . $zipT; ?></strong><br />
<?php if ($phoneT != null || ""):
    print $phoneT;
    print "<br />";
    endif;
?>
<?php print $emailT; ?></p>
<p><?php print "<span class='bold'>" . $quantity . "</span> tickets at <span class='bold'>$" . $payamount . "</span> each."; ?><br />
<?php print "Total amount to be charged: <span class='bold'>$" . $totalchargedT . "</span>"; ?></p>

<p>&#171;&nbsp;<a href="#" onclick="history.back();return false;">Make Changes</a></p>
<br />
<button href="#payment-services">Pay Now</button>
<?php
include "sites/all/themes/post/includes/obox-payment.php";
?>
<br /><br />
<div class="terms-use">
Read our <a onclick="window.open('post/rules/return-policy', 'Retrun', 'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,width=460,height=500');return false;" href="#">Return Policy</a>
to learn about ticket purchase returns.
</div>