<?php

namespace jugger\bitrix\component;

class BaseComponent extends \CBitrixComponent
{
    public function init()
    {
        $this->initProperties();
    }

    public function initProperties()
    {
        foreach ($this->arParams as $name => $value) {
            if (property_exists($this, $name)) {
                $this->$name = $value;
            }
        }
    }
}
