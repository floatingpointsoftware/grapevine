<?php 
namespace FloatingPoint\Grapevine\Modules\Discussions\Commands;

use FloatingPoint\Grapevine\Library\Support\Command;

class RemoveCommentCommand extends Command
{
    public $id;

    public function __construct($id)
    {
        $this->id = $id;
    }
}
