<?php

namespace components\jugger;

use jugger\bitrix\component\WidgetComponent;

\CModule::includeModule('iblock');

class ComplexListView extends WidgetComponent
{
    public $pager;
    public $sorter;
    public $params = [];
    public $mapperClass;

    public function run()
    {
        $this->includeComponentTemplate();
    }

    public function getPager()
    {
        global $APPLICATION;

        $pager = null;
        if ($this->pager) {
            $pagerPageSize = $this->pager['pageSize'] ?? 20;
            $pagerQueryName = $this->pager['name'] ?? 'p';

            $params = [
                'filter' => $this->params['filter'],
            ];
            $totalCount = \Bitrix\Iblock\ElementTable::getList($params)->getSelectedRowsCount();

            $pager = $APPLICATION->IncludeComponent("jugger:paginator.init", "", [
                'name' => $pagerQueryName,
                'pageSize' => $pagerPageSize,
                'totalCount' => $totalCount,
            ]);

            if ($pager) {
                $pager['queryName'] = $pagerQueryName;
            }
        }
        return $pager;
    }

    public function getSorter()
    {
        global $APPLICATION;

        $order = null;
        if ($this->sorter) {
            $orderQueryName = $this->sorter['name'] ?? 's';
            $orderAvailable = $this->sorter['available'];
            $orderDefault = $this->sorter['default'] ?? array_keys($orderAvailable)[0];

            $order = $APPLICATION->IncludeComponent("jugger:sorter.init", "", [
                'name' => $orderQueryName,
                'default' => $orderDefault,
                'available' => $orderAvailable,
            ]);

            if ($order) {
                $order = [
                    'active' => $order,
                ];
                $order['queryName'] = $orderQueryName;
                $order['available'] = $orderAvailable;
            }
        }
        return $order;
    }


}
