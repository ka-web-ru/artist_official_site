<?php

namespace components\jugger;

use jugger\bitrix\component\WidgetComponent;

class Spinner extends WidgetComponent
{
    public $min;
    public $max;
    public $name;
    public $step;
    public $value = 0;

    public function run()
    {
        $this->includeComponentTemplate();
    }
}
