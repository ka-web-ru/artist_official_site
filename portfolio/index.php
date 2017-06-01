<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");


?>


<?php

$APPLICATION->IncludeComponent("jugger:iblock.router", "catalog", [
    'baseUrl' => '/portfolio',
	'actions' => [
		'_index' => 'index.php',
		'_element' => '#ELEMENT_ID#/',
	]
]);

?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
