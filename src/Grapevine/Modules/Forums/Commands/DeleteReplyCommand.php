<?php 
namespace FloatingPoint\Grapevine\Modules\Forums\Commands;

use FloatingPoint\Grapevine\Library\Support\Command;

class DeleteReplyCommand extends Command
{
    public $id;

    public function __construct($id)
    {
        $this->id = $id;
    }
}
