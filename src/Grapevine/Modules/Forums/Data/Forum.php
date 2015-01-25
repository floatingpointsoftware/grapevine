<?php
namespace FloatingPoint\Grapevine\Modules\Forums\Data;

use FloatingPoint\Grapevine\Library\Database\Model;
use FloatingPoint\Grapevine\Library\Events\Raiseable;
use FloatingPoint\Grapevine\Library\Slugs\Slug;
use FloatingPoint\Grapevine\Library\Slugs\Sluggable;

class Forum extends Model
{
    use Sluggable;
    use Raiseable;

    /**
     * Whenever a user is created, create a new slug based on their username.
     */
    public static function boot()
    {
        parent::boot();
        static::creating(function($forum) {
            $forum->slug = Slug::fromTitle($forum->title);
        });
    }

    /**
     * Forums have some interesting requirements that we can bundle in a custom
     * collection class for managing that functionality.
     *
     * @param array $models
     * @return ForumCollection
     */
    public function newCollection(array $models = array())
    {
        return new ForumCollection($models);
    }
}
