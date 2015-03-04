<?php 
namespace FloatingPoint\Grapevine\Modules\Topics\Data;

use FloatingPoint\Grapevine\Library\Slugs\Sluggable;
use FloatingPoint\Grapevine\Modules\Users\Data\User;
use FloatingPoint\Grapevine\Library\Database\Model;
use FloatingPoint\Grapevine\Library\Events\Raiseable;
use FloatingPoint\Grapevine\Library\Slugs\Slug;

class Reply extends Model
{
    use Raiseable;
    use Sluggable;

    protected $guarded = ['id'];

    public static function boot()
    {
        parent::boot();
        static::created(function($reply)
        {
            $reply->slug = Slug::fromId($reply->id);
            $reply->topic->increment('replies_count');
            $reply->category()->increment('replies_count');
        });

        static::deleted(function($reply)
        {
            $reply->topic->decrement('replies_count');
            $reply->category()->decrement('replies_count');
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
    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }

    /**
     * @return mixed
     */
    public function category()
    {
        return $this->topic->category;
    }
}
