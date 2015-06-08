/**
 * $Id: sites/all/libraries/tinymce/jscripts/tiny_mce/plugins/autosave/editor_plugin_src.js 1.3 2010/02/18 14:48:38EST Linda M. Williams (WILLIAMSLM) Production  $
 *
 * @author Moxiecode
 * @copyright Copyright © 2004-2008, Moxiecode Systems AB, All rights reserved.
 */

(function() {
	tinymce.create('tinymce.plugins.AutoSavePlugin', {
		init : function(ed, url) {
			var t = this;

			t.editor = ed;

			window.onbeforeunload = tinymce.plugins.AutoSavePlugin._beforeUnloadHandler;
		},

		getInfo : function() {
			return {
				longname : 'Auto save',
				author : 'Moxiecode Systems AB',
				authorurl : 'http://tinymce.moxiecode.com',
				infourl : 'http://wiki.moxiecode.com/index.php/TinyMCE:Plugins/autosave',
				version : tinymce.majorVersion + "." + tinymce.minorVersion
			};
		},

		// Private plugin internal methods

		'static' : {
			_beforeUnloadHandler : function() {
				var msg;

				tinymce.each(tinyMCE.editors, function(ed) {
					if (ed.getParam("fullscreen_is_enabled"))
						return;

					if (ed.isDirty()) {
						msg = ed.getLang("autosave.unload_msg");
						return false;
					}
				});

				return msg;
			}
		}
	});

	// Register plugin
	tinymce.PluginManager.add('autosave', tinymce.plugins.AutoSavePlugin);
})();