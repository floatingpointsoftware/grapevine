<?php 
namespace FloatingPoint\Grapevine\Modules\Forums\Data;

use FloatingPoint\Grapevine\Library\Slugs\Sluggable;
use FloatingPoint\Grapevine\Modules\Users\Data\User;
use FloatingPoint\Grapevine\Library\Database\Model;
use FloatingPoint\Grapevine\Library\Events\Raiseable;
use FloatingPoint\Grapevine\Library\Slugs\Slug;

class Reply extends Model
{
    use Raiseable;
    use Sluggable;

    public static function boot()
    {
        parent::boot();
        static::creating(function($reply)
        {
            $reply->slug = Slug::fromId($reply->id);
            $reply->topic->incrementReplies();
        });

        static::deleting(function($reply)
        {
            $reply->topic->decrementReplies();
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
    public function forum()
    {
        return $this->topic->forum;
    }

    /**
     * A Reply is acceptable and it can be published
     *
     * @TODO: implement
     * @return void
     */
    public function approve()
    {

    }

    /**
     * A Reply is for whatever reason not acceptable
     *
     * @return void
     */
    public function deny()
    {

    }

    /**
     * A User thinks this Reply is inappropriate
     *
     * @param $userId
     * @return void
     */
    public function report($userId)
    {

    }
}
