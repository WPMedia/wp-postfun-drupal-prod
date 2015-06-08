<?php
    $sid = $_SESSION['value'];

    // GET SUBMISSION
    $sql= "SELECT nid from {webform_submissions} where sid=%d";
    $eventId = db_result(db_query($sql,$sid));

    // GET SUBMITTED DATA
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
    //$phoneT = db_result(db_query($sql,'phone',$eventId,$sid));

    // GET TICKET QUANTITY
    $quantity = db_result(db_query($sql,'quantity',$eventId,$sid));

    // GET PAYMENT AMOUNT
    $sql = "select field_paycost_value from {content_type_webform} where nid=%d";
    $payamount = db_result(db_query($sql,$eventId));

    // CALCULATE TOTAL TO BE CHARGED
    $totalchargedT = $payamount * $quantity;

    // GET EVENT TITLE
    $sql= "SELECT title from {node} where nid=%d";
    $eventTitle = db_result(db_query($sql,$eventId));

    // GET CONFIRMATION NUMBER
    $sql = "select ordernum from {events_payment_confirmation} where nid=%d and sid=%d";
    $confirmationT = db_result(db_query($sql,$eventId,$sid));

    $email = $emailT;
    $contentType = 'confirmationemail';
    $contentNode = 'Payment Confirmation Email';
    $tablename = 'content_type_'.$contentType;
    $sql = "select field_wsdl_value, field_subject_value, field_body_value, field_template_value, field_salutation_value, field_closing_value
        from {node} n, {$tablename} cm where n.type = '%s' and cm.vid=n.vid and cm.nid=n.nid and n.title = '".$contentNode."'";
    $result = db_query_range($sql, $contentType, 0, 1);
    $data = db_fetch_object($result);

    $wsdl = $data->field_wsdl_value;

    try {
        // Throw an error if the WSDL is invalid
        if(!@file_get_contents($wsdl)) {
            throw new SoapFault('Server', 'No WSDL found at ' . $wsdl);
        }

        $doc = new DomDocument('1.0');
        $emailinfo = $doc->createElement('email-info');
        $doc->appendChild($emailinfo);
        $confemail = $doc->createElement('confirmation-email');
        $emailinfo->appendChild($confemail);
        $salutation = $doc->createElement('salutation');
        $body = $doc->createElement('body');
        $closing = $doc->createElement('closing');
        $confemail->appendChild($salutation);
        $confemail->appendChild($body);
        $confemail->appendChild($closing);
        $salutationtext = $doc->createTextNode($data->field_salutation_value . ' ' . $firstnameT .' ' . $lastnameT . ",\n\n");

        $summaryT = $data->field_body_value . "\n\n"
            //. $firstnameT . " " . $lastnameT . "\n"
            //. $addressT . "\n"
            //. $cityT . "," . $stateT
            //. " " . $zipT . "\n\n"
            . "You purchased " . $quantity . " tickets to " . $eventTitle . " at $" . $payamount . " per ticket.\n"
            . "$" . $totalchargedT . " has been charged to your credit card.\n\n"
            . "Your order number is: " . $confirmationT . "\n"
            . "Please print this email and bring it to the event.\n\n";
        $bodytext = $doc->createTextNode($summaryT);


        $closingtext = $doc->createTextNode($data->field_closing_value);
        $salutation->appendchild($salutationtext);
        $body->appendchild($bodytext);
        $closing->appendchild($closingtext);

        $parameters->xmlMessage=$doc->saveXML();
        $parameters->template=$data->field_template_value;
        $parameters->recipient=$email;
        $parameters->subject=$data->field_subject_value;

        //Create the Soap Client
        $soap = new soapclient($wsdl);
        $result = $soap->queueMessageWithSubject($parameters);

        //print_r("<br>results: $result->queueMessageResult <br>");

    } catch(SoapFault $fault) {
        //fail silently
        //print_r("SOAP Fault: (faultcode: {$fault->faultcode}, faultstring: {$fault->faultstring})");
    }
?>
