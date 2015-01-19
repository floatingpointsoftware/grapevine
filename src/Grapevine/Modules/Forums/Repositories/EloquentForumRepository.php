<?php
namespace FloatingPoint\Grapevine\Modules\Forums\Repositories;

use FloatingPoint\Grapevine\Library\Database\EloquentRepository;
use FloatingPoint\Grapevine\Modules\Forums\Data\Forum;

class EloquentForumRepository extends EloquentRepository implements ForumRepositoryInterface
{
    function __construct(Forum $forum)
    {
        $this->setModel($forum);
    }
}
