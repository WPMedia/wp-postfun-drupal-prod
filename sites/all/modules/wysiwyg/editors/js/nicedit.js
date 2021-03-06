// $Id: sites/all/modules/wysiwyg/editors/js/nicedit.js 1.3 2010/02/18 15:02:16EST Linda M. Williams (WILLIAMSLM) Production  $

/**
 * Attach this editor to a target element.
 */
Drupal.wysiwyg.editor.attach.nicedit = function(context, params, settings) {
  // Attach editor.
  var editor = new nicEditor(settings);
  editor.panelInstance(params.field);
};

/**
 * Detach a single or all editors.
 *
 * See Drupal.wysiwyg.editor.detach.none() for a full desciption of this hook.
 */
Drupal.wysiwyg.editor.detach.nicedit = function(context, params) {
  if (typeof params != 'undefined') {
    var instance = nicEditors.findEditor(params.field);
    if (instance) {
      instance.ne.removeInstance(params.field);
      instance.ne.removePanel();
    }
  }
  else {
    for (var e in nicEditors.editors) {
      // Save contents of all editors back into textareas.
      var instances = nicEditors.editors[e].nicInstances;
      for (var i = 0; i < instances.length; i++) {	
        instances[i].remove();
      }
      // Remove all editor instances.
      nicEditors.editors[e].nicInstances = [];
    }
  }
};

