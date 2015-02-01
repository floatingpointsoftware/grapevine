<?php
namespace FloatingPoint\Grapevine\Modules\Forums\Repositories;

use FloatingPoint\Grapevine\Library\Database\EloquentRepository;
use FloatingPoint\Grapevine\Modules\Forums\Data\Topic;

class EloquentTopicRepository extends EloquentRepository implements TopicRepositoryInterface
{
    function __construct(Topic $topic)
    {
        $this->setModel($topic);
    }

    /**
     * Returns a collection of recent topics.
     *
     * @param null|integer $forumId
     * @return mixed
     */
    public function getRecent($forumId = null)
    {
        $query = $this->model->newInstance()->with('forum');
        $query = $query->orderBy('updated_at');

        if (is_integer($forumId)) {
            $query = $query->whereForumId($forumId);
        }

        return $query->paginate();
    }

    public function getBySlug($topicSlug)
    {
        return $this->model->whereSlug($topicSlug)->firstOrFail();
    }
}
