<?php
namespace FloatingPoint\Grapevine\Library\Slugs;

/**
 * Class Sluggable
 *
 * Can be utilised inside models that require slug functionality. This will automatically create
 * slugs baseed on the id of the model once it has been created. Does not run on model record updates.
 *
 * @package FloatingPoint\Grapevine\Library\Slugs
 */
trait Sluggable
{
    /**
     * When the model boots, register a created event listener that will create a slug,
     * using the model's id as the salt value for the generation of thee slug.
     */
    public static function boot()
    {
        parent::boot();
        static::created(function($model) {
            $model->slug = Slug::create($model->id);
            $model->save();
        });
    }

    /**
     * Sets the slug attribute with the Slug value object.
     *
     * @param Slug $slug
     */
    public function setSlugAttribute(Slug $slug)
    {
        $this->attributes['slug'] = $slug;
    }

    /**
     * Returns the slug attribute as a Slug value object.
     *
     * @return Slug
     */
    public function getSlugAttribute()
    {
        return new Slug($this->attributes['slug']);
    }
}
