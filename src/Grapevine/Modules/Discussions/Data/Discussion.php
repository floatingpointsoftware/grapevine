<?php
namespace FloatingPoint\Grapevine\Modules\Discussions\Data;

use Eloquence\Behaviours\CountCache\CountCache;
use FloatingPoint\Grapevine\Library\Database\Model;
use FloatingPoint\Grapevine\Library\Events\Raiseable;
use FloatingPoint\Grapevine\Library\Slugs\Slug;
use FloatingPoint\Grapevine\Library\Slugs\Sluggable;
use FloatingPoint\Grapevine\Modules\Categories\Data\Category;
use FloatingPoint\Grapevine\Modules\Users\Data\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Discussion extends Model implements CountCache
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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Count caches on categories, and users.
     *
     * @return array
     */
    public function countCaches()
    {
        return [Category::class, User::class];
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
    }

    public function incrementViews()
    {
        $this->increment('views');
    }
}
