<?php
namespace FloatingPoint\Grapevine\Modules\Forums\Repositories;

use FloatingPoint\Grapevine\Library\Database\EloquentRepository;
use FloatingPoint\Grapevine\Modules\Forums\Data\Forum;
use Illuminate\Support\Facades\DB;

class EloquentForumRepository extends EloquentRepository implements ForumRepositoryInterface
{
    /**
     * @param Forum $forum
     */
    public function __construct(Forum $forum)
    {
        $this->setModel($forum);
    }

    public function getBySlug($slug)
    {
        return $this->model->where('slug', $slug)->firstOrFail();
    }

    /**
     * Increases the topic count for a given forum.
     *
     * @param integer $forumId
     */
    public function increaseTopicCount($forumId)
    {
        DB::statement('UPDATE '.$this->model->getTable().' SET topics = topics + 1');
    }
}
