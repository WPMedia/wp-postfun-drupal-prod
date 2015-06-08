<?php
// $Id: sites/all/modules/nodes/nodewords/includes/tracker.inc 1.1 2010/10/13 11:53:12EDT Linda M. Williams (WILLIAMSLM) Production  $

/**
 * @file
 * Integration file for tracker.module.
 */

/**
 * @addtogroup nodewords
 * @{
 */

/**
 * Implements hook_nodewords_type_id().
 */
function tracker_nodewords_type_id($arg) {
  if ($arg[0] == 'tracker') {
    return array(NODEWORDS_TYPE_TRACKER, array(0));
  }
}

/**
 * @} End of "addtogroup nodewords".
 */
