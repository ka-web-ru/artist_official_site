<?php

use PHPUnit\Framework\TestCase;
use jugger\bootstrap\Modal;
use jugger\bootstrap\PrimaryButton;
use jugger\bootstrap\DangerButton;
use jugger\html\tag\Link;

class ModalTest extends TestCase
{
    public function testDropdown()
    {
        $this->assertEquals(
            Modal::widget([
                'options' => [
                    'id' => 'test',
                ],
                'button' => 'My text',
                'title' => 'My title',
                'content' => 'My content',
                'footer' => 'My footer',
            ]),
            "<button class='btn btn-primary' type='button' data-toggle='modal' data-target='#test'>My text</button>".
            "<div id='test' role='dialog' class='modal' tabindex='-1' aria-hidden='true'>".
            "<div class='modal-dialog' role='document'>".
            "<div class='modal-content'>".
            "<div class='modal-header'>".
            "<h5 class='modal-title'>My title</h5>".
            "<button class='close' type='button' data-dismiss='modal' aria-label='Close'>".
            "<span aria-hidden='true'>&times;</span>".
            "</button>".
            "</div>".
            "<div class='modal-body'>My content</div>".
            "<div class='modal-footer'>My footer</div>".
            "</div>".
            "</div>".
            "</div>"
        );

        $this->assertEquals(
            Modal::widget([
                'large' => true,
                'button' => new Link('Test modal'),
                'title' => 'My large title',
                'content' => '...',
                'footer' => [
                    new PrimaryButton('Save'),
                    new DangerButton('Close', [
                        'data-dismiss' => 'modal',
                    ]),
                ],
            ]),
            "<a href='#' data-toggle='modal' data-target='#modal-id-2'>Test modal</a>".
            "<div id='modal-id-2' role='dialog' class='modal' tabindex='-1' aria-hidden='true'>".
            "<div class='modal-dialog modal-lg' role='document'>".
            "<div class='modal-content'>".
            "<div class='modal-header'>".
            "<h5 class='modal-title'>My large title</h5>".
            "<button class='close' type='button' data-dismiss='modal' aria-label='Close'>".
            "<span aria-hidden='true'>&times;</span>".
            "</button>".
            "</div>".
            "<div class='modal-body'>...</div>".
            "<div class='modal-footer'>".
            "<button class='btn btn-primary' type='button'>Save</button>".
            "<button class='btn btn-danger' type='button' data-dismiss='modal'>Close</button>".
            "</div>".
            "</div>".
            "</div>".
            "</div>"
        );
    }
}
