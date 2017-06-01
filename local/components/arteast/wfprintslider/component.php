<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
if(!CModule::IncludeModule("iblock"))
	return;
$arSelect = Array('ID', "DETAIL_PICTURE");
$arFilter = Array("IBLOCK_ID"=>8, "ACTIVE"=>"Y");
$res = CIBlockElement::GetList(['SORT' => 'ASC'], $arFilter, false, Array("nPageSize"=>50), $arSelect);
$arResult['SLIDERS'] = [];
while($ob = $res->GetNextElement())
{
	$link = '';
	$img = '';
	$raws = $ob->GetFields();
	//$db_props = CIBlockElement::GetProperty(5, $raws['ID'], array("sort" => "asc"), Array());
	//while ($ob = $db_props->GetNext())
	//	if($ob['CODE'] == 'ATT_LINK_FROM_SLIDER')
	//		$link = $ob['VALUE'];
	$arFile = CFile::GetFileArray($raws["DETAIL_PICTURE"]);
	if($arFile)
		$img = $arFile["SRC"];
	$arResult['SLIDERS'][] = ['src' => $img, 'url' => $link];
}
$this->IncludeComponentTemplate();
