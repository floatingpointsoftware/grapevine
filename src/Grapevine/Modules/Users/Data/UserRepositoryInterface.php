<?php
namespace FloatingPoint\Grapevine\Modules\Users\Data;

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
