<?php
namespace FloatingPoint\Grapevine\Http\Controllers;

use FloatingPoint\Grapevine\Library\Support\Controller;
use FloatingPoint\Grapevine\Modules\Topics\Data\TopicRepositoryInterface;

class HomeController extends Controller
{
    /**
     * @var TopicRepositoryInterface
     */
    private $topics;

    /**
     * @param TopicRepositoryInterface $topics
     */
    function __construct(TopicRepositoryInterface $topics)
    {
        $this->topics = $topics;
    }

    /**
     * Retrieves a list of the most recently updated topics.
     *
     * @return mixed
     */
    public function index()
    {
        $topics = $this->topics->getRecent();

        return $this->respond('home.index', compact('topics'));
    }
}
