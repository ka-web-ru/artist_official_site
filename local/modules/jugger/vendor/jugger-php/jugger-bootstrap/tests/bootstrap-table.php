<?php

use PHPUnit\Framework\TestCase;
use jugger\bootstrap\Table;
use jugger\html\tag\Td;

class TableTest extends TestCase
{
    public function getHeaders()
    {
        return [
            'head1',
            'head2',
            'head3',
        ];
    }

    public function getItems()
    {
        return [
            [
                'cell11',
                'cell12',
                'cell13',
            ],
            [
                'cell21',
                'cell22',
                'cell23',
            ],
            [
                'cell31',
                new Td('cell32-33', [
                    'colspan' => '2',
                ]),
            ],
        ];
    }

    public function testBase()
    {
        $this->assertEquals(
            Table::widget([
                'head' => [
                    'items' => $this->getHeaders(),
                ],
                'body' => [
                    'items' => $this->getItems(),
                ],
            ]),
            "<table class='table'>".
            "<thead>".
            "<tr><th>head1</th><th>head2</th><th>head3</th></tr>".
            "</thead>".
            "<tbody>".
            "<tr><td>cell11</td><td>cell12</td><td>cell13</td></tr>".
            "<tr><td>cell21</td><td>cell22</td><td>cell23</td></tr>".
            "<tr><td>cell31</td><td colspan='2'>cell32-33</td></tr>".
            "</tbody>".
            "</table>"
        );

        $this->assertEquals(
            Table::widget([
                'inverse' => true,
                'head' => [
                    'inverse' => true,
                    'items' => $this->getHeaders(),
                ],
            ]),
            "<table class='table table-inverse'>".
            "<thead class='thead-inverse'>".
            "<tr><th>head1</th><th>head2</th><th>head3</th></tr>".
            "</thead>".
            "</table>"
        );

        $this->assertEquals(
            Table::widget([
                'bordered' => true,
                'striped' => true,
                'hover' => true,
                'caption' => 'Заголовок',
            ]),
            "<table class='table table-bordered table-striped table-hover'><caption>Заголовок</caption></table>"
        );
    }
}
