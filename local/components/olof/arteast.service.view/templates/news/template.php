<?php $services = $component->getServiceList($arParams['element_id']) ?>

<?php if ($services): ?>
	<ul class="list-inline">
		<?php foreach ($services as $service): ?>
			<li>
				<a class="news-element-tags__href" href="<?= \jugger\bitrix\iblock\Url::getElementUrlById($service['ID']) ?>">
					<?= $service['NAME'] ?>
				</a>
			</li>
		<?php endforeach; ?>
	</ul>
<?php endif; ?>
