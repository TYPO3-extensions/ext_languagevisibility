<?php

if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

	// Extension and tables for which to generate a new visibility element type.
	// Each of them must have a corresponding alias defined in extension setup template.
$extensions = array(
	'news' => array(
		'tx_news_domain_model_news',
		'tx_news_domain_model_media'
	)
);

	// register visibility-element factory class to language visibility hook
foreach($extensions as $extension => $tables) {
	if (t3lib_extMgm::isLoaded($extension)) {
		foreach($tables as $table) {
			$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['languagevisibility']['getElementForTable'][$table] = 'EXT:'.$_EXTKEY.'/Classes/Service/ElementFactory.php:&Tx_ExtLanguagevisibility_Service_ElementFactory';
		}
	}
}

unset($extensions);

	// atm not implemented
//$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['languagevisibility']['getDefaultVisibilityForElement'][$_EXTKEY] = 'EXT:'.$_EXTKEY.'/Classes/Service/Visibility.php:&Tx_ExtLanguagevisibility_Service_Visibility';
