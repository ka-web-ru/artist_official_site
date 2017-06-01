<?php

use \Bitrix\Iblock\ElementTable;
use \Bitrix\Iblock\ElementPropertyTable;

class IblockSectionView extends \CBitrixComponent {

    public function getItems($args) {
      if (empty($args['filter'])) {
        return [];
      }

			$args = array_merge_recursive($args, [
				// 'runtime' => [
				// 	new \Bitrix\Main\Entity\ReferenceField('service', 'Bitrix\Iblock\ElementPropertyTable', [
				// 		'=this.ID' => 'ref.IBLOCK_ELEMENT_ID',
				// 		'ref.IBLOCK_PROPERTY_ID' => [2]
				// 	])
				// ],
				'order' => ['ID' => 'desc'],
				'limit' => 50
			]);

			/*

			[
					'filter' => $filter,
					'runtime' => [
						new \Bitrix\Main\Entity\ReferenceField('service', 'Bitrix\Iblock\ElementPropertyTable', [
							'=this.ID' => 'ref.IBLOCK_ELEMENT_ID',
							'ref.IBLOCK_PROPERTY_ID' => [2]
						])
					],
					'order' => ['ID' => 'desc'],
					'limit' => 25
			]
			*/

      return ElementTable::GetList($args)->fetchAll();
    }

		public function getSectionIdByElement($element_id) {
			return array_map(function($item) {
				return $item['VALUE'];
			}, ElementPropertyTable::GetList([
				'select' => [
					'VALUE'
				],
				'filter' => [
					'=IBLOCK_ELEMENT_ID' => $element_id,
					'=IBLOCK_PROPERTY_ID' => 2
				]
			])->fetchAll());
		}

		public function getItemsByIblockId($iblock_id) {
      if (!(int)$iblock_id) {
        return [];
      }

      return ElementTable::GetList([
          'filter' => [
						'IBLOCK_ID' => $iblock_id
					],
					'order' => [
						'ID' => 'desc'
					],
					'limit' => 25
      ])->fetchAll();
    }


    public function executeComponent() {
      CModule::IncludeModule('iblock');
      $this->includeComponentTemplate();
    }
}
