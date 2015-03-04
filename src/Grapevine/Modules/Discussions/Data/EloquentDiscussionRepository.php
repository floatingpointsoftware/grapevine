<?php
namespace FloatingPoint\Grapevine\Modules\Discussions\Data;

use FloatingPoint\Grapevine\Library\Database\EloquentRepository;
use FloatingPoint\Grapevine\Modules\Categories\Data\Category;

class EloquentDiscussionRepository extends EloquentRepository implements DiscussionRepository
{
    function __construct(Discussion $discussion)
    {
        $this->setModel($discussion);
    }

    /**
     * Returns a collection of recent discussions.
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
     * Retrieve a discussion by its slug string.
     *
     * @param string $discussionSlug
     * @return mixed
     */
    public function getBySlug($discussionSlug)
    {
        return $this->model->whereSlug($discussionSlug)->firstOrFail();
    }

    /**
     * Retrieve all discussions by the category id, paginated.
     *
     * @param integer $categoryId
     * @return Paginator
     */
    public function getByCategoryId($categoryId)
    {
        $this->model->whereCategoryId($categoryId)->paginate();
    }

    /**
     * Retrieve all discussions by the category slug, paginated.
     *
     * @param string $categorySlug
     * @return mixed
     */
    public function getByCategorySlug($categorySlug)
    {
        return $this->model->whereCategoryId(Category::slugToId($categorySlug));
    }
}
