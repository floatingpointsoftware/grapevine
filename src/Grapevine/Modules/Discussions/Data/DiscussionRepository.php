<?php
namespace FloatingPoint\Grapevine\Modules\Discussions\Data;

interface DiscussionRepository
{
    /**
     * Returns a collection of recent discussions.
     *
     * @param null|integer $categoryId
     * @return mixed
     */
    public function getRecent($categoryId = null);

    /**
     * Retrieve all discussions by the category id, paginated.
     *
     * @param integer $categoryId
     * @return mixed
     */
    public function getByCategoryId($categoryId);

    /**
     * Retrieve all discussions by the category slug, paginated.
     *
     * @param string $categorySlug
     * @return mixed
     */
    public function getByCategorySlug($categorySlug);
}
