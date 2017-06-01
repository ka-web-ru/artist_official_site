<?php

use \Bitrix\Iblock\ElementTable;
use \Bitrix\Main\Entity\ReferenceField;

$elements = ElementTable::GetList([
		'filter' => [
			'services.VALUE' => $arParams['section_id'],
			'IBLOCK_ID' => $arParams['iblock_id']
		],
		'runtime' => [
			new ReferenceField('services', 'Bitrix\Iblock\ElementPropertyTable', [
				'=this.ID' => 'ref.IBLOCK_ELEMENT_ID',
				'ref.IBLOCK_PROPERTY_ID' => [2]
			])
		]
])->fetchAll();

?>


<div class="project__container">
	<div class="project-items__container">
  <?php foreach ($elements as $element):
		$file_size = CFile::GetFileArray($element['PREVIEW_PICTURE']);
		$block_size = floor($file_size['WIDTH'] / $file_size['HEIGHT']) + 1;
		$url = "/portfolio/{$element['ID']}/";

	?>
  <a class="link-invisible" href="<?= $url ?>">
    <div class="project-item__container <?= 's' . $block_size ?>">
      <div class="project-item__background" style="background-image: url(<?= CFile::GetPath($element['PREVIEW_PICTURE']) ?>)"></div>
      <div class="project-item-name__container">
        <span class="project-item-name__text">
          <?= $element['NAME'] ?>
        </span>
      </div>
      <div class="project-item-text__container">
        <span class="project-item-text__text">
          <?= $element['PREVIEW_TEXT'] ?>
        </span>
      </div>
    </div>
  </a>
  <?php endforeach; ?>
	</div>
</div>
<div style="clear:both"></div>


<script type="text/javascript">
	$(function() {
		wall = new Freewall(".project-items__container");
		wall.reset({
			selector: '.project-item__container',
			animate: true,
			cellW: 360,
			cellH: 500,
			fixSize: 0,
			gutterY: 0,
			gutterX: 0,
			onResize: function() {
				wall.fitWidth();
			}
		})
		wall.fitWidth();

	});



</script>
