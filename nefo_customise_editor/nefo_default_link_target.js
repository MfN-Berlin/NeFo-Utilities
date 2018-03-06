/**
 * @file
 * 
 * @see https://www.drupal.org/node/1313162#comment-5132212
 */

/**
 * Register a placeholder plugin so CKEditor won't complain.
 */
CKEDITOR.plugins.add('default_target', {
  requires: ['link'],
  init: function(editor) {
    // The plugin itself doesn't actually do anything, but having it is a
    // convenient way to load the file. The only downside is that our event
    // handler will be registered even if the requirements aren't fulfilled,
    // but it won't cause problems. We could of course do all kinds of
    // things here of we wanted.
  }
});

/**
 * Hook into dialog creation to set our override.
 */
CKEDITOR.on('dialogDefinition', function(ev) {
  var dialogName = ev.data.name, dialogDefinition = ev.data.definition;
  if (dialogName == 'link') {
    // Simulate FCKConfig.DefaultLinkTarget.
    var targetTab = dialogDefinition.getContents('target');
    var targetField = targetTab.get('linkTargetType');
    // Fetch the actual value from the emulated FCKeditor setting, default value set at bottom of file.
    targetField['default'] = ev.editor.config.DefaultLinkTarget;
    var oldSetup = targetField.setup;
    targetField.setup = function(data) {
      targetField.onChange.call(this);
      if (oldSetup) {
        oldSetup.call(this, data);
      }
    }

    // New default value for the CSS Class field
    var secondTargetTab = dialogDefinition.getContents('advanced');
    var secondTargetField = secondTargetTab.get('advCSSClasses');
    secondTargetField['default'] = ev.editor.config.DefaultLinkCSSClass;
  }
});

// Sets the default config value to _blank.
// Individual instances can override it as with any other setting.
CKEDITOR.config.DefaultLinkTarget = '_blank';

// Sets the default config value to 'Colorbox'.
// Individual instances can override it as with any other setting.
//CKEDITOR.config.DefaultLinkCSSClass = 'Colorbox';
