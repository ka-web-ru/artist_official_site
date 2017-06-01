<?php

include_once __DIR__.'/functions.php';

$pages = $arParams['pages'];
$pageNow = $arParams['pageNow'];
$pageMax = $arParams['pageMax'];

?>
<div class="paginator-view">
    <?php
    // перваая страница
    if (current($pages) != 1) {
        $link = getLinkByPage(1, $arParams['name']);

        echo "
        <div class='paginator-view__item paginator-view__item-first'>
        <a href='{$link}'>Начало</a>
        </div>
        ";
    }
    // остальные
    foreach ($pages as $page) {
        $class = $page == $pageNow ? "active" : "";
        $link = getLinkByPage($page, $arParams['name']);

        echo "
        <div class='paginator-view__item {$class}'>
        <a href='{$link}'>{$page}</a>
        </div>
        ";
    }
    // последняя
    if ($pageNow < $pageMax) {
        $link = getLinkByPage($pageNow + 1, $arParams['name']);

        echo "
        <div class='paginator-view__item paginator-view__item-next'>
        <a href='{$link}'>Дальше</a>
        </div>
        ";
    }
    ?>
</div>
