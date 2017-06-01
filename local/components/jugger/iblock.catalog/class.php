<?php

namespace components\jugger;

use Bitrix\Iblock\SectionTable;
use Bitrix\Iblock\ElementTable;

use jugger\bitrix\component\ComplexComponent;

class IblockCatalog extends ComplexComponent
{
    public $iblockId;

    public function init()
    {
        parent::init();

        if (!$this->iblockId) {
            throw new \Exception("Свойство 'iblockId' обязательно");
        }
        \CModule::includeModule('iblock');
    }

    public function getApplication()
    {
        global $APPLICATION;
        return $APPLICATION;
    }

    public function getActions()
    {
        return [
            'actionIndex' => 'index.php',
            'actionSection' => '#SECTION_CODE#/',
            'actionElement' => '#SECTION_CODE#/#ELEMENT_CODE#/',
            'actionSearch' => 'search',
        ];
    }

    public function actionIndex()
    {
        $params = [
            'id' => $this->iblockId,
        ];
        $template = $this->arParams['iblockTemplate'] ?? $this->getTemplateName();

        $this->getApplication()->includeComponent("jugger:iblock.view", $template, $params);
    }

    public function actionSection(array $args)
    {
        $section = $this->getSection($args['SECTION_CODE']);
        $params = [
            'model' => $section,
        ];
        $template = $this->arParams['sectionTemplate'] ?? $this->getTemplateName();

        $this->getApplication()->includeComponent("jugger:iblock.section.view", $template, $params);
    }

    public function actionElement(array $args)
    {
        $section = $this->getSection($args['SECTION_CODE']);
        $element = $this->getElement($args['ELEMENT_CODE'], $section['ID']);
        $params = [
            'model' => $element,
        ];
        $template = $this->arParams['elementTemplate'] ?? $this->getTemplateName();

        $this->getApplication()->includeComponent("jugger:iblock.element.view", $template, $params);
    }

    public function actionSearch()
    {
        $q = (string) $_GET['q'] ?? "";
        throw new \Exception("Пока в работе");
    }

    public function getSection(string $sectionCode)
    {
        $filter = [
            'CODE' => $sectionCode,
            'IBLOCK_ID' => $this->iblockId,
        ];
        $model = SectionTable::getRow(compact('filter'));
        if (!$model) {
            $this->error404();
        }

        return $model;
    }

    public function getElement(string $elementCode, int $sectionId)
    {
        $filter = [
            'CODE' => $elementCode,
            'IBLOCK_ID' => $this->iblockId,
            'IBLOCK_SECTION_ID' => $sectionId,
        ];
        $model = ElementTable::getRow(compact('filter'));
        if (!$model) {
            $this->error404();
        }

        return $model;
    }
}
