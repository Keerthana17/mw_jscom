<?php

if ( function_exists( 'wfLoadExtension' ) ) {
	wfLoadExtension( 'JSCom' );
	// Keep i18n globals so mergeMessageFileList.php doesn't break
	$wgMessagesDirs['JSCom'] = __DIR__ . '/i18n';
	$wgExtensionMessagesFiles['JsComAlias'] = __DIR__ . '/JSCom.alias.php';
	$wgExtensionMessagesFiles['JSComNamespaces'] = __DIR__ . '/JSCom.namespaces.php';
	/* wfWarn(
		'Deprecated PHP entry point used for Gadgets extension. Please use wfLoadExtension instead, ' .
		'see https://www.mediawiki.org/wiki/Extension_registration for more details.'
	); */
	return true;
} else {
	die( 'This version of the JS Communicator extension requires MediaWiki 1.25+' );
}
