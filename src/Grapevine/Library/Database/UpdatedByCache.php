<?php
namespace FloatingPoint\Grapevine\Library\Database;

interface UpdatedByCache
{
    /**
     * Return an array of models that need their updatedBy fields updated.
     *
     * @return array
     */
    public function updatedByCaches();
}
