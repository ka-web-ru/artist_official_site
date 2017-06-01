<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
	$new = $arResult['NEW'];
?>
<div class="cBotm">
	<div class="row">
		<div class="cBotm-item-wrapper col-lg-4 col-md-6 col-sm-6 col-xs-12">
			<div class="cBotm-item">
				<div class="capt">Новости</div>
				<div class="cont">
					<a class="name" href="<?= $new['url'] ?>">
						<img src="<?= $new['img'] ?>" alt="" />
						<span><?= $new['name'] ?></span>
						<span class="date">31 августа 2015</span>
					</a>
				</div>
			</div>
		</div>
		
		<div class="cBotm-item-wrapper col-lg-4 col-md-6 col-sm-6 col-xs-12">
			<div class="cBotm-item">
				<div class="capt">Наши работы</div>
				<div class="cont">
					<a class="name" href="<?= $new['url'] ?>">
						<img src="/local/images/btm2.jpg" alt="" />
						<span>Флеш-баннеры компании &laquo;Мотив&raquo;</span>
						<span class="date">13 августа 2015</span>
					</a>
				</div>
			</div>
		</div>
		
		<div class="cBotm-item-wrapper col-lg-4 col-md-12 col-sm-12 col-xs-12">
			<div class="cBotm-item">
				<div class="capt">Акции</div>
				<div class="cont">
					<a class="name" href="<?= $new['url'] ?>">
						<img src="/local/images/btm3.jpg" alt="" />
						<span>Встречайте пакетные предложе&shy;ния по очень привлекательным ценам!</span>
						<span class="date">до 31 декабря</span>
					</a>
				</div>
			</div>	
		</div>
	</div>
</div>