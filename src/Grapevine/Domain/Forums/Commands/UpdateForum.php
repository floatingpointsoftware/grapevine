<?php 

namespace FloatingPoint\Domain\Forums\Commands;

use FloatingPoint\Grapevine\Library\Commands\Command;

class UpdateForum implements Command
{
    public $id;
    public $attributes;

    /**
     * @param integer $id
     * @param array $attributes
     */
    public function __construct($id, $attributes)
    {
        $this->id = $id;
        $this->attributes = $attributes;
    }
}
