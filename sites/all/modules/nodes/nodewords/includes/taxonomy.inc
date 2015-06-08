<?php
// $Id: sites/all/modules/nodes/nodewords/includes/taxonomy.inc 1.1 2010/10/13 11:53:10EDT Linda M. Williams (WILLIAMSLM) Production  $

/**
 * @file
 * Integration file for taxonomy.module.
 */

/**
 * @addtogroup nodewords
 * @{
 */

/**
 * Implements hook_nodewords_type_id().
 */
function taxonomy_nodewords_type_id($arg) {
  if ($arg[0] == 'taxonomy') {
    // Taxonomy paths: taxonomy/term/$tid , taxonomy/term/$tid1+$tid2.
    if (isset($arg[1]) && isset($arg[2]) && $arg[1] == 'term') {
      $ids = preg_split('![+, ]!', $arg[2]);

      if (count($ids)) {
        // Verify that $ids contains all numeric values.
        foreach ($ids as $id) {
          if (!is_numeric($id)) {
            return array(NODEWORDS_TYPE_NONE, 0);
          }
        }

        return array(NODEWORDS_TYPE_TERM, $ids);
      }
    }
  }
}

/**
 * @} End of "addtogroup nodewords".
 */
