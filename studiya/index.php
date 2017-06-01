<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Студия РА \"Артист\"");
?><div class="container-fluid home-wrapper">
	<div class="home-bg">
	</div>
 <section class="container home">
	<div class="row ">
		<div class="col-md-8 col-sm-10 col-xs-10 video-wrapper">
 <figure class="fluid-ratio">
			<!--<div id="video" class="video-play"></div>--> <iframe id="video" class="video-play" width="560" height="315"  src="https://www.youtube.com/embed/dCSr5fcjOeI?rel=0&showinfo=0&enablejsapi=1" frameborder="0" allowfullscreen></iframe> <!--<div class="video-cover"></div>-->
			<div class="keyboard">
			</div>
			<div class="shadow">
			</div>
			<div class="mouse">
			</div>
			<div class="mel-bg">
			</div>
 </figure>
		</div>
		<div class="btn-form-show">
			<p class="btn-show-text">
				 Заказать
			</p>
		</div>
		<div class="col-md-4 contact-form-wrapper">
			<form class="contact-form">
				 <!--<h2 class="contact-form-title">Изготовление рекламы</h2>-->
				<div class="form-title-text">
				</div>
				<p class="form-text-1">
					 Все виды рекламных материалов от графических макетов до презентационных фильмов
				</p>
				<p class="form-text-2">
					 Оставьте свои данные и мы перезвоним Вам
				</p>
 <input type="text" id="name-input-home" name="name" class="contact-input-home"> <input type="tel" id="phone-input-home" name="phone" class="contact-input-home"> <a href="#" class="btn-form btn-form-home"></a>
			</form>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 home-text" id="hm-txt">
			<h1>Студия производства рекламы «АртИст»</h1>
			<p>
				 изготовит для Вас видеоролики любой сложности: от простых слайдов, до съемок игровых роликов и презентационных фильмов со сложной 3D анимацией. Голосами для Вашей будущей рекламы станут профессиональные дикторы и актеры, которых Вы сможете самостоятельно выбрать из большой базы голосов. Помимо видео- и аудио-роликов, мы также можем предложить изготовление флеш-баннеров и большого спектра графической продукции: от всевозможных макетов и иллюстраций, до тщательно продуманных логотипов и фирменных стилей.
			</p>
		</div>
	</div>
 </section>
</div>
<div class="container-fluid advantages-wrapper" id="adv">
 <section class="container advantages-container">
	<div class="row advantages">
		<h2 class="col-md-12">Почему выбирают нас</h2>
		<div class="col-sm-3 col-xs-6 advantages-card">
			<div class="adv-icon1">
 <img alt="Богатый опыт" src="/local/templates/arteast/images/studiya/icon-advantages1.png" class="adv-img">
				<p>
					 Богатый опыт
				</p>
			</div>
		</div>
		<div class="col-sm-3 col-xs-6 advantages-card">
			<div class="adv-icon2">
 <img alt="Лидеры на рынке" src="/local/templates/arteast/images/studiya/icon-advantages2.png" class="adv-img">
				<p>
					 Лидеры на рынке рекламных услуг
				</p>
			</div>
		</div>
		<div class="col-sm-3 col-xs-6 advantages-card">
			<div class="adv-icon3">
 <img src="/local/templates/arteast/images/studiya/icon-advantages3.png" class="adv-img" alt="Качество">
				<p>
					 Качество, подтвержденное неоднократно
				</p>
			</div>
		</div>
		<div class="col-sm-3 col-xs-6 advantages-card">
			<div class="adv-icon4">
 <img alt="Конкурентноспособная цена" src="/local/templates/arteast/images/studiya/icon-advantages4.png" class="adv-img">
				<p>
					 Конкурентноспособная цена
				</p>
			</div>
		</div>
	</div>
 </section>
</div>
<div class="container-fluid num-wrapper">
 <section class="container num-container">
	<div class="row num">
		<div class="col-md-12 num-title">
			<h2 class="num-tittle-text">Немного цифр</h2>
		</div>
		<div class="col-xs-4 num-icon">
			<div class="num-icon1">
 <img alt="На рынке СМИ" src="/local/templates/arteast/images/studiya/num-icon1.svg" class="num-img">
				<p class="num-text">
					 на рынке СМИ
				</p>
			</div>
		</div>
		<div class="col-xs-4 num-icon">
			<div class="num-icon2">
 <img src="/local/templates/arteast/images/studiya/num-icon2.svg" class="num-img" alt="клиентов">
				<p class="num-text">
					 клиентов
				</p>
			</div>
		</div>
		<div class="col-xs-4 num-icon">
			<div class="num-icon3">
 <img alt="Премии на конкурсах" src="/local/templates/arteast/images/studiya/num-icon3.svg" class="num-img">
				<p class="num-text">
					 и премий на конкурсах рекламы
				</p>
			</div>
		</div>
	</div>
 </section>
