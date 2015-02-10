<?php
namespace FloatingPoint\Grapevine\Modules\Categories\Data;

use FloatingPoint\Grapevine\Modules\Categories\Events\CategoryWasCreated;

class CategoryFactory
{
    /**
     * Create a new category object with the required data.
     *
     * @param string $title
     * @param string $description
     * @return Category
     */
    public function create($title, $description)
    {
        $category = new Category;
        $category->title = $title;
        $category->description = $description;

        $category->raise(new CategoryWasCreated($category));

        return $category;
    }
}
