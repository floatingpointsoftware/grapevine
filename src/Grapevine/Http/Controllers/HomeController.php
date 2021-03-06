<?php
namespace FloatingPoint\Grapevine\Http\Controllers;

use FloatingPoint\Grapevine\Library\Support\Controller;
use FloatingPoint\Grapevine\Modules\Categories\Data\CategoryRepository;
use FloatingPoint\Grapevine\Modules\Discussions\Data\DiscussionRepository;

class HomeController extends Controller
{
    /**
     * @var DiscussionRepository
     */
    private $discussions;

    /**
     * @var CategoryRepository
     */
    private $categories;

    /**
     * @param DiscussionRepository $discussions
     */
    function __construct(DiscussionRepository $discussions, CategoryRepository $categories)
    {
        $this->discussions = $discussions;
        $this->categories = $categories;
    }

    /**
     * Retrieves a list of the most recently updated discussions.
     *
     * @return mixed
     */
    public function index()
    {
        $discussions = $this->discussions->getRecent();
        $categoryCount = $this->categories->count();

        return $this->respond('home.index', compact('discussions', 'categoryCount'));
    }
}
