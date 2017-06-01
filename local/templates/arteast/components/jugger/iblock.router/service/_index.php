<?php

use \Bitrix\Iblock\IblockTable;
use \Bitrix\Iblock\ElementTable;

$iblocks = IblockTable::GetList([
	'select' => [
		'NAME', 'CODE', 'ID'
	],
	'filter' => [
		'IBLOCK_TYPE_ID' => 'serivce'
	]
])->fetchAll();

$iblocks = array_map(function($item) {
	$item['elements'] = ElementTable::GetList([
		'select' => [
			'NAME', 'CODE', 'ID'
		],
		'filter' => [
			'IBLOCK_ID' => $item['ID']
		]
	])->fetchAll();
	return $item;
}, $iblocks);

shuffle($iblocks);
?>

<style media="screen">
	.service-list-item__container ul {
  	padding-left: 1rem;
	}

	.service-list__container {
		display: flex;
		flex-wrap: wrap;
		padding: 1rem 0;
	}

	.service-list-item__container {
		border: 1px solid hsla(0, 0%, 95%, 1);
		margin-top: -1px;
		margin-left: -1px;
		padding: 1rem;
	}

	.service-list-item__title {
    padding-bottom: 1rem;
		font-weight:bold;
	}

	.service-list-item__image {
    text-align: center;
	}
</style>

<div class="container">
	<div class="row service-list__container">
	<?php foreach ($iblocks as $iblock): ?>
		<div class="col-md-6 col-sm-12 service-list-item__container">
			<div class="col-md-4">
				<div class="service-list-item__image">
					<img src="https://digital.aspro-demo.ru/upload/iblock/bc1/bc1399317519cd13a339e1f53c046416.jpg">
				</div>
			</div>
			<div class="col-md-8">
				<div class="service-list-item__title"><?= $iblock['NAME'] ?></div>
				<ul>
					<?php foreach ($iblock['elements'] as $value): ?>
						<li>
							<a href="/service/<?= $value['CODE'] ?>/"><?= $value['NAME'] ?></a>

						</li>
					<?php endforeach; ?>
				</ul>
			</div>

		</div>
	<?php endforeach; ?>

	</div>
</div>
