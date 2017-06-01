<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle('Рекламное агентство Артист');
?>
<?
	$APPLICATION->IncludeComponent(
		'arteast:slider',
		'',
		[]
		, $component);
?>
<div class="center">
	<div class="container">
		<div class="row">
			<ul class="cMenu">
				<li>
					<div class="cImg"><a href="/studiya/index.php"><img src="/local/images/art1.png" alt="" /></a></div>
					<div class="cTxt"><a class="link-invisible" href="/studiya/index.php">Студия производства<br />рекламы</a></div>

				</li><li>
					<div class="cImg"><img src="/local/images/art2.png" alt="" /></div>
					<div class="cTxt">Разработка<br />сайтов</div>
					<div class="cHover">
						<div></div><div></div><div></div>
						<ul>
							<li><a href="http://supermarket.arteast-pro.ru/landing/" target="_blank">Landing Page</a></li>
							<li><a href="/portfolio/#.service-11" target="_blank">Сайты на 1С-Битрикс</a></li>
						</ul>
					</div>
				</li><li>
					<div class="cImg"><img src="/local/images/art3.png" alt="" /></div>
					<div class="cTxt">Реклама<br />в интернете</div>
					<div class="cHover">
						<div></div><div></div><div></div>
						<ul>
							<li><a href="http://supermarket.arteast-pro.ru/context/" target="_blank">Контекстная реклама</a></li>
							<li><a href="http://supermarket.arteast-pro.ru/mediarec/" target="_blank">Медийная реклама</a></li>
							<li><a href="http://supermarket.arteast-pro.ru/smm/" target="_blank">Продвижение в соц. сетях</a></li>
						</ul>
					</div>
				</li>
				<!--
				<li>
					<div class="cImg"><img src="/local/images/art4.png" alt="" /></div>
					<div class="cTxt">Размещение<br />наружной рекламы</div>
				</li>
				-->
				<li>
					<div class="cImg"><a href="/wideformprint/wideformprint.php"><img src="/local/images/art5.png" alt="" /></a></div>
					<div class="cTxt"><a class="link-invisible" href="/wideformprint/wideformprint.php">Широкоформатная<br />печать</a></div>
				</li>
				<!--
				<li>
					<div class="cImg"><img src="/local/images/art6.png" alt="" /></div>
					<div class="cTxt">Мастерская наружной<br />рекламы</div>
				</li>
				-->
				<li>
					<div class="cImg"><a href="http://supermarket.arteast-pro.ru/plastic/"><img src="/local/images/art7.png" alt="" /></a></div>
					<div class="cTxt"><a class="link-invisible" href="http://supermarket.arteast-pro.ru/plastic/">Пластиковые<br />карты</a></div>
				</li>
				<!--
				<li>
					<div class="cImg"><img src="/local/images/art8.png" alt="" /></div>
					<div class="cTxt">Журнал<br />Выбирай</div>
				</li>
				-->
			</ul>
		</div>
	</div>
</div>
<?php /*
<div class="bottom">
	<div class="container">
	<?
		$APPLICATION->IncludeComponent(
			'arteast:last',
			'',
			[
				'NEWS_BLOCK_ID' => 1,
			]
			, $component);
	?>
	</div>
</div>
*/ ?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
