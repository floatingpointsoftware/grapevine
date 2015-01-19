<?php
namespace FloatingPoint\Grapevine\Modules\Forums\Data;

use FloatingPoint\Grapevine\Library\Database\Model;
use FloatingPoint\Grapevine\Library\Events\Raiseable;
use FloatingPoint\Grapevine\Library\Slugs\Slug;

class Topic extends Model
{
    use Sluggable;
    use Raiseable;

    public function forum()
    {
        return $this->belongsTo(Forum::class);
    }

    /**
     * Whenever a user is created, create a new slug based on their username.
     */
    public static function boot()
    {
        parent::boot();
        static::creating(function($topic) {
            $topic->slug = Slug::fromTitle($topic->title);
        });
    }
}
