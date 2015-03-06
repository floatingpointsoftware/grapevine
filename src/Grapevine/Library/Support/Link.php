<?php
namespace FloatingPoint\Grapevine\Library\Support;

class Link
{
    /**
     * Collection of links to be checked with for route instantiation.
     *
     * @var array
     */
    protected $links = [];

    /**
     * A mutable property that defines the current scope for link generation.
     *
     * @var null
     */
    protected $scopes = [];

    /**
     * Register a collection of links.
     *
     * @param array $links
     */
    public function register(array $links)
    {
        $this->links = array_merge($this->links, $links);
    }

    /**
     * Returns the route for the requested link.
     *
     * @param string $route
     * @param array $args
     * @return mixed
     */
    protected function link($route, $args)
    {
        $routeName = $this->routeName($route);

        // Why do we do this? To validate the arguments provided. We let the
        // language use type-hinting to check the validity of the arguments.
        if (isset($this->links[$routeName])) {
            $args = call_user_func_array($this->links[$routeName], $args);
        }

        $params = [$routeName, $args];
        $link = call_user_func_array('route', $params);

        $this->resetScope();

        return $link;
    }

    /**
     * Generates the route name based on the scopes + the route provided.
     *
     * @param string $route
     * @return string
     */
    protected function routeName($route)
    {
        return implode('.', $this->scopes).'.'.$route;
    }

    /**
     * Reset the scope for future link requests.
     */
    protected function resetScope()
    {
        $this->scopes = [];
    }

    /**
     * Retrieve a required scope.
     *
     * @param string $key
     * @return Link
     */
    public function __get($key)
    {
        $this->scopes[] = $key;

        return $this;
    }

    /**
     * Where the magic happens. The first call to the links class will set the scope, and return
     * the object, allowing for the second call to then define exactly which route its after
     * within the index of links.
     *
     * @param string $method
     * @param array $args
     * @return Link|mixed
     */
    public function __call($method, $args)
    {
        return $this->link($method, $args);
    }
}
