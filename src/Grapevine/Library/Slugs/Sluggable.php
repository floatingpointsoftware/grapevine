<?php
namespace FloatingPoint\Grapevine\Library\Slugs;

/**
 * Class Sluggable
 *
 * Can be utilised inside models that require slug functionality. This will automatically create
 * slugs based on the id of the model once it has been created. Does not run on model record updates.
 *
 * @package FloatingPoint\Grapevine\Library\Slugs
 */
trait Sluggable
{
    /**
     * Sets the slug attribute with the Slug value object.
     *
     * @param Slug $slug
     */
    public function setSlugAttribute(Slug $slug)
    {
        $this->attributes['slug'] = (string) $slug;
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

    public function updateSlug($attr = 'title')
    {
        if ($attr == 'title') {
            $this->slug = Slug::fromTitle($this->title);
        }
        else {
            $this->slug = Slug::fromId($this->id);
        }
    }
}
