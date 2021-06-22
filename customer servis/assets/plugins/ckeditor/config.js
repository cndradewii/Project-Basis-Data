/**
 * @license Copyright (c) 2003-2014, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	
	config.toolbarGroups = [
	{ name: 'styles' },
	{ name: 'colors' },
	{ name: 'basicstyles', groups: [ 'basicstyles' ] },
	{ name: 'paragraph', groups: [ 'align', 'list', 'undo' ] },
	{ name: 'links' },
	{ name: 'insert' },
	{ name: 'tools', item: [ 'Maximize'] },
	{ name: 'sourcearea', groups: [ 'mode', 'resize' ] },
	];
	
	config.removeButtons = 'Subscript,Superscript';
	
	// config.toolbarGroups = [
	// { name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
	// { name: 'editing', groups: [ 'find', 'selection', 'spellchecker' ] },
	// { name: 'links' },
	// { name: 'insert' },
	// { name: 'forms' },
	// { name: 'tools' },
	// { name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
	// { name: 'others' },
	// '/',
	// { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
	// { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
	// { name: 'styles' },
	// { name: 'colors' }
	// ];
	 
	// // Remove some buttons, provided by the standard plugins, which we don't
	// // need to have in the Standard(s) toolbar.
	// config.removeButtons = 'Underline,Subscript,Superscript';
	 
	// // Se the most common block elements.
	// config.format_tags = 'p;h1;h2;h3;pre';
	 
	// // Make dialogs simpler.
	// config.removeDialogTabs = 'image:advanced;link:advanced';

};
