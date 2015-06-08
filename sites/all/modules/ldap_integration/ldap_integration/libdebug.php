<?php
// $Id: sites/all/modules/ldap_integration/ldap_integration/libdebug.php 1.3 2010/02/18 14:54:31EST Linda M. Williams (WILLIAMSLM) Production  $

/**
 * @file
 * ldapauth module debug options.
 */

/**
 * Prints debug string.
 */
function msg($string) {
  drupal_set_message("<pre style=\"border: 0; margin: 0; padding: 0;\">$string</pre>");
}

/**
 * Prints debug object.
 */
function msg_r($object) {
  msg(print_r($object, TRUE));
}

