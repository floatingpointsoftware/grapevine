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
     * Return all categories in the system.
     *
     * @return mixed
     */
    public function getAll()
    {
        return $this->model->all();
    }
}
