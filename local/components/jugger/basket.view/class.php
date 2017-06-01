<?php

namespace components\jugger;

use jugger\bitrix\component\WidgetComponent;

class BasketView extends WidgetComponent
{
    public $basket;

    public function init()
    {
        parent::init();

        if ($this->basket && $this->basket instanceof \basket\models\Basket) {
            // pass
        }
        else {
            throw new \Exception("Property 'basket' is required and must implement '\basket\models\Basket'");
        }
    }

    public function run()
    {
        $this->includeComponentTemplate();
    }
}
