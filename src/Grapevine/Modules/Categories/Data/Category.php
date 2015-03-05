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

    /**
     * Use the category's slug for all get requests to the category.
     *
     * @return mixed
     */
    public function getRouteKey()
    {
        return $this->slug;
    }
}
