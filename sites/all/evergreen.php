<?php

$contentType = 'confirmationemail';
$sql = "select field_wsdl_value, field_subject_value, field_body_value, field_template_value, field_salutation_value, field_closing_value
        from {node} n, {content_type_confirmationemail} cm where n.type = '%s' and cm.vid=n.vid and cm.nid=n.nid order by n.created asc";
$result = db_query_range($sql,$contentType,0,1);
$data = db_fetch_object($result);

$wsdl = $data->field_wsdl_value;
$subject = "" . $node->title . " submission";

$vals = "";
foreach( $form_values['submitted_tree'] as $key => $value){
    if ($key != "opt_out"){
    	$vals = $vals . "$key: $value \n\n";
    }
}

$message = "A new submission for \"" . $node->title . "\" has been received with the following information:\n\n" . $vals . "";

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
    $salutationtext = $doc->createTextNode('Attention:');
    $bodytext = $doc->createTextNode("\n\n".$message."\n\n\n");
    $closingtext = $doc->createTextNode("Regards");
    $salutation->appendchild($salutationtext);
    $body->appendchild($bodytext);
    $closing->appendchild($closingtext);

    $parameters->xmlMessage=$doc->saveXML();
    $parameters->template=$data->field_template_value;
    $parameters->recipient="postfun@washpost.com";
    $parameters->subject=$subject;

    //Create the Soap Client
    $soap = new soapclient($wsdl);
    $result = $soap->queueMessageWithSubject($parameters);

    //print_r("<br>results: $result->queueMessageResult <br>");

} catch(SoapFault $fault) {
    //fail silently
    //print_r("SOAP Fault: (faultcode: {$fault->faultcode}, faultstring: {$fault->faultstring})");
}

?>
