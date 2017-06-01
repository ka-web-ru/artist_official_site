<?php $APPLICATION->IncludeComponent('olof:iblock.element.view', 'news', [
	'element_id' => $arResult['params']['ELEMENT_CODE']
]) ?>

<?php $APPLICATION->IncludeComponent('olof:arteast.service.category.view', '', [
	'element_id' => $arResult['params']['ELEMENT_CODE']
]) ?>


<div class="container">
	<a href="/news/">Возврат к списку</a>
</div>
