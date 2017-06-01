<?php

namespace components\jugger;

use jugger\bitrix\component\WidgetComponent;

class PaginatorView extends WidgetComponent
{
    public $name = 'p';
    public $pageSize;
    public $pageNow;
    public $pageMax;
    public $range = 3;

    public function run()
    {
        $this->arParams['pages'] = $this->getPages();
        $this->includeComponentTemplate();
    }

    public function getPages()
    {
        $start = $this->pageNow - $this->range;
        if ($start < 1) {
            $start = 1;
        }

        $end = $this->pageNow + $this->range;
        if ($end > $this->pageMax) {
            $end = $this->pageMax;
        }

        return range($start, $end);
    }
}
