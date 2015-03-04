<?php 
namespace FloatingPoint\Grapevine\Modules\Discussions\Data;

use FloatingPoint\Grapevine\Library\Database\EloquentRepository;

class EloquentCommentRepository extends EloquentRepository implements CommentRepository
{
    public function __construct(Comment $comment)
    {
        $this->setModel($comment);
    }

    public function save($resource)
    {
        return parent::save($resource); // TODO: Change the autogenerated stub
    }
}