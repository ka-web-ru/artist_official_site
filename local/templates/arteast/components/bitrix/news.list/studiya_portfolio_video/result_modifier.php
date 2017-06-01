<?php
$arFilter = array(
    "IBLOCK_ID" => $arParams["IBLOCK_ID"]
);
 
$arSort = array(
    "ID" => "ASC"
);
$rsSections = CIBlockSection::GetList($arSort, $arFilter); //Получили список разделов из инфоблока
//$rsSections->SetUrlTemplates(); //Получили строку URL для каждого из разделов (по формату из настроек инфоблока)
while($arSections = $rsSections->GetNext())
{
    $arResult["SECTIONS"][] = $arSections;//Сохранили выборку разделов в $arResult для передачи в шаблон
}

//собрать массив элементов инфоблока сгруппированных по разделам
/*
foreach($arSections as $arSection){  
	
	foreach($arResult["ITEMS"] as $key=>$arItem){
		
		 if($arItem['IBLOCK_SECTION_ID'] == $arSection['ID']){
			$arSection['ELEMENTS'][] =  $arItem;
		 }
	}
	
	$arElementGroups[] = $arSection;
	
}
*/