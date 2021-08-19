CKEDITOR.plugins.addExternal('ckawesome', '/ckeditor/plugins/ckawesome/plugin.js');
CKEDITOR.plugins.addExternal('colordialog', '/ckeditor/plugins/colordialog/plugin.js');
CKEDITOR.plugins.addExternal('html5video', '/ckeditor/plugins/html5video/plugin.js');
CKEDITOR.plugins.addExternal('html5audio', '/ckeditor/plugins/html5audio/plugin.js');
CKEDITOR.plugins.addExternal('widget', '/ckeditor/plugins/widget/plugin.js');
CKEDITOR.plugins.addExternal('clipboard', '/ckeditor/plugins/clipboard/plugin.js');
CKEDITOR.plugins.addExternal('lineutils', '/ckeditor/plugins/lineutils/plugin.js');
CKEDITOR.plugins.addExternal('widgetselection', '/ckeditor/plugins/widgetselection/plugin.js');
CKEDITOR.plugins.addExternal('notification', '/ckeditor/plugins/notification/plugin.js');
CKEDITOR.plugins.addExternal('toolbar', '/ckeditor/plugins/toolbar/plugin.js');
CKEDITOR.plugins.addExternal('button', '/ckeditor/plugins/button/plugin.js');
CKEDITOR.plugins.addExternal('uploadfile', '/ckeditor/plugins/uploadfile/plugin.js');
CKEDITOR.plugins.addExternal('uploadwidget', '/ckeditor/plugins/uploadwidget/plugin.js');
CKEDITOR.plugins.addExternal('notificationaggregator', '/ckeditor/plugins/notificationaggregator/plugin.js');
CKEDITOR.plugins.addExternal('filetools', '/ckeditor/plugins/filetools/plugin.js');
CKEDITOR.plugins.addExternal('link', '/ckeditor/plugins/link/plugin.js');
CKEDITOR.plugins.addExternal('dialog', '/ckeditor/plugins/dialog/plugin.js');
CKEDITOR.plugins.addExternal('dialogui', '/ckeditor/plugins/dialogui/plugin.js');
CKEDITOR.plugins.addExternal('fakeobjects', '/ckeditor/plugins/fakeobjects/plugin.js');
CKEDITOR.plugins.addExternal('accordionList', '/ckeditor/plugins/accordionList/plugin.js');
CKEDITOR.plugins.addExternal('collapsibleItem', '/ckeditor/plugins/collapsibleItem/plugin.js');
CKEDITOR.plugins.addExternal('pre', '/ckeditor/plugins/pre/plugin.js');
CKEDITOR.plugins.addExternal('bootstrapTabs', '/ckeditor/plugins/bootstrapTabs/', 'plugin.js' );
CKEDITOR.plugins.addExternal('youtube', '/ckeditor/plugins/youtube/', 'plugin.js' );
CKEDITOR.plugins.addExternal('ckeditor_wiris', 'https://ckeditor.com/docs/ckeditor4/4.16.1/examples/assets/plugins/ckeditor_wiris/', 'plugin.js');


CKEDITOR.editorConfig = function(config){
	config.language = 'ru';
	config.extraPlugins = 'ckawesome,colordialog,html5video,html5audio,widget,clipboard,lineutils,widgetselection,notification,toolbar,button,link,filetools,notificationaggregator,dialog,dialogui,fakeobjects,accordionList,collapsibleItem,pre,bootstrapTabs,youtube,ckeditor_wiris';
};
