<?php
// $Id: sites/all/modules/views_slideshow/views_slideshow_plugin_style_slideshow.inc 1.3 2010/02/18 15:01:37EST Linda M. Williams (WILLIAMSLM) Production  $

// views_slideshow_plugin_style_slideshow.inc
/**
 * @file
 * Contains the list style plugin.
 */

/**
 * Style plugin to render each item in a slideshow of an ordered or unordered list.
 *
 * @ingroup views_style_plugins
 */
class views_slideshow_plugin_style_slideshow extends views_plugin_style_list {
  /**
   * Set default options
   */
  function option_definition() {
    module_load_all_includes('views_slideshow.inc');
    $options = parent::option_definition();

    $options = array_merge($options, module_invoke_all('views_slideshow_option_definition'));

    return $options;
  }

  /**
   * Render the given style.
   */
  function options_form(&$form, &$form_state) {
    module_load_all_includes('views_slideshow.inc');
    parent::options_form($form, $form_state);

    $form['mode'] = array(
      '#type' => 'select',
      '#title' => t('Slideshow mode'),
      '#options' => module_invoke_all('views_slideshow_modes'),
      '#default_value' => $this->options['mode'],
    );
    foreach (module_implements('views_slideshow_options_form') as $module) {
      $function = $module .'_views_slideshow_options_form';
      call_user_func_array($function, array(&$form, &$form_state, &$this));
    }
  }
}
