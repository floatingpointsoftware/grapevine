<?php
namespace FloatingPoint\Grapevine\Modules\Forums\Data;

use FloatingPoint\Grapevine\Library\Database\Model;
use FloatingPoint\Grapevine\Library\Events\Raiseable;
use FloatingPoint\Grapevine\Library\Slugs\Slug;
use FloatingPoint\Grapevine\Library\Slugs\Sluggable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Topic extends Model
{
    use Sluggable;
    use Raiseable;

    /**
     * @return BelongsTo
     */
    public function forum()
    {
        return $this->belongsTo(Forum::class);
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
            $topic->forum->incrementTopics();
        });

        static::deleting(function($topic)
        {
            $topic->forum->decrementTopics();
        });

    }

    public function incrementReplies()
    {
        $this->replies_count++;
        $this->forum->incrementReplies();
        $this->save();
    }

    public function decrementReplies()
    {
        $this->replies_count--;
        $this->forum->decrementReplies();
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
