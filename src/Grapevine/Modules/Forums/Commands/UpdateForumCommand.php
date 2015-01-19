<?php
namespace FloatingPoint\Grapevine\Modules\Forums\Commands;

class UpdateForumCommand
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
