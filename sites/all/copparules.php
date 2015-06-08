<?php

$age = $_POST['submitted']['age'];

$confirmationemail = TRUE;
if (!empty($age) && $age < 18){
    $confirmationemail = FALSE;
    $numberOfFields = count($form_values['submitted']);

    for ($i=1; $i<=$numberOfFields; $i++){
        $form_values['submitted'][$i]="";
    }

    drupal_set_message(COPPAERRORMSG,'error');
    $node->webform['confirmation'] = 'internal:'.COPPAURL;

} 

?>
