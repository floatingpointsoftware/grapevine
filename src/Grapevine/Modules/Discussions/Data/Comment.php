<?php 
namespace FloatingPoint\Grapevine\Modules\Discussions\Data;

use FloatingPoint\Grapevine\Library\Slugs\Sluggable;
use FloatingPoint\Grapevine\Modules\Users\Data\User;
use FloatingPoint\Grapevine\Library\Database\Model;
use FloatingPoint\Grapevine\Library\Events\Raiseable;
use FloatingPoint\Grapevine\Library\Slugs\Slug;

class Comment extends Model
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
            $comment->discussion->increment('comments_count');
            $comment->category()->increment('comments_count');
        });

        static::deleted(function($comment)
        {
            $comment->discussion->decrement('comments_count');
            $comment->category()->decrement('comments_count');
        });
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
}
