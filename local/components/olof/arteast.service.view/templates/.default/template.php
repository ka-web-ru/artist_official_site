<?php $services = $component->getServiceList($arParams['element_id']) ?>

<?php if ($services): ?>
	<div class="container">
		<h3>Список услуг</h3>
		<ul>
			<?php foreach ($services as $service): ?>
				<li>
					<a href="<?= \jugger\bitrix\iblock\Url::getElementUrlById($service['ID']) ?>">
						<?= $service['NAME'] ?>
					</a>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
<?php endif; ?>
