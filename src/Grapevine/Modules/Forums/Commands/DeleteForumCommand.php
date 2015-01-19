<?php
namespace FloatingPoint\Grapevine\Modules\Forums\Commands;

class DeleteForumCommand
{
    public $id;

    public function __construct($id)
    {
        $this->id = $id;
    }
} 
