<?php

$sortes = $arParams['sortes'];

?>
<div class="sorter-view material-card">
    <div class='sorter-view__item'>
        <b>
            Сортировка:
        </b>
    </div>
    <?php
    foreach ($sortes as $item) {
        $link = $item['link'];
        $label = $item['label'];
        $class = $item['active'] ? "active" : "";

        if (!$item['active']) {
            $faClass = "fa-sort";
        }
        elseif ($item['active'] == 'asc') {
            $faClass = "fa-sort-asc";
        }
        else {
            $faClass = "fa-sort-desc";
        }

        echo "
        <div class='sorter-view__item {$class}'>
            <a href='{$link}' class='sorter-view__item-name'>
                {$label} <i class='fa {$faClass}' aria-hidden='true'></i>
            </a>
        </div>
        ";
    }
    ?>
</div>
