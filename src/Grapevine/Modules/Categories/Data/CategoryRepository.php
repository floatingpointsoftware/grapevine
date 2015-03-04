<?php
namespace FloatingPoint\Grapevine\Modules\Categories\Data;

use FloatingPoint\Grapevine\Library\Database\Repository;

interface CategoryRepository extends Repository
{
    /**
     * Increases the discussion count for a given category.
     *
     * @param integer $categoryId
     */
    public function increaseDiscussionCount($categoryId);

    /**
     * Retrieve a category by its slug string value.
     *
     * @param string $categorySlug
     * @return mixed
     */
    public function getBySlug($categorySlug);
}
