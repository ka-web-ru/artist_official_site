<?php

namespace components\jugger;

use Bitrix\Iblock\ElementTable;

include_once __DIR__.'/../item.view/class.php';

class IblockElementView extends ItemView
{
    public function init()
    {
        \CModule::includeModule('iblock');
        parent::init();
    }

    public function getModelById(int $id)
    {
        $params = [
            'filter' => [
                'ID' => $id,
            ],
        ];
        return ElementTable::getRow($params) ?? null;
    }
}
