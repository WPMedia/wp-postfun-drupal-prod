<?php
// $Id: sites/all/modules/wysiwyg/editors/wymeditor.inc 1.3 2010/02/18 15:02:28EST Linda M. Williams (WILLIAMSLM) Production  $

/**
 * @file
 * Editor integration functions for WYMeditor.
 */

/**
 * Plugin implementation of hook_editor().
 */
function wysiwyg_wymeditor_editor() {
  $editor['wymeditor'] = array(
    'title' => 'WYMeditor',
    'vendor url' => 'http://www.wymeditor.org/',
    'download url' => 'http://www.wymeditor.org/download/',
    'library path' => wysiwyg_get_path('wymeditor/wymeditor'),
    'libraries' => array(
      'min' => array(
        'title' => 'Minified',
        'files' => array('jquery.wymeditor.min.js'),
      ),
      'pack' => array(
        'title' => 'Packed',
        'files' => array('jquery.wymeditor.pack.js'),
      ),
      'src' => array(
        'title' => 'Source',
        'files' => array('jquery.wymeditor.js'),
      ),
    ),
    'version callback' => 'wysiwyg_wymeditor_version',
    'themes callback' => 'wysiwyg_wymeditor_themes',
    'settings callback' => 'wysiwyg_wymeditor_settings',
    'versions' => array(
      '0.5-rc1' => array(
        'js files' => array('wymeditor.js'),
      ),
    ),
  );
  return $editor;
}

/**
 * Detect editor version.
 *
 * @param $editor
 *   An array containing editor properties as returned from hook_editor().
 *
 * @return
 *   The installed editor version.
 */
function wysiwyg_wymeditor_version($editor) {
  $script = $editor['library path'] . '/jquery.wymeditor.js';
  $script = fopen($script, 'r');
  fgets($script);
  $line = fgets($script);
  if (preg_match('@version\s+([0-9a-z\.-]+)@', $line, $version)) {
    fclose($script);
    return $version[1];
  }
  fclose($script);
}

/**
 * Determine available editor themes or check/reset a given one.
 *
 * @param $editor
 *   A processed hook_editor() array of editor properties.
 * @param $profile
 *   A wysiwyg editor profile.
 *
 * @return
 *   An array of theme names. The first returned name should be the default
 *   theme name.
 */
function wysiwyg_wymeditor_themes($editor, $profile) {
  return array('compact', 'default', 'minimal', 'silver', 'twopanels');
}

/**
 * Return runtime editor settings for a given wysiwyg profile.
 *
 * @param $editor
 *   A processed hook_editor() array of editor properties.
 * @param $config
 *   An array containing wysiwyg editor profile settings.
 * @param $theme
 *   The name of a theme/GUI/skin to use.
 *
 * @return
 *   A settings array to be populated in
 *   Drupal.settings.wysiwyg.configs.{editor}
 */
function wysiwyg_wymeditor_settings($editor, $config, $theme) {
  // @todo Setup $library in wysiwyg_load_editor() already.
  $library = (isset($editor['library']) ? $editor['library'] : key($editor['libraries']));
  $settings = array(
    'basePath' => base_path() . $editor['library path'] . '/',
    'wymPath' => $editor['libraries'][$library]['files'][0],
    // @todo Does not work in Drupal; jQuery can live anywhere.
    'jQueryPath' => base_path() . 'misc/jquery.js',
    'updateSelector' => '.form-submit',
    'skin' => $theme,
  );

  if (isset($config['language'])) {
    $settings['lang'] = $config['language'];
  }

  if (isset($config['block_formats'])) {
    $containers = array(
      'p' => 'Paragraph',
      'h1' => 'Heading_1',
      'h2' => 'Heading_2',
      'h3' => 'Heading_3',
      'h4' => 'Heading_4',
      'h5' => 'Heading_5',
      'h6' => 'Heading_6',
      'pre' => 'Preformatted',
      'blockquote' => 'Blockquote',
      'th' => 'Table_Header',
    );
    foreach (explode(',', $config['block_formats']) as $tag) {
      if (isset($containers[$tag])) {
        $settings['containersItems'][] = array(
          'name' => strtoupper($tag),
          'title' => $containers[$tag],
          'css' => 'wym_containers_' . $tag,
        );
      }
    }
  }

  if (isset($config['css_setting'])) {
    if ($config['css_setting'] == 'theme') {
      // WYMeditor only supports one CSS file currently.
      $settings['stylesheet'] = reset(wysiwyg_get_css());
    }
    else if ($config['css_setting'] == 'self' && isset($config['css_path'])) {
      $settings['stylesheet'] = strtr($config['css_path'], array('%b' => base_path(), '%t' => path_to_theme()));
    }
  }

  return $settings;
}

