<?php 
namespace FloatingPoint\Grapevine\Modules\Discussions\Data;

use Eloquence\Behaviours\CountCache\CountCache;
use FloatingPoint\Grapevine\Library\Database\UpdatedByCache;
use FloatingPoint\Grapevine\Library\Slugs\Sluggable;
use FloatingPoint\Grapevine\Modules\Users\Data\User;
use FloatingPoint\Grapevine\Library\Database\Model;
use FloatingPoint\Grapevine\Library\Events\Raiseable;
use FloatingPoint\Grapevine\Library\Slugs\Slug;

class Comment extends Model implements CountCache, UpdatedByCache
{
    use Raiseable;
    use Sluggable;

    protected $guarded = ['id'];

    public static function boot()
    {
        parent::boot();
        static::created(function($comment)
        {
            $comment->slug = Slug::fromId($comment->id);
        });
    }

    /**
     * Comment has relevant count caches on several models.
     *
     * @return array
     */
    public function countCaches()
    {
        return ['Category', 'Discussion', 'User'];
    }

    /**
     * Return an array of models that need their updatedBy fields updated.
     *
     * @return array
     */
    public function updatedByCaches()
    {
        return [Discussion::class, Category::class];
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function discussion()
    {
        return $this->belongsTo(Discussion::class);
    }

    /**
     * @return mixed
     */
    public function category()
    {
        return $this->discussion->category;
    }

    /**
     * This simply allows us a little syntactical sugar - instead of doing $comment->comment,
     * you can just output the $comment object itself.
     *
     * @return string
     */
    public function __toString()
    {
        return $this->comment;
    }
}
