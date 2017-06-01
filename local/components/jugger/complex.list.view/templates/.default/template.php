<?php


$pagerView = $arParams['pagerView'] ?? "";
$sorterView = $arParams['sorterView'] ?? "";
$mapperView = $arParams['mapperView'] ?? "";
$mapperClass = $arParams['mapperClass'];

$params = $arParams['params'];
$order = $component->getSorter();
$pager = $component->getPager();

if ($order) {
    $params['order'] = $order['active'];
}
if ($pager) {
    $params['offset'] = $pager['offset'];
    $params['limit'] = $pager['pageSize'];
}

?>
<div class="complex-list-view">
    <?php
    // sorter
    if ($order) {
        echo "<div class='complex-list-view__sorter'>";
        $APPLICATION->IncludeComponent("jugger:sorter.view", $sorterView, [
            'name' => $order['queryName'],
            'active' => $order['active'],
            'available' => $order['available'],
        ]);
        echo "</div>";
    }

    // list
    echo "<div class='complex-list-view__items'>";
    $APPLICATION->IncludeComponent("jugger:mapper.list.view", $mapperView, [
        'class' => $mapperClass,
        'queryParams' => $params,
    ]);
    echo "</div>";

    // pager
    if ($pager) {
        echo "<div class='complex-list-view__pager'>";
        $APPLICATION->IncludeComponent("jugger:paginator.view", $pagerView, [
            'name' => $pager['queryName'],
            'pageSize' => $pager['pageSize'],
            'pageNow' => $pager['pageNow'],
            'pageMax' => $pager['pageMax'],
        ]);
        echo "</div>";
    }
    ?>
</div>
