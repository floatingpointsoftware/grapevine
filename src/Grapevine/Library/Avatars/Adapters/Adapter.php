<?php
namespace FloatingPoint\Grapevine\Library\Avatars\Adapters;

use FloatingPoint\Grapevine\Modules\Users\Data\User;

interface Adapter
{
	public function get(User $user);
}
