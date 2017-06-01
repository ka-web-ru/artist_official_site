<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
	$slides = $arResult['SLIDERS'];
?>
<div class="container-fluid slider-wrapper">
<div class="col-xs-12 column-slider">
<?php if(count($slides) == 1): ?>
	<div class="slider">
		<?php foreach($slides as $slide): ?><img src="<?= $slide['src'] ?>" alt="" /><?php endforeach ?>
	</div>
	<?php elseif(count($slides) > 1): ?>
	<script>
	document.addEventListener("DOMContentLoaded", function()
	{
	$('.owl-carousel').owlCarousel({
		loop:true,
		center: false, /* центральный слайд получит класс center */
		dots:false,
			autoplay:true,
			autoplayTimeout: 5000,
			autoplayHoverPause: true,
			navContainer: ".owl-stage-outer",
			navText: ['', ''],
		items:1
	})
	});
	</script>
	<div class="owl-carousel">
		<?php foreach($slides as $slide): ?><div class="item"><img src="<?= $slide['src'] ?>" alt="" /></div><?php endforeach ?>
	</div>
	<?php endif ?>
</div>
</div>

