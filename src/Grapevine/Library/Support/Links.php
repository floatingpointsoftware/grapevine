<?php
namespace FloatingPoint\Grapevine\Library\Support;

use FloatingPoint\Grapevine\Modules\Categories\Data\Category;
use FloatingPoint\Grapevine\Modules\Discussions\Data\Discussion;

class Links
{
    /**
     * Stores an index of the links that pertain to URL
     * locations throughout the application.
     *
     * @var array
     */
    protected $links = [];

    /**
     * A mutable property that defines the current scope for link generation.
     *
     * @var null
     */
    protected $scope = null;

    /**
     * When instantiated, setup the required links.
     */
    public function __construct()
    {
        $this->setupLinks();
    }

    /**
     * Sole purpose is to create the index of links required by the application.
     */
    protected function setupLinks()
    {
        $this->links['discussion'] = [
            'read' => 'discussion.read',
            'start' => 'discussion.start'
        ];

        $this->links['category'] = [
            'browse' => 'category.browse',
            'setup' => 'category.setup'
        ];
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
        $route = $this->links[$this->scope][$route];
        $args = array_merge((array) $route, $args);
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
     * Sets the scope to be used for the next method call.
     *
     * @param $scope
     * @return $this
     */
    protected function setScope($scope)
    {
        $this->scope = $scope;

        return $this;
    }

    /**
     * Retrieve a required scope.
     *
     * @param string $key
     * @return Links
     */
    public function __get($key)
    {
        return $this->setScope($key);
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
