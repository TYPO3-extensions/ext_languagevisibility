<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "ext_languagevisibility".
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array(
	'title' => 'Language visibility for extensions',
	'description' => 'Adds language visibility support for some widely used extensions.',
	'category' => 'fe',
	'author' => 'Chetan Thapliyal',
	'author_email' => 'dev@aoe.com',
	'shy' => '',
	'dependencies' => 'extbase,languagevisibility',
	'conflicts' => '',
	'priority' => '',
	'module' => '',
	'state' => 'beta',
	'internal' => '',
	'uploadfolder' => 0,
	'createDirs' => '',
	'modify_tables' => 'tx_news_domain_model_news,tx_news_domain_model_media',
	'clearCacheOnLoad' => 0,
	'lockType' => '',
	'author_company' => '',
	'version' => '2.0.0',
	'constraints' => array(
		'depends' => array(
			'typo3' => '6.2.0-0.0.0',
			'extbase' => '',
			'languagevisibility' => '0.9',
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
	'_md5_values_when_last_written' => '',
);
