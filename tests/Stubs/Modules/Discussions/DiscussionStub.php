<?php 
namespace Tests\Stubs\Modules\Discussions;

class DiscussionStub
{
    public $deleted = false;

    public function delete()
    {
        $this->deleted = true;
    }
}
