<?php 
namespace Tests\Stubs\Modules\Topics;

class TopicStub
{
    public $deleted = false;

    public function delete()
    {
        $this->deleted = true;
    }
}
