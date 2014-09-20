<?php 

namespace FloatingPoint\Domain\Forums\Commands; 

class DeleteForum
{
    public $id;

    public function __construct($id)
    {
        $this->id = $id;
    }
} 
