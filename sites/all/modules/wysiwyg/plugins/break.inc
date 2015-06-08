<?php
// $Id: sites/all/modules/wysiwyg/plugins/break.inc 1.3 2010/02/18 15:02:29EST Linda M. Williams (WILLIAMSLM) Production  $

/**
 * @file
 * Wysiwyg API integration on behalf of Node module.
 */

/**
 * Implementation of hook_wysiwyg_plugin().
 */
function wysiwyg_break_plugin() {
  $plugins['break'] = array(
    'title' => t('Teaser break'),
    'vendor url' => 'http://drupal.org/project/wysiwyg',
    'icon file' => 'break.gif',
    'icon title' => t('Separate the teaser and body of this content'),
    'settings' => array(),
  );
  return $plugins;
}

