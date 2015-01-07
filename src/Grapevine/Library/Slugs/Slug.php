<?php
namespace FloatingPoint\Grapevine\Library\Slugs;

use Hashids\Hashids;

class Slug
{
    /**
     * @var string
     */
    private $slug;

    /**
     * Creates a new instance of the Slug class based on the slug string provided.
     *
     * @param string $slug
     */
    public function __construct($slug)
    {
        $this->slug = $slug;
    }

    /**
     * Generate a new 8-character slug.
     *
     * @param integer $id
     * @return Slug
     */
    public static function create($id)
    {
        $salt = md5($id);
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $slug = with(new Hashids($salt, $length = 8, $alphabet))->encode($id);

        return new Slug($slug);
    }

    /**
     * Returns a string value for the Slug.
     *
     * @return string
     */
    public function __toString()
    {
        return $this->slug;
    }
}
