<?php

namespace components\jugger;

use jugger\bitrix\component\WidgetComponent;

class ItemView extends WidgetComponent
{
    public $id;
    public $model;

    public function run()
    {
        $this->initModel();

        $this->arParams['id'] = $this->id;
        $this->arParams['model'] = $this->model;

        $this->includeComponentTemplate();
    }

    public function initModel()
    {
        if ($this->model) {
            if (is_array($this->model)) {
                $this->id = (int) ($this->model['id'] ?? $this->model['ID'] ?? null);
            }
        }
        elseif ($this->id) {
            $this->model = $this->getModelById($this->id);
        }
        else {
            throw new \Exception("Property 'model' or 'id' is required");
        }
    }

    public function getModelById(int $id)
    {
        return null;
    }
}
