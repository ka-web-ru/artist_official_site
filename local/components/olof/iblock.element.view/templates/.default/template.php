<?php

$element = $component->getItem($arParams['element_id']);
$humans = $component->getHumans($arParams['element_id']);
$feedback = $component->getFeedback($arParams['element_id']);

?>

<div class="project-detail__cointainer">
	<div class="project-detail__text">
		<?= $element['DETAIL_TEXT'] ?>
	</div>
  <?php if ($humans || $feedback): ?>
    <div class="project-detail-humans__container">
      <div class="container">
				<div class="row">
					<div class="col-md-8">
						<?php $APPLICATION->IncludeComponent('olof:arteast.service.view', 'news', [
							'element_id' => $arParams['element_id']
						]) ?>
						<?php foreach ($humans as $key => $human): ?>
			        <h4 class="project-detail-humans__title"><?= $key ?></h4>
			        <ul class="project-detail-humans__list">
			          <?php foreach ($human as $value): ?>
			            <li>
			              <?= $value ?>
			            </li>
			          <?php endforeach; ?>
			        </ul>
			      <?php endforeach; ?>
					</div>
					<div class="col-md-4">
						<div class="project-detail-humans__feedback">
							<?= $feedback ?>
						</div>
					</div>
				</div>

      </div>
  	</div>
  <?php endif; ?>

</div>

<?php

$service = $component->getServices($element['ID'])[0];
if ($service) {
	$service_link = \jugger\bitrix\iblock\Url::getElementUrlById($service);
} ?>

<?php if ($service_link): ?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="portfolio-item-service_for_me__container">
				<div class="portfolio-item-service_for_me__text">
					Понравилось? <a href="<?= $service_link ?>">Хочу такой же!</a>
				</div>
			</div>
		</div>
	</div>
</div>
<?php endif; ?>
