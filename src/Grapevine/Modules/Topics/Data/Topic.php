<?php
namespace FloatingPoint\Grapevine\Modules\Topics\Data;

use FloatingPoint\Grapevine\Library\Database\Model;
use FloatingPoint\Grapevine\Library\Events\Raiseable;
use FloatingPoint\Grapevine\Library\Slugs\Slug;
use FloatingPoint\Grapevine\Library\Slugs\Sluggable;
use FloatingPoint\Grapevine\Modules\Categories\Data\Category;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Topic extends Model
{
    use Sluggable;
    use Raiseable;

    /**
     * @return BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    /**
     * Whenever a user is created, create a new slug based on their username.
     */
    public static function boot()
    {
        parent::boot();
        static::creating(function($topic) {
            $topic->slug = Slug::fromTitle($topic->title);
            $topic->category->increment('topics_count');
        });

        static::deleting(function($topic)
        {
            $topic->category->decrement('topics_count');
            if(count($topic->replies) > 0) {
                $topic->category->decrement('replies_count', $topic->replies->count());
                $topic->replies->each(function($reply)
                {
                    $reply->delete();
                });
            }
        });
    }

    public function incrementViews()
    {
        $this->increment('views');
    }
}
