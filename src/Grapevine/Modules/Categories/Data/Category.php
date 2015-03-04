<?php
namespace FloatingPoint\Grapevine\Modules\Categories\Data;

use FloatingPoint\Grapevine\Library\Database\Model;
use FloatingPoint\Grapevine\Library\Events\Raiseable;
use FloatingPoint\Grapevine\Library\Slugs\Sluggable;
use FloatingPoint\Grapevine\Modules\Discussions\Data\Discussion;

class Category extends Model
{
    use Sluggable;
    use Raiseable;

    protected $fillable = ['title', 'description'];

    /**
     * Whenever a user is created, create a new slug based on their username.
     */
    public static function boot()
    {
        parent::boot();

        static::creating(function ($category) {
            $category->updateSlug();
        });

        static::deleted(function ($category) {
            $category->deleteDiscussions();
        });
    }

    /**
     * Categories have some interesting requirements that we can bundle in a custom
     * collection class for managing that functionality.
     *
     * @param array $models
     * @return CategoryCollection
     */
    public function newCollection(array $models = [])
    {
        return new CategoryCollection($models);
    }

    public function children()
    {
        return $this->hasMany(Discussion::class);
    }

    public static function slugToId($slug)
    {
        return self::whereSlug($slug)->first();
    }

    public function deleteDiscussions()
    {
        if (! empty($this->discussions)) {
            $this->discussions->each(function ($discussion) {
                $discussion->delete();
            });
        }
    }
}
