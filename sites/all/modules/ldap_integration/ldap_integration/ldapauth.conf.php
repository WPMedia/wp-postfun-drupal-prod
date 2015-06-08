<?php
// $Id: sites/all/modules/ldap_integration/ldap_integration/ldapauth.conf.php 1.3 2010/02/18 14:54:28EST Linda M. Williams (WILLIAMSLM) Production  $

/**
 * @file
 * ldapauth module configuration options.
 */

/**
 * Transform the login name to something understood by the server.
 */
function ldapauth_transform_login_name($login_name) {
  return $login_name;
}

/**
 * Let users in (or not) according to some attributes' values
 * (and maybe some other reasons).
 */
function ldapauth_user_filter(&$attributes) {
  // Uncomment next line to see how the argument array looks like
  // msg_r($attributes);

  // Example: don't allow in users with no homeDirectory set.
  // return isset($attributes['homeDirectory'][0]) && $attributes['homedirectory'][0];

  return TRUE;
}

