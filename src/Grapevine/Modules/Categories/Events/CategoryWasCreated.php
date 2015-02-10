<?php
namespace FloatingPoint\Grapevine\Modules\Categories\Events;

use FloatingPoint\Grapevine\Modules\Categories\Data\Category;

class CategoryWasCreated
{
    /**
     * @var Category
     */
    private $category;

    /**
     * @param Category $category
     */
    public function __construct(Category $category)
    {
        $this->category = $category;
    }
}
