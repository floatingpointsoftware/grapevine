<?php 
namespace FloatingPoint\Grapevine\Modules\Topics\Data;

use FloatingPoint\Grapevine\Library\Database\EloquentRepository;

class EloquentReplyRepository extends EloquentRepository implements ReplyRepositoryInterface
{
    public function __construct(Reply $reply)
    {
        $this->setModel($reply);
    }

    public function save($resource)
    {
        return parent::save($resource); // TODO: Change the autogenerated stub
    }
}
