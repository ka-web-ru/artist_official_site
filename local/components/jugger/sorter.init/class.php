<?php

namespace components\jugger;

use jugger\bitrix\component\WidgetComponent;

class SorterInit extends WidgetComponent
{
    public $name = 's';
    public $default;
    public $available;

    public function run()
    {
        $sort = $_GET[$this->name] ?? null;
        if (!$sort) {
            return $this->default;
        }

        $sortData = $this->parseQueryParam($sort);
        if (!$sortData) {
            return $this->default;
        }

        $column = $sortData['column'];
        $columns = array_keys($this->available);
        if (!in_array($column, $columns)) {
            return $this->default;
        }

        return [
            $sortData['column'] => $sortData['by']
        ];
    }

    public function parseQueryParam(string $value)
    {
        $re = '/^([\w\-\.]+)_(asc|desc)$/i';
        if (preg_match($re, $value, $m)) {
            $value = [$m[1], $m[2]];
        }
        else {
            $value = [];
        }

        if (count($value) == 1) {
            return [
                'column' => $value[0],
                'by' => 'asc',
            ];
        }
        elseif (count($value) == 2) {
            return [
                'column' => $value[0],
                'by' => $value[1],
            ];
        }
        else {
            return null;
        }
    }
}
