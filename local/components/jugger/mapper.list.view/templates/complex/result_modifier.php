<?php

// сортировка


// пагинация
$pager = null;
if ($arParams['pager']) {
    $pagerPageSize = $arParams['pager']['pageSize'] ?? 20;
    $pagerQueryName = $arParams['pager']['name'] ?? 'p';
    $totalCount = ElementTable::getList($params)->getSelectedRowsCount();

    $pager = $APPLICATION->IncludeComponent("jugger:paginator.init", "", [
        'name' => $pagerQueryName,
        'pageSize' => $pagerPageSize,
        'totalCount' => $totalCount,
    ]);

    if ($pager) {
        $pager['queryName'] = $pagerQueryName;
        $params['limit'] = $pager['pageSize'];
        $params['offset'] = $pager['offset'];
    }
}

$arResult['order'] = $order;
$arResult['pager'] = $pager;
