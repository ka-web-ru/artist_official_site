<?php

namespace components\jugger;

use Bitrix\Main\DB\Result;
use jugger\bitrix\component\WidgetComponent;

class ListView extends WidgetComponent
{
    public $items;
    public $result;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        $this->initData();

        if ($this->items) {
            $this->arParams['items'] = $this->items;
            $this->includeComponentTemplate();
        }
        else {
            $this->includeComponentTemplate('empty');
        }
    }

    public function initData()
    {
        if ($this->result) {
            $this->items = $this->result->fetchAll();
        }
    }
}
