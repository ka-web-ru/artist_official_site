<?php

$view = $arParams['itemView'] ?? "";
$items = $arParams['items'];

foreach ($items as $item) {
    $APPLICATION->IncludeComponent("jugger:item.view", $view, [
        'model' => $item,
    ]);
}
