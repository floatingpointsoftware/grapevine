<?php
namespace FloatingPoint\Grapevine\Http\Controllers;

use FloatingPoint\Grapevine\Library\Support\Controller;
use FloatingPoint\Grapevine\Modules\Discussions\Data\DiscussionRepository;

class HomeController extends Controller
{
    /**
     * @var DiscussionRepository
     */
    private $discussions;

    /**
     * @param DiscussionRepository $discussions
     */
    function __construct(DiscussionRepository $discussions)
    {
        $this->discussions = $discussions;
    }

    /**
     * Retrieves a list of the most recently updated discussions.
     *
     * @return mixed
     */
    public function index()
    {
        $discussions = $this->discussions->getRecent();

        return $this->respond('home.index', compact('discussions'));
    }
}