</div>
<div class="container-fluid portfolio-wrapper" id="potf">
 <section class="container portfolio-container">
	<div class="row portfolio">
		<div class="col-md-12 portfolio-title">
			<h2 class="portfolio-title-text">ПРИМЕРЫ РАБОТ</h2>
		</div>
 <span class="col-xs-12 studiya-potrtfolio-images-title"> Графика </span>
		<?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"studiya_portfolio",
	Array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "Y",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "N",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"DISPLAY_DATE" => "N",
		"DISPLAY_NAME" => "N",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array("DETAIL_PICTURE",""),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "9",
		"IBLOCK_TYPE" => "news",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "N",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "20",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array("url",""),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "ID",
		"SORT_BY2" => "ID",
		"SORT_ORDER1" => "ASC",
		"SORT_ORDER2" => "ASC"
	)
);?> <span class="col-xs-12 studiya-potrtfolio-video-title"> Видео </span>
		<?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"studiya_portfolio_video",
	Array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "Y",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"DISPLAY_DATE" => "N",
		"DISPLAY_NAME" => "N",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "N",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(0=>"PREVIEW_PICTURE",1=>"",),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "10",
		"IBLOCK_TYPE" => "news",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "N",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "20",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(0=>"url",1=>"",),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "ID",
		"SORT_BY2" => "ID",
		"SORT_ORDER1" => "ASC",
		"SORT_ORDER2" => "ASC"
	)
);?>
	</div>
 </section>
</div>
<div class="container-fluid premium-wrapper" id="prm">
 <section class="container premium-container">
	<div class="row premium">
		<div class="col-md-12 premium-title">
			<h2 class="premium-title-text">НАГРАДЫ</h2>
		</div>
		<div class="col-md-4 col-sm-6 col-xs-12 premium-card">
 <img alt="Национальный фестиваль рекламы Идея" src="/local/templates/arteast/images/studiya/premium1.png" class="premium-img">
			<ul class="premium-list">
				<li class="premium-list-text">1997г. — диплом лауреата, видеоролик «Обходчик»</li>
				<li class="premium-list-text">2003г. — диплом лауреата, видеоролик «Дурак»</li>
				<li class="premium-list-text">2005г. — диплом за I место, видеоролики «Казарма», «Трусы», «Футбол», «8цветков»</li>
				<li class="premium-list-text">2009г. — диплом за III место, видеоролики «Березень»</li>
			</ul>
		</div>
 <figure class="col-md-4 col-sm-6 col-xs-12 premium-card"> <img alt="Региональный фестиваль рекламы Новый век" src="/local/templates/arteast/images/studiya/premium2.png" class="premium-img">
		<ul class="premium-list">
			<li class="premium-list-text">2002г. — диплом за II место, видеоролик «Бабульки»</li>
			<li class="premium-list-text">2003г. — диплом за III место, видеоролики «Кристал разгуляй 20», «ПМТ»</li>
			<li class="premium-list-text">2003г. — диплом за II место, видеоролики «Казарма», «Молния гномы 25»</li>
			<li class="premium-list-text">2003г. — диплом за I место, видеоролик «Альфа-база 36»</li>
			<li class="premium-list-text">2004г. — диплом за II место, видеоролик «Казарма»</li>
		</ul>
 </figure> <figure class="col-md-4 col-sm-6 col-xs-12 premium-card p-c-3"> <img alt="Московский международный фестиваль рекламы RedApple" src="/local/templates/arteast/images/studiya/premium3.png" class="premium-img p-i-3">
		<ul class="premium-list p-l-3">
			<li class="premium-list-text">2004г. — диплом финалиста, видеоролик «Трусы»</li>
			<li class="premium-list-text">2006г. — диплом за III место, видеоролик «Шеврон»</li>
		</ul>
 </figure>
	</div>
 </section>
