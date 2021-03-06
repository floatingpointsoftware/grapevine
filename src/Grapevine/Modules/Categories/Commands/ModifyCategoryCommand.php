<?php
namespace FloatingPoint\Grapevine\Modules\Categories\Commands;

class ModifyCategoryCommand
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
