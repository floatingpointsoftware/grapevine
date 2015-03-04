<?php
namespace FloatingPoint\Grapevine\Modules\Topics\Data;

interface TopicRepository
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

    /**
     * Retrieve all topics by the category slug, paginated.
     *
     * @param string $categorySlug
     * @return mixed
     */
    public function getByCategorySlug($categorySlug);
}
