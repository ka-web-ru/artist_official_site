<?php

namespace components\jugger;

use jugger\bitrix\component\WidgetComponent;

\CModule::includeModule('iblock');

class IblockElementSearch extends WidgetComponent
{
    public $iblockId;

    public function run()
    {
        $query = (string) $_GET['q'] ?? "";
        $this->arResult['query'] = $query;
        if (strlen($query) < 3) {
            $this->includeComponentTemplate('small-query');
            return;
        }

        if (strlen($query) > 3) {
            $this->arResult['mapperParams'] = [
                'filter' => [
                    'IBLOCK_ID' => $this->iblockId,
                    '%SEARCHABLE_CONTENT' => $query,
                ],
            ];
        }
        $this->includeComponentTemplate();
    }
}
