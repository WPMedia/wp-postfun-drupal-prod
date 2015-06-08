// $Id: sites/all/modules/wysiwyg/editors/js/wymeditor.js 1.3 2010/02/18 15:02:20EST Linda M. Williams (WILLIAMSLM) Production  $

/**
 * Attach this editor to a target element.
 */
Drupal.wysiwyg.editor.attach.wymeditor = function(context, params, settings) {
  // Prepend basePath to wymPath.
  settings.wymPath = settings.basePath + settings.wymPath;
  // Attach editor.
  $('#' + params.field).wymeditor(settings);
};

/**
 * Detach a single or all editors.
 */
Drupal.wysiwyg.editor.detach.wymeditor = function(context, params) {
  if (typeof params != 'undefined') {
    var $field = $('#' + params.field);
    var index = $field.data(WYMeditor.WYM_INDEX);
    if (typeof index != 'undefined') {
      var instance = WYMeditor.INSTANCES[index];
      instance.update();
      $(instance._box).remove();
      $(instance._element).show();
      delete instance;
    }
    $field.show();
  }
  else {
    jQuery.each(WYMeditor.INSTANCES, function() {
      this.update();
      $(this._box).remove();
      $(this._element).show();
      delete this;
    });
  }
};

