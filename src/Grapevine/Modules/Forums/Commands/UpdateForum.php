<?php

namespace FloatingPoint\Grapevine\Modules\Forums\Commands;

use FloatingPoint\Grapevine\Library\Commands\Command;

class UpdateForum extends Command
{
    public $id;
    public $attributes;

    /**
     * @param integer $id
     * @param array   $attributes
     */
    public function __construct($id, $attributes)
    {
        $this->id = $id;
        $this->attributes = $attributes;
    }
}
