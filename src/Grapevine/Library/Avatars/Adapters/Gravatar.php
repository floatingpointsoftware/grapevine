<?php
namespace FloatingPoint\Grapevine\Library\Avatars\Adapters;

use FloatingPoint\Grapevine\Modules\Users\Data\User;

class Gravatar implements Adapter
{
    /**
     * @var \FloatingPoint\Gravatar\Gravatar
     */
    private $gravatar;

    /**
     * @param \FloatingPoint\Gravatar\Gravatar $gravatar
     */
    public function __construct(\FloatingPoint\Gravatar\Gravatar $gravatar)
    {
        $this->gravatar = $gravatar;
    }

    /**
     * Implements the avatar driver retrieval for gravatar.
     *
     * @param User $user
     * @return string
     */
    public function get(User $user, $size = null)
    {
        return $this->gravatar->src($user->email, config('grapevine.avatar.size', $size ?: 100));
    }
}
