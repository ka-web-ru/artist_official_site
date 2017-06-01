<?php

namespace jugger\bitrix\iblock;

use Bitrix\Iblock\IblockTable;
use Bitrix\Iblock\SectionTable;
use Bitrix\Iblock\ElementTable;

class Url
{
    private static $section = [];
    private static $detail = [];

    public static function getIblockDetailUrl(int $iblockId)
    {
        if (!self::$detail[$iblockId]) {
            $iblock = IblockTable::getRowById($iblockId);
            self::$detail[$iblockId] = $iblock['DETAIL_PAGE_URL'];
        }
        return self::$detail[$iblockId];
    }

    public static function getIblockSectionUrl(int $iblockId)
    {
        if (!self::$section[$iblockId]) {
            $iblock = IblockTable::getRowById($iblockId);
            self::$section[$iblockId] = $iblock['SECTION_PAGE_URL'];
        }
        return self::$section[$iblockId];

    }

    public static function getSectionUrl(array $section)
    {
        $elementId = 0;
        $iblockId = (int) $section['IBLOCK_ID'];
        $sectionId = (int) $section['ID'];
        $url = self::getIblockSectionUrl($iblockId);
        if (empty($url)) {
            throw new \Exception("Url for SECTION not set in IBLOCK {$iblockId}");
        }

        return self::getGeneralUrl($iblockId, $sectionId, $elementId, $url);
    }

    public static function getElementUrl(array $element)
    {
        $elementId = (int) $element['ID'];
        $iblockId = (int) $element['IBLOCK_ID'];
        $sectionId = (int) $element['IBLOCK_SECTION_ID'];
        $url = self::getIblockDetailUrl($iblockId);
        if (empty($url)) {
            throw new \Exception("Url for ELEMENT not set in IBLOCK {$iblockId}");
        }

        return self::getGeneralUrl($iblockId, $sectionId, $elementId, $url);
    }

		//* костыли *//

	public function getElementUrlById($element_id, $iblock_id = null) {

		$params = [
			'ID' => $element_id,
			'IBLOCK_ID' => $iblock_id ?: \Bitrix\Iblock\ElementTable::GetRow([
				'select' => ['IBLOCK_ID'],
				'filter' => [
					'=ID' => $element_id
				]
			])['IBLOCK_ID'],
			'IBLOCK_SECTION_ID' => null
		];


		return self::getElementUrl($params);
	}


		//* *//

    protected static function getGeneralUrl(int $iblockId, int $sectionId, int $elementId, string $url)
    {
        $params = self::parseUrl($url);

        $replaces = self::getParamsValues($params, $iblockId, $sectionId, $elementId);
        $params = array_map(function($item) {
            return "~{$item}~";
        }, $params);
        return preg_replace($params, $replaces, $url);
    }

    public static function parseUrl(string $url)
    {
        $re = '/(#\w+#)/';
        if (preg_match_all($re, $url, $m)) {
            return $m[1];
        }
        return [];
    }

    public static function getParamsValues(array $params, int $iblockId, int $sectionId, int $elementId)
    {
        $values = [];
        foreach ($params as $p) {
            switch ($p) {
                case '#SITE_DIR#':
                    $values[] = SITE_DIR;
                    break;

                case '#SERVER_NAME#':
                    $values[] = SITE_SERVER_NAME;
                    break;

                case '#IBLOCK_ID#':
                    $values[] = $iblockId;
                    break;

                case '#IBLOCK_CODE#':
                    if (!$iblock) {
                        $iblock = IblockTable::getRowById($iblockId);
                    }
                    $values[] = $iblock['CODE'];
                    break;

                case '#SECTION_ID#':
                    $values[] = $sectionid;
                    break;

                case '#SECTION_CODE#':
                    if (!$section) {
                        $section = SectionTable::getRowById($sectionId);
                    }
                    $values[] = $section['CODE'];
                    break;

                case '#ELEMENT_ID#':
                case '#ID#':
                    $values[] = $elementId;
                    break;

                case '#ELEMENT_CODE#':
								case '#CODE#':
                    if (!$element) {
                        $element = ElementTable::getRowById($elementId);
                    }
                    $values[] = $element['CODE'];
                    break;

                default:
                    $values[] = $p;
            }
        }

        return $values;
    }
}