</div>
<div class="container-fluid customer-wrapper" id="cust">
 <section class="container customer-container">
	<div class="row customer">
		<div class="col-md-12 customer-title">
			<h2 class="customer-title-text">С нами работают</h2>
		</div>
		<div class="col-md-3 col-xs-4 customer-icon cw1">
			<div class="fluid-icon c1">
			</div>
		</div>
		<div class="col-md-3 col-xs-4 customer-icon cw2">
			<div class="fluid-icon c2">
			</div>
		</div>
		<div class="col-md-3 col-xs-4 customer-icon cw3">
			<div class="fluid-icon c3">
			</div>
		</div>
		<div class="col-md-3 col-xs-4 customer-icon cw4">
			<div class="fluid-icon c4">
			</div>
		</div>
		 <!---->
		<div class="col-md-3 col-xs-4 customer-icon cw1">
			<div class="fluid-icon c5">
			</div>
		</div>
		<div class="col-md-3 col-xs-4 customer-icon cw2">
			<div class="fluid-icon c6">
			</div>
		</div>
		<div class="col-md-3 col-xs-4 customer-icon cw3">
			<div class="fluid-icon c7">
			</div>
		</div>
		<div class="col-md-3 col-xs-4 customer-icon cw4">
			<div class="fluid-icon c8">
			</div>
		</div>
		 <!---->
		<div class="col-md-3 col-xs-4 customer-icon cw1">
			<div class="fluid-icon c9">
			</div>
		</div>
		<div class="col-md-3 col-xs-4 customer-icon cw2">
			<div class="fluid-icon c10">
			</div>
		</div>
		<div class="col-md-3 col-xs-4 customer-icon cw3">
			<div class="fluid-icon c11">
			</div>
		</div>
		<div class="col-md-3 col-xs-4 customer-icon cw4">
			<div class="fluid-icon c12">
			</div>
		</div>
		 <!---->
		<div class="col-md-3 col-xs-4 customer-icon cw1">
			<div class="fluid-icon c13">
			</div>
		</div>
		<div class="col-md-3 col-xs-4 customer-icon cw2">
			<div class="fluid-icon c14">
			</div>
		</div>
		<div class="col-md-3 col-xs-4 customer-icon cw3">
			<div class="fluid-icon c15">
			</div>
		</div>
		<div class="col-md-3 col-xs-12 customer-icon cw4">
			<div class="fluid-icon c16 ">
			</div>
		</div>
	</div>
	<div class="row customer-center">
		<div class="customer-center-wrapper">
			<div class="col-md-3 col-xs-3 customer-icon cc">
				<div class="fluid-icon c17">
				</div>
			</div>
			<div class="col-md-3 col-xs-3 customer-icon cc">
				<div class="fluid-icon c18">
				</div>
			</div>
			<div class="col-md-3 col-xs-3 customer-icon cc">
				<div class="fluid-icon c19">
				</div>
			</div>
			<div class="col-md-3 col-xs-12 customer-icon cc">
				<div class="fluid-icon c20">
				</div>
			</div>
		</div>
	</div>
 </section>
</div>
<div class="container-fluid scope-wrapper" id="cnt">
 <section class="container scope-container">
	<div class="row scope">
		<h2 class="col-md-12 scope-title">Мы можем всё! И делаем это хорошо</h2>
		<div class="col-md-12 scope-text-wrapper">
			<div class="scope-text">
				<ul class="scope-list">
					<li class="scope-list-text">Видеоролики</li>
					<li class="scope-list-text">Аудиоролики</li>
					<li class="scope-list-text">Графические макеты</li>
					<li class="scope-list-text">Разработка фирменного стиля</li>
					<li class="scope-list-text">Дизайн фасадов и вывесок</li>
					<li class="scope-list-text">Презентационные фильмы</li>
				</ul>
			</div>
		</div>
		<form class="contact-form">
			<h3 class="col-md-12 form-title-scope">Оставьте свои данные и мы перезвоним Вам</h3>
			<fieldset class="col-md-4">
 <input type="text" id="name-input-scope" name="name" class="contact-input-scope">
			</fieldset>
			<fieldset class="col-md-4">
 <input type="tel" id="phone-input-scope" name="phone" class="contact-input-scope">
			</fieldset>
			<fieldset class="col-md-4">
 <a href="#" class="btn-form btn-form-scope">Свяжитесь со мной</a>
			</fieldset>
		</form>
	</div>
 </section>
</div>
 <!--Модальная форма начало--> <a href="#" class="overlay" id="openModal"></a>
<div class="popup">
	<form class="contact-form-modal">
		 <!--<h2 class="contact-form-title">Изготовление рекламы</h2>-->
		<div class="form-title-text">
		</div>
		<p class="form-text-1">
			 Все виды рекламных материалов от графических макетов до презентационных фильмов
		</p>
		<p class="form-text-2">
			 Оставьте свои данные и мы перезвоним Вам
		</p>
 <input type="text" id="name-input-modal" name="name" class="contact-input-home"> <input type="tel" id="phone-input-modal" name="phone" class="contact-input-home"> <a href="#" class="btn-form btn-form-home"></a>
	</form>
	<div class="result-box">
	</div>
 <a class="close" title="Закрыть" href="#close"></a>
</div>
    <!--Модальная форма конец--><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>