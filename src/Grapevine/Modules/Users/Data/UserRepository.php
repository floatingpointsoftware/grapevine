<?php
namespace FloatingPoint\Grapevine\Modules\Users\Data;

interface UserRepository
{
    /**
     * Require a user record based on the email provided.
     *
     * @param string $email
     * @return mixed
     */
    public function getByEmail($email);
}
