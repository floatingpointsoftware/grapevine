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
        $categoryWhere = function($query) use ($categorySlug) {
            $query->whereSlug($categorySlug);
        };

        return $this->model
            ->whereHas('category', $categoryWhere)
            ->orderBy('updated_at', 'desc')
            ->paginate();
    }
}
