<?php 
namespace FloatingPoint\Grapevine\Modules\Forums\Data;

use FloatingPoint\Grapevine\Modules\Users\Data\User;
use FloatingPoint\Grapevine\Library\Database\Model;

class Post extends Model
{
    use Raiseable;

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
     * A Post is acceptable and it can be published
     *
     * @TODO: implement
     * @return void
     */
    public function approve()
    {

    }

    /**
     * A Post is for whatever reason not acceptable
     *
     * @return void
     */
    public function deny()
    {

    }

    /**
     * A User thinks this Post is inappropriate
     *
     * @param $userId
     * @return void
     */
    public function report($userId)
    {

    }
}
