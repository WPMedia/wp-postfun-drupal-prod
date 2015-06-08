<?php
$form_id = sanitize($_POST["form_id"]);
$pos = strrpos($form_id, "_");
if (is_bool($pos)){
    return;
}else{
    $nid = substr($form_id,$pos+1);
    $quantity = sanitize($_POST["submitted"]["quantity"]);
    $sql = "select field_max_tickets_value from {content_type_webform} where nid=%d";
    $max_tickets = db_result(db_query($sql,$nid));
    if (empty($max_tickets) || $max_tickets == 0){
        //no limit on ticket distribution
        return;
    }
    $sql = "select sum(data) from {webform_submitted_data} wsd, {webform_component} wc, {events_payment_confirmation} epc
            where wc.form_key='quantity' and wc.cid=wsd.cid and wc.nid=%d and wc.nid=wsd.nid and wsd.sid=epc.sid
            and wsd.nid=epc.nid and epc.confirmation is not null";
    $ticket_count = db_result(db_query($sql,$nid));

    if (($ticket_count+$quantity) > $max_tickets) {
        form_set_error("form_id","No more tickets to purchase.");
    }
}
?>
