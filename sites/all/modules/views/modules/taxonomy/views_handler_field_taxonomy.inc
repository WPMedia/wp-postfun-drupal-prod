<?php

/**
 * Field handler to provide simple renderer that allows linking to a taxonomy
 * term.
 *
 * @ingroup views_field_handlers
 */
class views_handler_field_taxonomy extends views_handler_field {
  /**
   * Constructor to provide additional field to add.
   *
   * This constructer assumes the term_data table. If using another
   * table, we'll need to be more specific.
   */
  function construct() {
    parent::construct();
    $this->additional_fields['vid'] = 'vid';
    $this->additional_fields['tid'] = 'tid';
  }

  function option_definition() {
    $options = parent::option_definition();
    $options['link_to_taxonomy'] = array('default' => FALSE);
    $options['convert_spaces'] = array('default' => FALSE);
    return $options;
  }

  /**
   * Provide link to taxonomy option
   */
  function options_form(&$form, &$form_state) {
    parent::options_form($form, $form_state);
    $form['link_to_taxonomy'] = array(
      '#title' => t('Link this field to its taxonomy term page'),
      '#description' => t('This will override any other link you have set.'),
      '#type' => 'checkbox',
      '#default_value' => !empty($this->options['link_to_taxonomy']),
    );
    $form['convert_spaces'] = array(
      '#title' => t('Convert spaces in term names to hyphens'),
      '#description' => t('This allows links to work with Views taxonomy term arguments.'),
      '#type' => 'checkbox',
      '#default_value' => !empty($this->options['convert_spaces']),
    );
  }

  /**
   * Render whatever the data is as a link to the taxonomy.
   *
   * Data should be made XSS safe prior to calling this function.
   */
  function render_link($data, $values) {
    $tid = $this->get_value($values, 'tid');
    if (!empty($this->options['link_to_taxonomy']) && !empty($tid) && $data !== NULL && $data !== '') {
      $term = new stdClass();
      $term->tid = $tid;
      $term->vid = $this->get_value($values, 'vid');
      $this->options['alter']['make_link'] = TRUE;
      $this->options['alter']['path'] = taxonomy_term_path($term);
    }

    if (!empty($this->options['convert_spaces'])) {
      $data = str_replace(' ', '-', $data);
    }

    return $data;
  }

  function render($values) {
    $value = $this->get_value($values);
    return $this->render_link($this->sanitize_value($value), $values);
  }
}
