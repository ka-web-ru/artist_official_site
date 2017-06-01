<?php

namespace components\jugger;

use jugger\data\Paginator;
use jugger\bitrix\component\WidgetComponent;

class PaginatorInit extends WidgetComponent
{
    public $name = 'p';
    public $pageSize;
    public $totalCount;

    public function run()
    {
        $pageNow = (int) $_GET[$this->name];
        $pager = new Paginator($this->pageSize, $pageNow);
        $pager->totalCount = $this->totalCount;

        return [
            'offset' => $pager->getOffset(),
            'pageSize' => $pager->getPageSize(),
            'pageNow' => $pager->getPageNow(),
            'pageMax' => $pager->getPageMax(),
        ];
    }
}
