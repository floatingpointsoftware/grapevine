<?php
namespace FloatingPoint\Grapevine\Library\Support;

class Links
{
    /**
     * A mutable property that defines the current scope for link generation.
     *
     * @var null
     */
    protected $scope = null;

    /**
     * Returns the route for the requested link.
     *
     * @param string $route
     * @param array $args
     * @return mixed
     */
    protected function link($route, $args)
    {
        $routeName = "{$this->scope}.{$route}";
        $args = array_merge((array) $routeName, $args);
        $link = call_user_func_array('route', $args);

        $this->resetScope();

        return $link;
    }

    /**
     * Reset the scope for future link requests.
     */
    protected function resetScope()
    {
        $this->scope = null;
    }

    /**
     * Retrieve a required scope.
     *
     * @param string $key
     * @return Links
     */
    public function __get($key)
    {
        $this->scope = $key;

        return $this;
    }

    /**
     * Where the magic happens. The first call to the links class will set the scope, and return
     * the object, allowing for the second call to then define exactly which route its after
     * within the index of links.
     *
     * @param string $method
     * @param array $args
     * @return Links|mixed
     */
    public function __call($method, $args)
    {
        return $this->link($method, $args);
    }
}
