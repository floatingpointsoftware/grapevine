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

    /**
     * The name of the driver to use for all avatar requests.
     *
     * @var string
     */
    private $driver;

    public function __construct($driver)
    {
        $this->driver = $driver;
    }

    /**
     * All calls to be routed through to the appropriate driver.
     *
     * @param $method
     * @param $args
     * @return mixed
     */
    public function __call($method, $args)
    {
        return call_user_func_array([$this->adapters[$this->driver], $method],  $args);
    }

    /**
     * Extend the avatar drivers on offer by registering your own!
     *
     * @param string $driver
     * @param Adapter $adapter
     */
    public function extend($driver, Adapter $adapter)
    {
        $this->adapters[$driver] = $adapter;
    }
}
