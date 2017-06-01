<?php

namespace jugger\bitrix\component;

abstract class ComplexComponent extends BaseComponent
{
    public $baseUrl;

    public function init()
    {
        parent::init();

        if (!$this->baseUrl) {
            throw new \Exception("Property 'baseUrl' is required");
        }
    }

    public function executeComponent()
    {
        $this->init();
        list($action, $params) = $this->getAction();
        if ($this->existAction($action)) {
            return $this->callAction($action, $params);
        }
        else {
            $this->error404();
        }
    }

    public function existAction(string $action)
    {
        return method_exists($this, $action);
    }

    public function callAction(string $action, array $params)
    {
        $callback = [$this, $action];
        return call_user_func($callback, $params);
    }

    public function error404()
    {
        global $APPLICATION;
        $filePath = $_SERVER['DOCUMENT_ROOT'] .'/404.php';
        if (file_exists($filePath)) {
            include $filePath;
        }
        else {
            $APPLICATION->RestartBuffer();
            echo "Not found";
            http_response_code(404);
        }
        exit();
    }

    public function getAction()
    {
        $actions = $this->getActions();
        $action = \CComponentEngine::ParseComponentPath($this->baseUrl, $actions, $params);

        return [$action, $params];
    }

    public function getActions()
    {
        return $this->arParams['actions'] ?? [];
    }
}
