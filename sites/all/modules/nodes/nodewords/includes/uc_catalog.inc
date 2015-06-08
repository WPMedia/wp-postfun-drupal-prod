<?php
// $Id: sites/all/modules/nodes/nodewords/includes/uc_catalog.inc 1.1 2010/10/13 11:53:13EDT Linda M. Williams (WILLIAMSLM) Production  $

/**
 * @file
 * Integration file for uc_catalog.module.
 */

/**
 * @addtogroup nodewords
 * @{
 */

/**
 * Implements hook_nodewords_type_id().
 */
function uc_catalog_nodewords_type_id($arg) {
  if ($arg[0] == 'catalog') {
    if (isset($arg[1]) && is_numeric($arg[1])) {
      return array(NODEWORDS_TYPE_TERM, array($arg[1]));
    }
  }
}

/**
 * @} End of "addtogroup nodewords".
 */
