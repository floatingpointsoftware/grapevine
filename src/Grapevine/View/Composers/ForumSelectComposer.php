<?php
namespace FloatingPoint\Grapevine\View\Composers;

use FloatingPoint\Grapevine\Modules\Forums\Repositories\ForumRepositoryInterface;
use Illuminate\Contracts\View\View;

class ForumSelectComposer
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
     * @param View $view
     */
    public function compose(View $view)
    {
        $view->with('forums', $this->forums->getAll()->forSelect($view->forum->id));
    }
}
