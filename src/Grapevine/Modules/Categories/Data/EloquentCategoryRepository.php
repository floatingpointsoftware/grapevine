<?php
namespace FloatingPoint\Grapevine\Modules\Categories\Data;

use FloatingPoint\Grapevine\Library\Database\EloquentRepository;
use Illuminate\Support\Facades\DB;
use FloatingPoint\Grapevine\Library\Slugs\SluggableRepository;

class EloquentCategoryRepository extends EloquentRepository implements CategoryRepository
{
    use SluggableRepository;

    /**
     * @param Category $category
     */
    public function __construct(Category $category)
    {
        $this->setModel($category);
    }

    /**
     * @param string $slug
     * @return mixed
     */
    public function getBySlug($slug)
    {
        return $this->model->where('slug', $slug)->firstOrFail();
    }

    /**
     * Increases the discussion count for a given category.
     *
     * @param integer $categoryId
     */
    public function increaseDiscussionCount($categoryId)
    {
        DB::statement('UPDATE '.$this->model->getTable().' SET discussions = discussions + 1');
    }
}
