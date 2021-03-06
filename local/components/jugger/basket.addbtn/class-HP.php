<?php

namespace components\jugger;

use jugger\bitrix\component\WidgetComponent;

class BasketAddbtn extends WidgetComponent
{
    public $count;
    public $product;

    public function init()
    {
        parent::init();

        if (!$this->product) {
            throw new \Exception("Property 'product' is required");
        }

        if (!$this->count) {
            $this->count = 1;
        }
    }

    public function run()
    {
        $this->includeComponentTemplate();
    }
}
