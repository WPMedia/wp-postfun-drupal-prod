<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
//include 'sites/all/themes/post/includes/sanitize.php';
include 'sites/all/themes/post/includes/encryption.php';
$sid = $_GET['sid'];
$value=decrypt($sid);
$_SESSION['value']=$value;
$sid = $_GET['sid'];
Header( "Location: ".BASEURLHTTPS."post/payment-services?sid=".$sid);
die();

?>
