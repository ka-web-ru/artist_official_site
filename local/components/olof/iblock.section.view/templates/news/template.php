<?php

$items = $component->getItemsByIblockId($arParams['iblock_id']);
?>

<?php foreach ($items as $value): ?>
	<?php
	$value['img'] = CFile::GetPath($value['PREVIEW_PICTURE']);
	$value['url'] = "/news/{$value['ID']}/";
	$value['tags'] = Bitrix\Iblock\ElementTable::GetList([
		'select' => ['NAME'],
		'filter' => [
			'news_tag_prop.IBLOCK_ELEMENT_ID' => $value['ID']
		],
		'runtime' => [
			new \Bitrix\Main\Entity\ReferenceField('news_tag_prop', 'Bitrix\Iblock\ElementPropertyTable', [
				'=this.ID' => 'ref.VALUE',
				'@ref.IBLOCK_PROPERTY_ID' => new \Bitrix\Main\DB\SqlExpression(\Bitrix\Iblock\PropertyTable::Query()->addFilter('CODE', 'service')->setSelect(['ID'])->getQuery())
			])
		]
	])->fetchAll();
	?>
	<div class="news-item__container">
		<div class="row">
			<div class="col-md-3" style="padding-left: 2rem">
				<a href="<?= $value['url'] ?>">
					<?php if ($value['img']): ?>
						<div class="news-item__img" style="background-image: url(<?= $value['img'] ?>);"></div>
					<?php else: ?>
						<div class="news-item__img no-image"></div>
					<?php endif; ?>
				</a>
			</div>
			<div class="col-md-9">
				<h3 class="news-item__title">
					<a class="news-item__href" href="<?= $value['url'] ?>">
						<?= $value['NAME'] ?>
					</a>
				</h3>
				<?php if ($value['tags']): ?>
					<div class="news-item__labels">
						<?php foreach ($value['tags'] as $tag): ?>
							<span class="label label-arteast"><?= $tag['NAME'] ?></span>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>
				<div class="news-item__desc">
					<?= $value['PREVIEW_TEXT'] ?>
				</div>
			</div>
		</div>


	</div>
<?php endforeach; ?>
