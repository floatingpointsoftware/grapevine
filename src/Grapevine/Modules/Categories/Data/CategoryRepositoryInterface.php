<?php
namespace FloatingPoint\Grapevine\Modules\Categories\Data;

use FloatingPoint\Grapevine\Library\Database\RepositoryInterface;

interface CategoryRepositoryInterface extends RepositoryInterface
{
    /**
     * Increases the topic count for a given category.
     *
     * @param integer $categoryId
     */
    public function increaseTopicCount($categoryId);

    public function getBySlug($categorySlug);
}
