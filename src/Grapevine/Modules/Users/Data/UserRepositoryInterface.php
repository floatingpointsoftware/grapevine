<?php
namespace FloatingPoint\Grapevine\Modules\Users\Data;

use FloatingPoint\Grapevine\Library\Database\RepositoryInterface;

interface UserRepositoryInterface
{
    /**
     * Require a user record based on the email provided.
     *
     * @param string $email
     * @return mixed
     */
    public function getByEmail($email);
}
