<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Услуги");
?>

<div style="clear:both"></div>
<?php

$APPLICATION->IncludeComponent("jugger:iblock.router", "news", [
		'baseUrl' => '/news1',
		'actions' => [
			'_index' => 'index.php',
			'_element' => '#ELEMENT_CODE#/',
		]
]);

?>



<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
