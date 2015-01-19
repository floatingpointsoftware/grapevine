<?php
namespace FloatingPoint\Grapevine\Modules\Users\Data;

use FloatingPoint\Grapevine\Library\Database\Model;
use FloatingPoint\Grapevine\Library\Events\Raiseable;
use FloatingPoint\Grapevine\Library\Slugs\Slug;
use FloatingPoint\Grapevine\Library\Slugs\Sluggable;

class User extends Model
{
    use Sluggable;
    use Raiseable;

	public $table    = 'users';
    public $fillable = ['username', 'email', 'password'];
    public $guarded  = ['id', 'password'];

    /**
     * Whenever a user is created, create a new slug based on their username.
     */
    public static function boot()
    {
        parent::boot();
        static::creating(function($user) {
            $user->slug = Slug::fromTitle($user->username);
        });
    }
}
