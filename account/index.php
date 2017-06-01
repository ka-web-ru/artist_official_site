<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Личный кабинет");
?><div class="page" id="account">
<?$APPLICATION->IncludeComponent("bitrix:main.profile","",Array(
		"USER_PROPERTY_NAME" => "",
		"SET_TITLE" => "Y", 
		"AJAX_MODE" => "N", 
		"USER_PROPERTY" => Array(), 
		"SEND_INFO" => "Y", 
		"CHECK_RIGHTS" => "Y",  
		"AJAX_OPTION_JUMP" => "N", 
		"AJAX_OPTION_STYLE" => "Y", 
		"AJAX_OPTION_HISTORY" => "N" 
)
);?> 
<a class="exit" href="?logout=Y">Выйти из профиля</a>
</div><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>