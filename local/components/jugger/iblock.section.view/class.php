<?php

namespace components\jugger;

use Bitrix\Iblock\SectionTable;

include_once __DIR__.'/../item.view/class.php';

class IblockSectionView extends ItemView
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
        return SectionTable::getRow($params) ?? null;
    }
}
