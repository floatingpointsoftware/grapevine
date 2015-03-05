<?php
namespace FloatingPoint\Grapevine\Modules\Categories\Data;

use Illuminate\Database\Eloquent\Collection;

class CategoryCollection extends Collection
{
    /**
     * Generates an array from the collection that can be used for category select boxes
     * and/or dropdowns. In effect, it creates an array in a format that HTML::select can
     * utilise.
     *
     * @param integer|null $categoryId If provided, will remove this category from the select
     *     dropdown. Categories should not be able to reference themselves in a dropdown.
     * @param boolean      $empty Set to false if you do not want an empty option value.
     * @return array
     */
    public function forSelect($categoryId = null, $empty = true)
    {
        $categories = $this->lists('title', 'id');

        if (! is_null($categoryId) && isset($categories[$categoryId])) {
            unset($categories[$categoryId]);
        }

        if ($empty) {
            $categories = array_merge((array) '', $categories);
        }

        return $categories;
    }
}
