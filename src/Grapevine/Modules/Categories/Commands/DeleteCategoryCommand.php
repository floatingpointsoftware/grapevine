<?php
namespace FloatingPoint\Grapevine\Modules\Categories\Commands;

class DeleteCategoryCommand
{
    public $id;

    public function __construct($id)
    {
        $this->id = $id;
    }
} 
