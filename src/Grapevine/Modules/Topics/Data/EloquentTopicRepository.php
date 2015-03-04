<?php
namespace FloatingPoint\Grapevine\Modules\Topics\Data;

use FloatingPoint\Grapevine\Library\Database\EloquentRepository;
use FloatingPoint\Grapevine\Modules\Categories\Data\Category;

class EloquentTopicRepository extends EloquentRepository implements TopicRepository
{
    function __construct(Topic $topic)
    {
        $this->setModel($topic);
    }

    /**
     * Returns a collection of recent topics.
     *
     * @param null|integer $categoryId
     * @return mixed
     */
    public function getRecent($categoryId = null)
    {
        $query = $this->model->newInstance()->with('category');
        $query = $query->orderBy('updated_at');

        if (is_integer($categoryId)) {
            $query = $query->whereCategoryId($categoryId);
        }

        return $query->paginate();
    }

    /**
     * Retrieve a topic by its slug string.
     *
     * @param string $topicSlug
     * @return mixed
     */
    public function getBySlug($topicSlug)
    {
        return $this->model->whereSlug($topicSlug)->firstOrFail();
    }

    /**
     * Retrieve all topics by the category id, paginated.
     *
     * @param integer $categoryId
     * @return Paginator
     */
    public function getByCategoryId($categoryId)
    {
        $this->model->whereCategoryId($categoryId)->paginate();
    }

    /**
     * Retrieve all topics by the category slug, paginated.
     *
     * @param string $categorySlug
     * @return mixed
     */
    public function getByCategorySlug($categorySlug)
    {
        return $this->model->whereCategoryId(Category::slugToId($categorySlug));
    }
}
