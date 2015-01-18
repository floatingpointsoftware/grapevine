<?php
namespace FloatingPoint\Grapevine\Modules\Users\Repositories;

use FloatingPoint\Grapevine\Library\Database\EloquentRepository;
use FloatingPoint\Grapevine\Modules\Users\Data\User;

class EloquentUserRepository extends EloquentRepository implements UserRepositoryInterface
{
	public function __construct(User $user)
    {
        $this->model = $user;
    }
}
