<?php
namespace FloatingPoint\Grapevine\Http\Controllers;

use FloatingPoint\Grapevine\Http\Requests\Discussions\StartDiscussionRequest;
use FloatingPoint\Grapevine\Http\Requests\Discussions\UpdateDiscussionRequest;
use FloatingPoint\Grapevine\Library\Support\Controller;
use FloatingPoint\Grapevine\Modules\Categories\Data\Category;
use FloatingPoint\Grapevine\Modules\Categories\Data\CategoryRepository;
use FloatingPoint\Grapevine\Modules\Discussions\Commands\StartDiscussionCommand;
use FloatingPoint\Grapevine\Modules\Discussions\Commands\ModifyDiscussionCommand;
use FloatingPoint\Grapevine\Modules\Discussions\Data\DiscussionRepository;
use FloatingPoint\Grapevine\Modules\Discussions\Data\Discussion;
use Illuminate\Support\Facades\Input;

class DiscussionController extends Controller
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
    public function __construct(CategoryRepository $categories, DiscussionRepository $discussions)
    {
        $this->discussions = $discussions;
        $this->categories = $categories;
    }

    /**
     * Method supporting the ability to browse a category's discussions.
     *
     * @return mixed
     */
    public function browse($categorySlug)
    {
        $category = $this->categories->getBySlug($categorySlug);
        $discussions = $this->discussions->getByCategorySlug($categorySlug);

        return $this->respond('discussion.browse', compact('category', 'discussions'));
    }

    /**
     * @param null $categorySlug
     * @return \Illuminate\View\View
     */
    public function create($categorySlug = null)
    {
        $discussion = new Discussion;

        if (! is_null($categorySlug)) {
            $category = $this->categories->getBySlug($categorySlug);
        }

        return $this->respond('discussion.create', compact('discussion', 'category'));
    }

    /**
     * @param StartDiscussionRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StartDiscussionRequest $request)
    {
        $discussion = $this->dispatchFrom(StartDiscussionCommand::class, $request);

        return redirect()->route('discussion.show', [$discussion->slug]);
    }

    /**
     * @param string $discussionSlug
     * @return mixed
     */
    public function edit($discussionSlug)
    {
        $discussion = $this->discussions->getBySlug($discussionSlug);

        return $this->respond('discussion.edit', compact('discussion'));
    }

    /**
     * @param UpdateDiscussionRequest $request
     * @param                    $categorySlug
     * @param                    $discussionSlug
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateDiscussionRequest $request, $categorySlug, $discussionSlug)
    {
        $this->dispatch(new ModifyDiscussionCommand($request->get('title'), $discussionSlug));

        return redirect()->route('category.show', [$categorySlug]);
    }

    /**
     * @param $discussionSlug
     * @return mixed
     */
    public function show($discussionSlug)
    {
        $discussion = $this->discussions->getBySlug($discussionSlug);

        $discussion->incrementViews();

        return $this->respond('discussion.show', compact('discussion'));
    }

    /**
     * @param $categorySlug
     * @param $discussionSlug
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($discussionSlug)
    {
        $slug = \Input::get('category');
        $discussion = $this->discussions->getBySlug($discussionSlug);
        $this->discussions->delete($discussion);

        return redirect()->route('category.index', [$slug]);
    }
}
