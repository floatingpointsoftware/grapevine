<?php
namespace FloatingPoint\Grapevine\Modules\Discussions\Data;

use FloatingPoint\Grapevine\Library\Database\Model;
use FloatingPoint\Grapevine\Library\Events\Raiseable;
use FloatingPoint\Grapevine\Library\Slugs\Slug;
use FloatingPoint\Grapevine\Library\Slugs\Sluggable;
use FloatingPoint\Grapevine\Modules\Categories\Data\Category;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Discussion extends Model
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

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Whenever a user is created, create a new slug based on their username.
     */
    public static function boot()
    {
        parent::boot();
        static::creating(function ($discussion) {
            $discussion->updateSlug();
        });

        static::created(function ($discussion) {
            $discussion->category->increment('discussions_count');
        });

        static::deleted(function ($discussion) {
            $discussion->category->decrement('discussions_count');
            if (count($discussion->comments) > 0) {
                $discussion->category->decrement('comments_count', $discussion->comments->count());
                $discussion->comments->each(function ($comment) {
                    $comment->delete();
                });
            }
        });
    }

    public function incrementViews()
    {
        $this->increment('views');
    }
}
