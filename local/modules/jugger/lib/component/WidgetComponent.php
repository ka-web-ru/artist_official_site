<?php

namespace jugger\bitrix\component;

abstract class WidgetComponent extends BaseComponent
{
    public $cachePath;
    public $cacheId;
    public $cacheTime = 8640000;

    public function executeComponent()
    {
        if ($this->arParams['isCached']) {
            $cachePath = $this->cachePath ?: "widget_component";
            if ($this->StartResultCache($this->cacheTime, false, $cachePath)) {
                $this->init();
                $result = $this->run();
            }
        }
        else {
            $this->init();
            $result = $this->run();
        }
        $this->onAfter();
        return $result;
    }

    public function onAfter()
    {
        // выполнение кода независимо от кеша
    }

    public function run()
    {
        $this->includeComponentTemplate();
    }
}
