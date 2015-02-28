<?php
namespace FloatingPoint\Grapevine\Modules\Categories\Data;

use FloatingPoint\Grapevine\Library\Database\Repository;

interface CategoryRepository extends Repository
{
    /**
     * Increases the topic count for a given category.
     *
     * @param integer $categoryId
     */
    public function increaseTopicCount($categoryId);

    public function getBySlug($categorySlug);
}
