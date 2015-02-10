<?php
namespace FloatingPoint\Grapevine\Modules\Topics\Data;

use FloatingPoint\Grapevine\Library\Database\RepositoryInterface;

interface TopicRepositoryInterface
{
    /**
     * Returns a collection of recent topics.
     *
     * @param null|integer $categoryId
     * @return mixed
     */
    public function getRecent($categoryId = null);

    /**
     * Retrieve all topics by the category id, paginated.
     *
     * @param integer $categoryId
     * @return mixed
     */
    public function getByCategoryId($categoryId);
}
