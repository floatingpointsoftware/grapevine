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

    /**
     * Password attribute mutator.
     *
     * @param $value
     */
    public function setPasswordAttribute($value)
    {
        if (isset($this->getDirty()['password']) or !$this->exists) {
            $this->attributes["password"] = \Hash::make($value);
        }
    }

    /**
     * User profile pages should be accessible via their username - not their id.
     *
     * @return string
     */
    public function getRouteKey()
    {
        return str_slug($this->username);
    }
}
