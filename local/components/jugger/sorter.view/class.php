<?php

namespace components\jugger;

use jugger\bitrix\component\WidgetComponent;

class SorterView extends WidgetComponent
{
    public $name = 's';
    public $active;
    public $available;

    public function run()
    {
        $sortes = [];
        $activeBy = current($this->active);
        $activeColumn = key($this->active);

        foreach ($this->available as $name => $label) {
            $item = [
                'column' => $name,
                'label' => $label,
                'link' => $this->createLink($name),
            ];
            if ($name == $activeColumn) {
                $item['active'] = $activeBy;
                $item['link'] = $this->createLink(
                    $name,
                    $activeBy == 'asc' ? 'desc' : 'asc'
                );
            }
            $sortes[] = $item;
        }

        $this->arParams['sortes'] = $sortes;
        $this->includeComponentTemplate();
    }

    public function createLink(string $column, string $by = 'asc')
    {
        $params = array_merge($_GET, [
            $this->name => "{$column}_{$by}"
        ]);
        return "?". http_build_query($params);
    }
}
