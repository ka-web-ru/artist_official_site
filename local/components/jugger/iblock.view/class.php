<?php

namespace components\jugger;

use Bitrix\Iblock\IblockTable;

include_once __DIR__.'/../item.view/class.php';

class IblockView extends ItemView
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
        return IblockTable::getRow($params) ?? null;
    }
}
