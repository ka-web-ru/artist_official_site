<?php
$arFilter = array(
    "IBLOCK_ID" => $arParams["IBLOCK_ID"]
);
 
$arSort = array(
    "ID" => "ASC"
);
$rsSections = CIBlockSection::GetList($arSort, $arFilter); //�������� ������ �������� �� ���������
//$rsSections->SetUrlTemplates(); //�������� ������ URL ��� ������� �� �������� (�� ������� �� �������� ���������)
while($arSections = $rsSections->GetNext())
{
    $arResult["SECTIONS"][] = $arSections;//��������� ������� �������� � $arResult ��� �������� � ������
}

//������� ������ ��������� ��������� ��������������� �� ��������
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