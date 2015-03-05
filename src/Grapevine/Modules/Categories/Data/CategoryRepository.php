<?php
namespace FloatingPoint\Grapevine\Modules\Categories\Data;

use FloatingPoint\Grapevine\Library\Database\Repository;

interface CategoryRepository extends Repository
{
    /**
     * Return all categories in the system.
     *
     * @return mixed
     */
    public function getAll();
}
