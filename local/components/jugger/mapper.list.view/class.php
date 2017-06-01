<?php

namespace components\jugger;

use Bitrix\Main\DB\Result;
use jugger\bitrix\component\WidgetComponent;

class MapperListView extends WidgetComponent
{
    public $class;
    public $queryParams;

    public function run()
    {
        global $APPLICATION;

        $params = [];
        if ($this->class && $this->queryParams) {
            $params['result'] = $this->class::getList($this->queryParams);
        }

        $APPLICATION->IncludeComponent("jugger:list.view", $this->getTemplateName(), $params);
    }
}
