<?php

$filter = [
  '=IBLOCK_ID' => $arParams['iblock_id']
];

if ($_GET['service_id']) {
	$filter['=service.VALUE'] = $_GET['service_id'];
}


$elements = $component->getItems([
	'filter' => $filter
]);

$sections = \Bitrix\Iblock\ElementPropertyTable::GetList([
	'select' => [
		'VALUE',
		new \Bitrix\Main\Entity\ExpressionField('cnt', 'COUNT(VALUE)'),
		'name' => 'service_name.NAME',
	],
	'filter' => [
		'IBLOCK_PROPERTY_ID' => 2
	],
	'group' => [
		'VALUE'
	],
	'runtime' => [
		new \Bitrix\Main\Entity\ReferenceField('service_name', 'Bitrix\Iblock\ElementTable', [
			'=this.VALUE' => 'ref.ID'
		])
	]
])->fetchAll();

array_unshift($sections, [
	'VALUE' => '',
	'name' => 'Все',
	'cnt' => array_reduce($sections, function($acc, $item) { return $acc + $item['cnt']; }, 0)
]);

?>



<div class="project__container">
	<div class="container">
		<div class="project__filter">
			<ul class="list-inline">
				<?php foreach ($sections as $value): ?>
					<li>
						<? /*
						<!-- <a href="/portfolio/?service_id=<?= $value['VALUE'] ?>" <?php
							if ($value['VALUE']) echo 'data-filter=".service-' . $value['VALUE'] . '"';
						?>><?= $value['name'] ?> ( <?= $value['cnt'] ?> )</a> -->
						*/ ?>
						<div class="project-filter__item" <?php
							if ($value['VALUE']) echo 'data-filter=".service-' . $value['VALUE'] . '"';
						 ?>>
							<?= $value['name'] ?> ( <?= $value['cnt'] ?> )
						</div>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>
	<style media="screen">
		.project-item__background img {
			display: none;
		}
	</style>
	<div class="project-items__container">
  <?php foreach ($elements as $element):
		$file_size = CFile::GetFileArray($element['PREVIEW_PICTURE']);
		$block_size = floor($file_size['WIDTH'] / $file_size['HEIGHT']) + 1;
		$url = "/portfolio/{$element['ID']}/";

		$section_classes = join(' ', array_map(function($item) {
			return 'service-' . $item;
		}, $component->getSectionIdByElement($element['ID'])));
	?>
  <a class="link-invisible" href="<?= $url ?>">
    <div class="project-item__container <?= 's' . $block_size ?> <?= $section_classes ?>">
      <div class="project-item__background" style="background-image: url(<?= CFile::GetPath($element['PREVIEW_PICTURE']) ?>)">
      	<img src="<?= CFile::GetPath($element['PREVIEW_PICTURE']) ?>" alt="">
      </div>
      <div class="project-item-name__container">
        <div class="project-item-name__text">
          <?= $element['NAME'] ?>
        </div>
      </div>
      <div class="project-item-text__container">
        <div class="project-item-text__text">
          <?= $element['PREVIEW_TEXT'] ?>
        </div>
      </div>
    </div>
  </a>
  <?php endforeach; ?>
	</div>
</div>
<div style="clear:both"></div>

<script type="text/javascript">
	$(function() {
// return
		var freewall_animate = true;

		wall = new Freewall(".project-items__container");
		wall.reset({
			selector: '.project-item__container',
			animate: freewall_animate,
			cellW: 360 / 2,
			cellH: 500 / 2,
			fixSize: 0,
			gutterY: 0,
			gutterX: 0,
			onResize: function() {
				wall.fitWidth();
			}
		})
		wall.fitWidth();

		$('.project__filter .project-filter__item').first().addClass('active')

		$('.project__filter .project-filter__item').on('click', function() {
			$(".project__filter .project-filter__item").removeClass("active");
			var filter = $(this).addClass('active').data('filter');
			location.replace(!!filter ? "#" + filter : '#')
			if (filter) {
				wall.filter(filter);
			} else {
				wall.unFilter();
			}
		})

		var current = location.hash.slice(1);
		if (current) {
			wall.reset({ animate: false }) // каполучить текущее состояние я не нашел, так что сорян если что то будет работать неочевидно
			$('[data-filter="' + current + '"]').click()
			wall.reset({ animate: freewall_animate })
		}

	});



</script>
