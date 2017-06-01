<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
IncludeTemplateLangFile(__FILE__);
CJSCore::Init(array("fx"));
?>
<!DOCTYPE html>
<html xml:lang="ru" lang="ru">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?$APPLICATION->ShowTitle()?></title>
		<link rel="shortcut icon" type="image/x-icon" href="<?=SITE_TEMPLATE_PATH?>/favicon.ico" />
		<?$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . '/common.css');?>
		<?$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . '/colors.css');?>
		<?$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . '/owl.carousel.css');?>
		<?$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . '/owl.theme.css');?>
		<?$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . '/css/font-awesome.min.css');?>
		<?$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . '/css/bootstrap.css');?>
		<?$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . '/css/olof_style.css');?>
		<?//$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . '/css/lightcase.css');?>
		<?$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . '/swipebox/css/swipebox.css');?>
		<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . '/js/jquery-3.1.1.min.js');?>
		<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . '/js/jquery.events.touch.js');?>
		<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . '/swipebox/js/jquery.swipebox.min.js');?>
		<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . '/js/owl.carousel.js');?>
		<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . '/js/jquery.maskedinput.min.js');?>
		<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . '/js/lightcase.js');?>
		<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . '/js/main.js');?>
		<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . '/js/freewall.min.js');?>
		<?$APPLICATION->ShowHead();?>
		<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	</head>
	<body>
		<div id="panel"><?$APPLICATION->ShowPanel();?></div>
		<div class="wrapper">
		<div class="content">
			<div class="header-wrapper">
				<header class="container">
					<!--				<div class="page paged">-->
					<div class="row">
						<a class="logo col-sm-2 col-xs-3" href="/">
							<img src="<?= SITE_TEMPLATE_PATH ?>/images/logo.png" />
							<span class="logo-text">рекламное<br />агентство</span>
						</a>
						<nav class="menu-wrapper col-sm-5 col-xs-7">
							<div class="menu">
								<? $APPLICATION->IncludeComponent("bitrix:menu", "top",
									[
										"ROOT_MENU_TYPE" => "top",
										"MENU_CACHE_TYPE" => "Y",
										"MENU_CACHE_TIME" => "36000000",
										"MENU_CACHE_USE_GROUPS" => "Y",
										"MENU_CACHE_GET_VARS" => array(),
										"MAX_LEVEL" => "1",
										"USE_EXT" => "N",
										"ALLOW_MULTI_SELECT" => "N"
									],
									false
								); ?>
							</div>
							<span class="phone-mobile-view">
								<p>+7 (3522) 23-23-23</p>
								<p>ae@arteast.ru</p>
							</span>
							<a href='#' class="btn-mobile-menu">
								<i class="fa fa-bars"></i>
							</a>
						</nav>
						<div class="headCall col-sm-5 col-xs-2">
							<div class="acc" style="display:none;">
								<?php if(CUser::IsAuthorized()): ?>
									<a class="account-link" href="/account">Личный кабинет</a>
									<a class="account-link-mobile" href="/account"><i class="fa fa-user"></i></a>
								<?php else: ?>
									<a class="marR" href="/login">Вход</a>
									<a class="reg-link" href="/login?register=yes">Регистрация</a>
									<a class="marR-mobile" href="/login"><i class="fa fa-user"></i></a>
									<a class="reg-link-mobile" href="/login?register=yes"><i class="fa fa-user-plus"></i></a>
								<?php endif ?>
							</div>
							<div class='head-call-box'>
								<div class="call" onclick="main.CallUs()"><span>Обратный звонок</span></div>
								<div class="phone">
									<a href="callto:89630021303">8 (800) 350-23-62</a>,
									<a href="mailto:ae@arteast.ru"?>ae@arteast.ru</a>
								</div>
								<div id="callUs" class="callUs">
									<h5>Форма обратной связи</h5>
									<p class="mailF">
										<input type="text" placeholder="Ваше имя" id="f_name">
										<input type="text" placeholder="Ваш телефон" id="f_phone">
										<input type="text" placeholder="Адрес электронной почты" id="f_mail">
										<input type="text" placeholder="Время, удобное для звонка" id="f_time">
									</p>
									<div id="callText"></div>
									<div id="callBut">
										<span class="btn btn-default" onclick="main.CallCancel(this)">Отмена</span>
										<span class="btn btn-default" onclick="main.CallSuccess(this)">Отправить</span>
									</div>
									<div id="callButX">
										<span class="btn btn-default" onclick="main.CallCancel(this)">Закрыть</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--				</div>-->
				</header>
				<div style="clear:both"></div>
			</div>
