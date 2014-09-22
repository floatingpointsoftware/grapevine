<?php

namespace FloatingPoint\Grapevine\Modules\Categories\Commands;

use FloatingPoint\Grapevine\Library\Commands\Command;

class UpdateCategory extends Command
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
