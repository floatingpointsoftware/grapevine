<?php
namespace FloatingPoint\Grapevine\Modules\Categories\Data;

use FloatingPoint\Grapevine\Library\Database\RepositoryInterface;

interface CategoryRepositoryInterface
{
    /**
     * Increases the topic count for a given category.
     *
     * @param integer $categoryId
     */
    public function increaseTopicCount($categoryId);
}
