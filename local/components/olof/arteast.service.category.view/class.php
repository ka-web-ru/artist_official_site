<?php

use \Bitrix\Iblock\ElementTable;
use \Bitrix\Iblock\ElementPropertyTable;
use \Bitrix\Iblock\PropertyTable;
use \Bitrix\Main\Entity\ReferenceField;
use \Bitrix\Main\DB\SqlExpression;

class ArteastServiceCategoryView extends \CBitrixComponent {

	public function getServiceListCategory($element_id) {
		return ElementTable::GetList([
			'select' => [
				'name' => 'IBLOCK.NAME',
				'id' => 'IBLOCK.ID'
			],
			'filter' => [
				'SERVICE.IBLOCK_ELEMENT_ID' => $element_id
			],
			'runtime' => [
				new ReferenceField('SERVICE', 'Bitrix\Iblock\ElementPropertyTable', [
					'=this.ID' => 'ref.VALUE',
					'@ref.IBLOCK_PROPERTY_ID' => new SqlExpression(PropertyTable::Query()
						->setSelect(['ID'])
						->setFilter(['=CODE' => 'service'])
					->getQuery())
				])
			]
		])->fetchAll();
	}

  public function executeComponent() {
    CModule::IncludeModule('iblock');
    $this->includeComponentTemplate();
  }
}
