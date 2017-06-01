<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
	$slides = $arResult['SLIDERS'];
?>
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
    dots:false,
	autoplay:true,
	autoplayTimeout:5000,
	autoplayHoverPause:true,
	navContainer:".owl-stage-outer",
	navText:['', ''],
	mouseDrag:true ,
	touchDrag:true ,
	center:true, /* центральный слайд получит класс center */
	stopOnHover:true,
	autoWidth:false ,
	/*autoHeight:true ,*/
	/*transitionStyle:"fadeIn",*/
	/*animateOut:'slideOutDown',*/
    /*animateIn:'flipInX',*/
	responsive:{0:{items:1},481:{items:3},},	  
})
});
</script>
<div class="owl-carousel owl-centered">
	<?php foreach($slides as $slide): ?><div class="item"><img src="<?= $slide['src'] ?>" alt="" /></div><?php endforeach ?>
</div>
<?php endif ?>