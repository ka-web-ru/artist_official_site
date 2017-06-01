<?php

use PHPUnit\Framework\TestCase;
use jugger\bootstrap\Alert;

class AlertTest extends TestCase
{
    public function testBase()
    {
        $this->assertEquals(
            Alert::widget([
                'type' => 'success',
            ]),
            "<div class='alert alert-success' role='alert'></div>"
        );
        $this->assertEquals(
            Alert::widget([
                'content' => 'Test content!',
            ]),
            "<div class='alert' role='alert'><p>Test content!</p></div>"
        );
        $this->assertEquals(
            Alert::widget([
                'header' => 'Test header!',
            ]),
            "<div class='alert' role='alert'><h4 class='alert-heading'>Test header!</h4></div>"
        );
        $this->assertEquals(
            Alert::widget([
                'dismiss' => true,
            ]),
            "<div class='alert' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden=\"true\">&times;</span></button></div>"
        );
        $this->assertEquals(
            Alert::widget([
                'dismiss' => true,
                'type' => 'danger',
                'header' => 'Test header!',
                'content' => 'Test content!',
            ]),
            "<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden=\"true\">&times;</span></button><h4 class='alert-heading'>Test header!</h4><p>Test content!</p></div>"
        );
    }
}
