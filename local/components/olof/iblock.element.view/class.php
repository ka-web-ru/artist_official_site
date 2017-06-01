<?php

use \Bitrix\Iblock\ElementTable;
use \Bitrix\Iblock\ElementPropertyTable;

class IblockElementView extends \CBitrixComponent {

    public function getItem($id) {
      if (!$id) {
        return [];
      }

      return ElementTable::GetRow([
          'filter' => [
            '=ID' => $id
          ]
      ]);
    }

    public function getHumans($id) {

      if (!$id) {
        return [];
      }

      $humans_iterator = ElementPropertyTable::GetList([
      	'filter' => [
      		'=IBLOCK_ELEMENT_ID' => $id,
      		'=IBLOCK_PROPERTY_ID' => 4
      	]
      ]);

      $humans = [];
      while ($human = $humans_iterator->fetch()) {
      	$humans[$human['DESCRIPTION']][] = $human['VALUE'];
      }

      return $humans;
    }

		public function getFeedback($id) {
			$data = ElementPropertyTable::GetRow([
				'select' => [
					'VALUE'
				],
				'filter' => [
					'=IBLOCK_ELEMENT_ID' => $id,
      		'=IBLOCK_PROPERTY_ID' => 11
				]
			])['VALUE'];

			return unserialize($data)['TEXT'];
		}

		public function getServices($id) {
			if (!$id) {
				return [];
			}

			return array_map(function($item) {
				return $item['VALUE'];
			}, ElementPropertyTable::GetList([
				'select' => ['VALUE'],
				'filter' => [
					'=IBLOCK_ELEMENT_ID' => $id,
      		'=IBLOCK_PROPERTY_ID' => 2
				]
			])->fetchAll());
		}

    public function executeComponent() {
      CModule::IncludeModule('iblock');
      $this->includeComponentTemplate();
    }
}
