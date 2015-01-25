<?php
namespace FloatingPoint\Grapevine\Modules\Forums\Data;

use Illuminate\Database\Eloquent\Collection;

class ForumCollection extends Collection
{
    /**
     * Generates an array from the collection that can be used for forum select boxes
     * and/or dropdowns. In effect, it creates an array in a format that HTML::select can
     * utilise.
     *
     * @param integer|null $forumId If provided, will remove this forum from the select
     *     dropdown. Forums should not be able to reference themselves in a dropdown.
     * @param boolean $empty Set to false if you do not want an empty option value.
     * @return array
     */
    public function forSelect($forumId = null, $empty = true)
    {
        $forums = $this->lists('title', 'id');

        if (!is_null($forumId) && isset($forums[$forumId])) {
            unset($forums[$forumId]);
        }

        if ($empty) {
            $forums = array_merge([null => ''], $forums);
        }

        return $forums;
    }
}
