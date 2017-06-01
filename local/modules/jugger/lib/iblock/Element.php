<?php

namespace jugger\bitrix\iblock;

use Bitrix\Iblock\ElementTable;
use Bitrix\Iblock\ElementPropertyTable;

\CModule::includeModule('iblock');

class Element
{
    public static function getProperties(int $elementId, array $propsNames)
    {
        $ret = [];
        $result = ElementPropertyTable::getList([
            'select' => [
                'pid' => 'IBLOCK_PROPERTY.ID',
                'code' => 'IBLOCK_PROPERTY.CODE',
                'value' => 'VALUE',
                'value_enum' => 'PROPERTY_ENUM.VALUE',
            ],
            'filter' => [
                '@IBLOCK_PROPERTY.CODE' => $propsNames,
                'IBLOCK_ELEMENT_ID' => $elementId
            ],
        ]);
        while ($row = $result->Fetch()) {
            $key = $row['code'];
            $value = $row['value_enum'] ?? $row['value'];

            if (!$ret[$key]) {
                $ret[$key] = [];
            }
            $ret[$key][] = $value;
        }
        return $ret;
    }
}
