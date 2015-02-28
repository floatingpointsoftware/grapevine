<?php
namespace FloatingPoint\Grapevine\Modules\Categories\Data;

use FloatingPoint\Grapevine\Library\Database\Model;
use FloatingPoint\Grapevine\Library\Events\Raiseable;
use FloatingPoint\Grapevine\Library\Slugs\Slug;
use FloatingPoint\Grapevine\Library\Slugs\Sluggable;
use FloatingPoint\Grapevine\Modules\Topics\Data\Topic;

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
        static::created(function($category) {
            $category->slug = Slug::fromTitle($category->title);
        });

        static::deleted(function($category)
        {
            if(! empty($category->topics)) {
                $category->topics->each(function($topic)
                {
                    $topic->delete();
                });
            }
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
        return $this->hasMany(Topic::class);
    }

    public static function slugToId($slug)
    {
        return self::whereSlug($slug)->first();
    }
}
