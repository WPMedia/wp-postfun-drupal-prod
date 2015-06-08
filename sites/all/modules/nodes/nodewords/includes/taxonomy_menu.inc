<?php
// $Id: sites/all/modules/nodes/nodewords/includes/taxonomy_menu.inc 1.1 2010/10/13 11:53:11EDT Linda M. Williams (WILLIAMSLM) Production  $

/**
 * @file
 * Integration file for taxonomy_menu.module.
 */

/**
 * @addtogroup nodewords
 * @{
 */

/**
 * Implements hook_nodewords_type_id().
 */
function taxonomy_menu_nodewords_type_id($arg) {
  if ($arg[0] == 'taxonomy_menu') {
    // Taxonomy menu paths: taxonomy_menu/$vid, taxonomy_menu/$vid/$tid.
    if (isset($arg[2]) && is_numeric($arg[2])) {
      return array(NODEWORDS_TYPE_TERM, array($arg[2]));
    }
    elseif (isset($arg[1]) && is_numeric($arg[1])) {
      return array(NODEWORDS_TYPE_VOCABULARY, array($arg[1]));
    }
  }
}

/**
 * @} End of "addtogroup nodewords".
 */
