<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
<ul id="top">
<?foreach($arResult as $arItem):?>
	<li <?= $arItem["SELECTED"] ? 'class="selected"' : '' ?>><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
<?endforeach?>
</ul>		
<?endif?>