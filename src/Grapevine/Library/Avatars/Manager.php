<?php
namespace FloatingPoint\Grapevine\Library\Avatars;

use FloatingPoint\Grapevine\Library\Avatars\Adapters\Adapter;

class Manager
{
    /**
     * Stores the adapters available to the Avatar library.
     *
     * @var array
     */
    private $adapters = [];

    public function __call($method, $args)
    {
        return call_user_func_array([$this->adapter, $method],  $args);
    }

    public function extend($driver, Adapter $adapter)
    {
        $this->adapters[$driver] = $adapter;
    }
}
