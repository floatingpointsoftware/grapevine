<?php
namespace src\Grapevine\Library\Slugs;

trait SluggableRepository 
{
    /**
     * Require a specific record by its slug.
     *
     * @param string $slug
     * @return mixed
     */
    public function requireBySlug($slug)
    {
        return $this->requireBy('slug', $slug);
    }
}
