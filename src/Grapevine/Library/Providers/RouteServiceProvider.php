<?php
namespace FloatingPoint\Grapevine\Library\Providers;

use FloatingPoint\Grapevine\Modules\Categories\Data\Category;
use FloatingPoint\Grapevine\Modules\Categories\Data\CategoryRepository;
use FloatingPoint\Grapevine\Modules\Discussions\Data\Discussion;
use FloatingPoint\Grapevine\Modules\Discussions\Data\DiscussionRepository;
use FloatingPoint\Grapevine\Modules\Users\Data\User;
use Illuminate\Routing\Router;

class RouteServiceProvider extends \Illuminate\Foundation\Support\Providers\RouteServiceProvider
{
    /**
     * This namespace is applied to the controller routes in your routes file.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'FloatingPoint\Grapevine\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function boot(Router $router)
    {
        parent::boot($router);

        $router->model('category', Category::class);
        $router->model('discussion', Discussion::class);
        $router->model('user', User::class);

        $router->bind('category', function($slug) {
            return app(CategoryRepository::class)->getBySlug($slug);
        });

        $router->bind('discussion', function($slug) {
            return app(DiscussionRepository::class)->getBySlug($slug);
        });

        $router->bind('user', function($slug) {
            return app(UserRepository::class)->getBySlug($slug);
        });
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->loadRoutesFrom(__DIR__.'/../../Http/routes.php');
    }
}
