<?php

namespace FloatingPoint\Domain\Forums\Commands;

use FloatingPoint\Grapevine\Library\Commands\CommandInterface;

class UpdateForum implements CommandInterface
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

    public function data()
    {
        return ['id' => $this->id, 'attributes' => $this->attributes];
    }
}
