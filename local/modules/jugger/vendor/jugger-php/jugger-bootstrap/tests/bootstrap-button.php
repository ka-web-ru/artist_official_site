<?php

use PHPUnit\Framework\TestCase;
use jugger\bootstrap\Button;
use jugger\bootstrap\LinkButton;
use jugger\bootstrap\ButtonGroup;
use jugger\bootstrap\RadioButtonGroup;
use jugger\bootstrap\CheckboxButtonGroup;
use jugger\bootstrap\DangerButton;
use jugger\bootstrap\InfoButton;
use jugger\bootstrap\PrimaryButton;
use jugger\bootstrap\SecondaryButton;
use jugger\bootstrap\SuccessButton;
use jugger\bootstrap\WarningButton;

class ButtonTest extends TestCase
{
    public function testBase()
    {
        $this->assertEquals(
            new Button(),
            "<button class='btn' type='button'></button>"
        );
        $this->assertEquals(
            new Button('Primary', [
                'type' => 'primary',
            ]),
            "<button class='btn btn-primary' type='button'>Primary</button>"
        );
        $this->assertEquals(
            new Button('Primary', [
                'type' => 'success',
                'outline' => true,
            ]),
            "<button class='btn btn-outline-success' type='button'>Primary</button>"
        );
        $this->assertEquals(
            new Button('Primary', [
                'type' => 'secondary',
                'size' => 'lg',
            ]),
            "<button class='btn btn-secondary btn-lg' type='button'>Primary</button>"
        );
        $this->assertEquals(
            new Button('Primary', [
                'type' => 'danger',
                'block' => true,
            ]),
            "<button class='btn btn-danger btn-block' type='button'>Primary</button>"
        );
        $this->assertEquals(
            new Button('Primary', [
                'type' => 'warning',
                'active' => true,
                'disabled' => true,
            ]),
            "<button class='btn btn-warning active' type='button' disabled>Primary</button>"
        );
        $this->assertEquals(
            new Button('', [
                'id' => 'my-button',
            ]),
            "<button class='btn' type='button' id='my-button'></button>"
        );
    }

    public function testLink()
    {
        $this->assertEquals(
            (string) new LinkButton('Primary', '#', [
                'type' => 'secondary',
                'size' => 'lg',
            ]),
            "<a class='btn btn-secondary btn-lg' href='#' role='button'>Primary</a>"
        );
        $this->assertEquals(
            (string) new LinkButton('Home', '/'),
            "<a class='btn btn-link' href='/' role='button'>Home</a>"
        );
    }

    public function testAdvanced()
    {
        $this->assertEquals(
            new PrimaryButton('Primary'),
            "<button class='btn btn-primary' type='button'>Primary</button>"
        );
        $this->assertEquals(
            new SecondaryButton('Secondary'),
            "<button class='btn btn-secondary' type='button'>Secondary</button>"
        );
        $this->assertEquals(
            new SuccessButton('Success'),
            "<button class='btn btn-success' type='button'>Success</button>"
        );
        $this->assertEquals(
            new InfoButton('Info'),
            "<button class='btn btn-info' type='button'>Info</button>"
        );
        $this->assertEquals(
            new WarningButton('Warning'),
            "<button class='btn btn-warning' type='button'>Warning</button>"
        );
        $this->assertEquals(
            new DangerButton('Danger'),
            "<button class='btn btn-danger' type='button'>Danger</button>"
        );
    }

    public function testGroup()
    {
        $this->assertEquals(
            ButtonGroup::widget([
                'size' => 'lg',
                'vertical' => true,
            ]),
            "<div class='btn-group-vertical btn-group-lg' role='group'></div>"
        );
        $this->assertEquals(
            ButtonGroup::widget([
                'options' => [
                    'id' => 'test',
                ],
                'items' => [
                    new Button('Btn1'),
                    new Button('Btn2'),
                    "Text btn",
                ],
            ]),
            "<div class='btn-group' role='group' id='test'><button class='btn' type='button'>Btn1</button><button class='btn' type='button'>Btn2</button><button class='btn' type='button'>Text btn</button></div>"
        );
    }
}
