<?php

// $filter = [
// 	'CODE' => $arResult['params']['ELEMENT_CODE'],
// ];
//
// $model = Bitrix\Iblock\ElementTable::getRow(compact('filter'));
// if (!$model) {
// 	// 404
// 	return;
// }
//
// $template = $arParams['elementTemplate'] ?? $component->getTemplateName();
//
// $params = [
// 	'model' => $model
// ];
//
// $component->getApplication()->includeComponent("jugger:iblock.element.view", $template, $params);
//

?>

<div class="portfolio-item__container">

<?php $APPLICATION->IncludeComponent('olof:iblock.element.view', '', [
		'element_id' => $arResult['params']['ELEMENT_ID']
]) ?>

</div>
