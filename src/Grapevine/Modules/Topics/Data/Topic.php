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
            $topic->category->incrementTopics();
        });

        static::deleting(function($topic)
        {
            $topic->category->decrementTopics();
            if(count($topic->replies) > 0) {
                $topic->category->decrementReplies($topic->replies->count());
                $topic->replies->each(function($reply)
                {
                    $reply->delete();
                });
            }
        });
    }

    public function incrementReplies()
    {
        $this->replies_count++;
        $this->category->incrementReplies();
        $this->save();
    }

    public function decrementReplies()
    {
        $this->replies_count--;
        $this->category->decrementReplies();
        $this->save();
    }

    public function incrementViews()
    {
        $this->views++;
        $this->save();
    }

    public function decrementViews()
    {
        $this->views--;
        $this->save();
    }
}
