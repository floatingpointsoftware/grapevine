<?php
namespace FloatingPoint\Grapevine\Http\Controllers;

use FloatingPoint\Grapevine\Library\Support\Controller;
use FloatingPoint\Grapevine\Modules\Topics\Data\TopicRepository;

class HomeController extends Controller
{
    /**
     * @var TopicRepository
     */
    private $topics;

    /**
     * @param TopicRepository $topics
     */
    function __construct(TopicRepository $topics)
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
