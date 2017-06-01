<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arComponentDescription = 
[
	"NAME" => 'Последние события',
	"DESCRIPTION" => 'Последние события (последние новости, работы, акции)',
	"COMPLEX" => "Y",
	"PATH" => 
	[
		"ID" => "arteast",
		"CHILD" => 
		[
			"ID" => "last",
			"NAME" => "Последние события"
		]
	],
	"ICON" => "/images/icon.gif",
];

?>