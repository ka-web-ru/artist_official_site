<?php

namespace jugger\bitrix\iblock;

use Bitrix\Iblock\SectionTable;

\CModule::includeModule('iblock');

class Section
{
    public static function getParents(array $section)
    {
        $items = [];
        while (true) {
            if (!$section['IBLOCK_SECTION_ID']) {
                break;
            }

            $parent = SectionTable::getRow([
                'filter' => [
                    'ID' => $section['IBLOCK_SECTION_ID'],
                ],
            ]);
            if (!$parent) {
                break;
            }

            $items[] = $parent;
            $section = $parent;
        }
        return $items;
    }

    public static function getChilds(array $section)
    {
        return SectionTable::getList([
            'filter' => [
                'IBLOCK_SECTION_ID' => $section['ID'],
            ],
        ])->fetchAll();
    }
}
