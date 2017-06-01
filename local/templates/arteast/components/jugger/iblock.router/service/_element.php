<?php

use \Bitrix\Iblock\ElementTable;

$element = ElementTable::GetRow([
	'filter' => [
		'CODE' => $arResult['params']['ELEMENT_CODE']
	]
]);


?>

<style media="screen">
	.serivce-desc,
	.service-desc__text {
    padding-bottom: 2rem;
	}

	.serivce-title,
	.service-desc__title {
		font-size: 2rem;
    padding: 1rem 0 2rem;
	}
</style>


<div class="container">
	<div class="service-desc__container">
		<h3 class="service-desc__title">
			<?= $element['NAME'] ?>
		</h3>
		<div class="service-desc__text">
			<?= $element['DETAIL_TEXT'] ?>
		</div>
	</div>
</div>

<div class="container">
	<h1 class="serivce-title">Кейсы</h1>

</div>
<?php $APPLICATION->IncludeComponent('olof:iblock.section.view', 'in_service', [
  'section_id' => $element['ID'],
	'iblock_id' => 7
]) ?>

<div class="container">
	<h1 class="serivce-title">Калькулятор</h1>
	<div class="serivce-desc">
		coming soon
	</div>
</div>

<div class="container">
	<h1 class="serivce-title">Оформить заказ</h1>
	<div class="row">
		<div class="col-md-6">
			<div class="service-custom-option__container">

				<div class="form-group service-custom-option__item hidden">
					<label>
						Скрытое свойство
					</label>
					<input class="form-control" type="text" name="" value="uytr">
				</div>

				<div class="form-group service-custom-option__item">
					<label>
						Свойство связанное с текущей услугой
					</label>
					<select class="form-control">
					  <option>1</option>
					  <option>2</option>
					  <option>3</option>
					  <option>4</option>
					  <option value='five'>5</option>
					</select>
				</div>

				<div class="form-group service-custom-option__item">
					<label>
						Свойство связанное с текущей услугой 1
					</label>
					<input class="form-control" type="text" name="" value="">
				</div>

			</div>
			<hr>
			<script type="text/javascript">
				$(document).ready(function() {
					$(".service-custom-option__container").on('change', function(e) {
						let custom_option_values = [];
						$('.service-custom-option__container .service-custom-option__item').each(function(_, item) {
							let label = $(item).find('label').text().trim()
							let value = $(item).find('.form-control').val()
							if (label && value) {
								custom_option_values.push([label, value])
							}
						})

						$('label:contains("Комментарий") + textarea').text(custom_option_values.map(v => v.join(': ')).join('\n'))

					})
				})

			</script>
			<?$APPLICATION->IncludeComponent(
				"bitrix:form.result.new",
				"",
				Array(
					"CACHE_TIME" => "3600",
					"CACHE_TYPE" => "A",
					"CHAIN_ITEM_LINK" => "",
					"CHAIN_ITEM_TEXT" => "",
					"EDIT_URL" => "",
					"IGNORE_CUSTOM_TEMPLATE" => "N",
					"LIST_URL" => "",
					"SEF_MODE" => "N",
					"SUCCESS_URL" => "",
					"USE_EXTENDED_ERRORS" => "N",
					"VARIABLE_ALIASES" => Array("RESULT_ID"=>"RESULT_ID","WEB_FORM_ID"=>"WEB_FORM_ID"),
					"WEB_FORM_ID" => 1
				)
			);?>
		</div>
	</div>

</div>
