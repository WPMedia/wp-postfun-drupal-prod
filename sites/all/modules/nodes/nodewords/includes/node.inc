<?php
// $Id: sites/all/modules/nodes/nodewords/includes/node.inc 1.1 2010/10/13 11:53:10EDT Linda M. Williams (WILLIAMSLM) Production  $

/**
 * @file
 * Integration file for node.module.
 */

/**
 * @addtogroup nodewords
 * @{
 */

/**
 * Implements hook_nodewords_type_id().
 */
function node_nodewords_type_id($arg) {
  if ($arg[0] == 'node') {
    // Node paths: node/$nid.
    if (isset($arg[1]) && is_numeric($arg[1])) {
      if (!($node = menu_get_object())) {
        return array(NODEWORDS_TYPE_NONE, 0);
      }

      $bool = (
        (
          $node->type == 'poll' &&
          isset($arg[2]) &&
          in_array($arg[2], array('edit', 'results'))
        ) ||
        !isset($arg[2])
      );

      if ($bool) {
        return array(NODEWORDS_TYPE_NODE, array($node->nid));
      }
    }
  }
}

/**
 * @} End of "addtogroup nodewords".
 */
