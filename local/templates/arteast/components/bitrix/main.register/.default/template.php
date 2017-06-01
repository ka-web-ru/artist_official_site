<?
/**
 * Bitrix Framework
 * @package bitrix
 * @subpackage main
 * @copyright 2001-2014 Bitrix
 */
/**
 * Bitrix vars
 * @global CMain $APPLICATION
 * @global CUser $USER
 * @param array $arParams
 * @param array $arResult
 * @param CBitrixComponentTemplate $this
 */

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
	die();

function GetWidgetReg($type, $id, &$arResult, $isTop = false, $isReq = false)
{
	if($isTop)
		$name = GetMessage("REGISTER_FIELD_".$id);
	else
		$name = $arResult["USER_PROPERTIES"]["DATA"][$id]["EDIT_FORM_LABEL"];
	$t = '<div>';
	$t .= '<label>' . $name . ($isReq ? ' <span>*</span>' : '') . '</label>';
	$t .= '<input size="30" type="' . $type . '" name="REGISTER[' . $id . ']" value="' . $arResult["VALUES"][$id] . '" autocomplete="off" />';
	$t .= '</div>';
	return $t;
}
?>
<div class="reg">
	<h1 class="bx-title">Регистрация</h1>
<?if($USER->IsAuthorized()):?>

<p><?echo GetMessage("MAIN_REGISTER_AUTH")?></p>

<?else:?>
<?
if (count($arResult["ERRORS"]) > 0):
	foreach ($arResult["ERRORS"] as $key => $error)
		if (intval($key) == 0 && $key !== 0) 
			$arResult["ERRORS"][$key] = str_replace("#FIELD_NAME#", "&quot;".GetMessage("REGISTER_FIELD_".$key)."&quot;", $error);

	ShowError(implode("<br />", $arResult["ERRORS"]));

elseif($arResult["USE_EMAIL_CONFIRMATION"] === "Y"):
?>
<p><?echo GetMessage("REGISTER_EMAIL_WILL_BE_SENT")?></p>
<?endif?>

<form method="post" action="<?=POST_FORM_ACTION_URI?>" name="regform" enctype="multipart/form-data">
<?
if($arResult["BACKURL"] <> ''):
?>
	<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
<?
endif;
?>
<div class="regBlock">
<?php
	echo GetWidgetReg('text', 'EMAIL', $arResult, true, true);
	echo GetWidgetReg('text', 'LOGIN', $arResult, true);
	echo GetWidgetReg('password', 'PASSWORD', $arResult, true, true);
	echo GetWidgetReg('password', 'CONFIRM_PASSWORD', $arResult, true, true);
?>
</div>
<div class="regReq"><span>*</span> Поля, обязательные для заполнения</div>
<div class="regAddit">
	<h2 class="bx-title">Дополнительные данные</h2>
	<div class="regReq">Необходимы для выставления счета. Можно заполнить позднее в личном кабинете</div>
	<?if($arResult["USER_PROPERTIES"]["SHOW"] == "Y"):?>
	<div class="regBlock">
		<?foreach($arResult["USER_PROPERTIES"]["DATA"] as $FIELD_NAME => $arUserField):
		$tip = '';
		if($FIELD_NAME == 'UF_COMPANYNAME')
			$tip = 'ООО Компания';
		if($FIELD_NAME == 'UF_CONTACTNAME')
			$tip = 'Фамилия Имя Отчество';
		if($FIELD_NAME == 'UF_CONTACTPHONE')
			$tip = '+7 (___) ___-__-__';
		if($FIELD_NAME == 'UF_ADDRESS')
			$tip = 'Индекс, город, (р-н), улица, д. (стр.), оф.';
		?><div>
			<label><?=$arUserField["EDIT_FORM_LABEL"]?><?if ($arUserField["MANDATORY"]=="Y"):?><span class="starrequired">*</span><?endif;?></label>
			<?$APPLICATION->IncludeComponent(
				"bitrix:system.field.edit",
				$arUserField["USER_TYPE"]["USER_TYPE_ID"],
				[
					"bVarsFromForm" => $arResult["bVarsFromForm"],
					"arUserField" => $arUserField,
					"form_name" => "regform",
					"placeholder" => $tip,
				],
				null, array("HIDE_ICONS"=>"Y"));?>
		</div><?endforeach;?>
	</div>
</div>
<?endif;?>
<? if ($arResult["USE_CAPTCHA"] == "Y"): ?>
<div class="capBlock">
	<div class="capBlockH"><?=GetMessage("REGISTER_CAPTCHA_TITLE")?></div>
	<div>
		<input type="hidden" name="captcha_sid" value="<?=$arResult["CAPTCHA_CODE"]?>" />
		<img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["CAPTCHA_CODE"]?>" width="180" height="40" alt="CAPTCHA" />
		<input type="text" class="captcha" name="captcha_word" maxlength="50" placeholder="<?=GetMessage("REGISTER_CAPTCHA_PROMT")?>" />
	</div>
</div>
<? endif ?>
	<div class="capBtn"><input type="submit" class="btn btn-danger" name="register_submit_button" onclick="main.RegConfirm(event)" value="<?=GetMessage("AUTH_REGISTER")?>" /></div>

</form>
<?endif?>
</div>