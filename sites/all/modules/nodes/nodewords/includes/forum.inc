<?php
// $Id: sites/all/modules/nodes/nodewords/includes/forum.inc 1.1 2010/10/13 11:53:08EDT Linda M. Williams (WILLIAMSLM) Production  $

/**
 * @file
 * Integration file for forum.module.
 */

/**
 * @addtogroup nodewords
 * @{
 */

/**
 * Implements hook_nodewords_type_id().
 */
function forum_nodewords_type_id($arg) {
  if ($arg[0] == 'forum') {
    // Forum paths: forum/$tid , forum/.
    if (!isset($arg[1])) {
      return array(NODEWORDS_TYPE_VOCABULARY, array(variable_get('forum_nav_vocabulary', 0)));
    }
    elseif (is_numeric($arg[1])) {
      return array(NODEWORDS_TYPE_TERM, array($arg[1]));
    }
  }
}

/**
 * @} End of "addtogroup nodewords".
 */
