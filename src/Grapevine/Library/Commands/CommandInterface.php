<?php

namespace FloatingPoint\Grapevine\Library\Commands;

interface CommandInterface
{
    /**
     * Should return the data that was assigned to the command upon creation.
     *
     * @return mixed
     */
    public function data();
}
