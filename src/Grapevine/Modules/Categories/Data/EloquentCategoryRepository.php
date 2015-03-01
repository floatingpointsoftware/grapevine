<?php
namespace FloatingPoint\Grapevine\Modules\Categories\Data;

use FloatingPoint\Grapevine\Library\Database\EloquentRepository;
use Illuminate\Support\Facades\DB;
use src\Grapevine\Library\Slugs\SluggableRepository;

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

    public function getBySlug($slug)
    {
        return $this->model->where('slug', $slug)->firstOrFail();
    }

    /**
     * Increases the topic count for a given category.
     *
     * @param integer $categoryId
     */
    public function increaseTopicCount($categoryId)
    {
        DB::statement('UPDATE '.$this->model->getTable().' SET topics = topics + 1');
    }
}
