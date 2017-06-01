<?php

use PHPUnit\Framework\TestCase;
use jugger\ui\Widget;

class Button extends Widget
{
    public $id;
    public $name;
    public $value;

    public function init()
    {
        if (!$this->id && $this->name) {
            $this->id = "{$this->name}-id";
        }
    }

    public function run()
    {
        return "<button name='{$this->name}' id='{$this->id}'>{$this->value}</button>";
    }
}

class WidgetTest extends TestCase
{
    public function testBase()
    {
        $btn = new Button();
        $this->assertEquals(
            "<button name='' id=''></button>",
            $btn->render()
        );

        $btn = new Button([
            'name' => 'test',
        ]);
        $this->assertEquals(
            "<button name='test' id='test-id'></button>",
            $btn->render()
        );

        $btn = new Button([
            'name' => 'test',
            'value' => 'test value',
        ]);
        $this->assertEquals(
            "<button name='test' id='test-id'>test value</button>",
            $btn->render()
        );

        $btn = new Button([
            'id' => 'id-test',
            'name' => 'test',
            'value' => 'test value',
        ]);
        $this->assertEquals(
            "<button name='test' id='id-test'>test value</button>",
            $btn->render()
        );
    }

    public function testConstruct()
    {
        $btn1 = new Button([
            'id' => '123',
            'name' => '456',
            'value' => '789',
        ]);
        $btn2 = new Button();
        $btn2->id = '123';
        $btn2->name = '456';
        $btn2->value = '789';

        $this->assertEquals(
            $btn1->render(),
            $btn2->render()
        );
    }
}
