<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
if(!CModule::IncludeModule("iblock"))
	return;
$blockId = $arParams['NEWS_BLOCK_ID'];
$arSelect = Array('ID', 'NAME', 'DETAIL_PAGE_URL', 'PREVIEW_TEXT', 'PREVIEW_PICTURE');
$arFilter = Array("IBLOCK_ID"=>$blockId, "ACTIVE"=>"Y");
$res = CIBlockElement::GetList(["date_active_from" => "desc"], $arFilter, false, Array("nPageSize"=>1), $arSelect);
$arResult['NEW'] = [];
if($ob = $res->GetNext())
{
	$h = [];
	$h['id'] = $ob['ID'];
	$h['name'] = $ob['NAME'];
	$h['url'] = $ob['DETAIL_PAGE_URL'];
	$img = CFile::GetFileArray($ob["PREVIEW_PICTURE"]);
	if($img)
		$h['img'] = $img['SRC'];
	$arResult['NEW'] = $h;
}
$this->IncludeComponentTemplate();
