<?php

namespace components\jugger;

use Bitrix\Iblock\SectionTable;
use Bitrix\Iblock\ElementTable;

use jugger\bitrix\component\ComplexComponent;

class IblockRouter extends ComplexComponent
{
    public $iblockId;

    public function init()
    {
        parent::init();

        \CModule::includeModule('iblock');
    }

    public function getApplication()
    {
        global $APPLICATION;
        return $APPLICATION;
    }

	public function existAction() {
		return true;
	}

	public function callAction(string $action, array $params) {
		$this->arResult['params'] = $params;
		$this->IncludeComponentTemplate($action);
	}
}
