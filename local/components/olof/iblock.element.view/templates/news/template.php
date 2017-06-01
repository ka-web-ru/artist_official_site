<?php $element = $component->getItem($arParams['element_id']) ?>

<style media="screen">
	.news-element__container {
		background-color: #fafafa;
		padding: 2rem 0;
	}

	.news-element__title {
  	font-size: 2.5rem;
	}

	.news-element__preview-desc {
		padding-top: 1rem;
  	color: hsla(0, 0%, 50%, 1);
	}

	.news-element__tags {
    padding-top: 2rem;
	}

	.news-element__detail {
		padding: 1rem 0;
	}
</style>

<div class="news-element__container">
	<div class="container">
		<h1 class="news-element__title">
			<?= $element['NAME'] ?>
		</h1>
		<div class="news-element__preview-desc">
			<?= $element['PREVIEW_TEXT'] ?>
		</div>
		<div class="news-element__tags">
			<?php $APPLICATION->IncludeComponent('olof:arteast.service.view', 'news', [
				'element_id' => $arParams['element_id']
			]) ?>
		</div>
	</div>
</div>


<div class="container">
	<div class="news-element__detail">
		<img src="<?= CFile::GetPath($element['DETAIL_PICTURE']) ?>" alt="">
		<p><?= $element['DETAIL_TEXT'] ?></p>
	</div>

</div>
