<?php

if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$langVisibilityColumn = array (
	'tx_languagevisibility_visibility' => Array (
		'exclude' => 1,
		'label' => 'LLL:EXT:languagevisibility/locallang_db.xml:tt_content.tx_languagevisibility_visibility',
		'config' => Array (
			'type' => 'user',
			'size' => '30',
			'userFunc' => 'tx_languagevisibility_fieldvisibility->user_fieldvisibility',
		)
	)
);

	// extensions and tables that should have language visibility support
$extensions = array(
	'news' => array(
		'tx_news_domain_model_news',
		'tx_news_domain_model_media'
	)
);

	// add tca configuration for visibility column in tables
foreach($extensions as $extension => $tables) {
	if (t3lib_extMgm::isLoaded($extension)) {
		foreach($tables as $table) {
			t3lib_div::loadTCA($table);
			t3lib_extMgm::addTCAcolumns($table, $langVisibilityColumn, 1);
			t3lib_extMgm::addToAllTCAtypes($table, '--div--;LLL:EXT:languagevisibility/locallang_db.xml:tabname,tx_languagevisibility_visibility;;;;1-1-1');
		}
	}
}
