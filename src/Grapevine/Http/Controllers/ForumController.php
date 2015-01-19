<?php
namespace FloatingPoint\Http\Controllers;

use FloatingPoint\Grapevine\Http\Requests\Forums\CreateForumRequest;
use FloatingPoint\Grapevine\Library\Support\Controller;
use FloatingPoint\Grapevine\Modules\Forums\Commands\CreateForumCommand;
use FloatingPoint\Grapevine\Modules\Forums\Repositories\ForumRepositoryInterface;

class ForumController extends Controller
{
    /**
     * @var ForumRepositoryInterface
     */
    private $forums;

    /**
     * @param ForumRepositoryInterface $forums
     */
    function __construct(ForumRepositoryInterface $forums)
    {
        $this->forums = $forums;
    }

    /**
     * Retrieve a list of forums and return a view.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $forums = $this->forums->getAll();

        return $this->respond('forum.index', compact('forums'));
    }

    /**
     * Stores a new forum
     *
     * @param CreateForumRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(CreateForumRequest $request)
    {
        $this->dispatchFrom(CreateForumCommand::class, $request);

        return redirect()->route('forum.index');
    }
}
