<?php
// $Id: sites/all/modules/themekey/modules/themekey.menu.inc 1.3 2010/02/18 14:55:02EST Linda M. Williams (WILLIAMSLM) Production  $

function themekey_menu_themekey_properties() {
  // Attributes for properties
  $attributes = array();
  $attributes['menu:has_children'] = array('description' => t('Menu: Has Children'));
  $attributes['menu:menu_name'] = array('description' => t('Menu: Menu Name'));
  $attributes['menu:mlid'] = array('description' => t('Menu: Menu Link ID'));

  return array('attributes' => $attributes);
}
