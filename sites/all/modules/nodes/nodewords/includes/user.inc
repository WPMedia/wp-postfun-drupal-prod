<?php
// $Id: sites/all/modules/nodes/nodewords/includes/user.inc 1.1 2010/10/13 11:53:13EDT Linda M. Williams (WILLIAMSLM) Production  $

/**
 * @file
 * Integration file for user.module.
 */

/**
 * @addtogroup nodewords
 * @{
 */

/**
 * Implements hook_nodewords_type_id().
 */
function user_nodewords_type_id($arg) {
  if ($arg[0] == 'user') {
    // User page paths: user/$uid.
    if (isset($arg[1]) && is_numeric($arg[1])) {
      if (isset($arg[2]) && $arg[2] == 'track') {
        return array(NODEWORDS_TYPE_TRACKER, array(0));
      }

      return array(NODEWORDS_TYPE_USER, array($arg[1]));
    }
  }
}

/**
 * @} End of "addtogroup nodewords".
 */
