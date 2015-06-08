// $Id: sites/all/modules/wysiwyg/editors/js/markitup.js 1.3 2010/02/18 15:02:15EST Linda M. Williams (WILLIAMSLM) Production  $

/**
 * Attach this editor to a target element.
 */
Drupal.wysiwyg.editor.attach.markitup = function(context, params, settings) {
  $('#' + params.field, context).markItUp(settings);

  // Adjust CSS for editor buttons.
  $.each(settings.markupSet, function (button) {
    $('.' + settings.nameSpace + ' .' + this.className + ' a')
      .css({ backgroundImage: 'url(' + settings.root + 'sets/default/images/' + button + '.png' + ')' })
      .parents('li').css({ backgroundImage: 'none' });
  });
};

/**
 * Detach a single or all editors.
 */
Drupal.wysiwyg.editor.detach.markitup = function(context, params) {
  if (typeof params != 'undefined') {
    $('#' + params.field, context).markItUpRemove();
  }
  else {
    $('.markItUpEditor', context).markItUpRemove();
  }
};

