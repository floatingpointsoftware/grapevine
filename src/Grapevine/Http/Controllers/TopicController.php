<?php
namespace FloatingPoint\Grapevine\Http\Controllers;

use FloatingPoint\Grapevine\Http\Requests\Topics\StartTopicRequest;
use FloatingPoint\Grapevine\Http\Requests\Topics\UpdateTopicRequest;
use FloatingPoint\Grapevine\Library\Support\Controller;
use FloatingPoint\Grapevine\Modules\Categories\Data\Category;
use FloatingPoint\Grapevine\Modules\Categories\Data\CategoryRepository;
use FloatingPoint\Grapevine\Modules\Topics\Commands\StartTopicCommand;
use FloatingPoint\Grapevine\Modules\Topics\Commands\UpdateTopicCommand;
use FloatingPoint\Grapevine\Modules\Topics\Data\TopicRepository;
use FloatingPoint\Grapevine\Modules\Topics\Data\Topic;

class TopicController extends Controller
{
    /**
     * @var TopicRepository
     */
    private $topics;

    /**
     * @param TopicRepository $topics
     */
    public function __construct(TopicRepository $topics)
    {
        $this->topics = $topics;
    }

    /**
     * Method supporting the ability to browse a category's topics.
     *
     * @return mixed
     */
    public function browse($categorySlug)
    {
        $topics = $this->topics->getByCategorySlug($categorySlug);

        return $this->respond('topic.browse', compact('topics'));
    }

    /**
     * @param CategoryRepository $categories
     * @return \Illuminate\View\View
     */
    public function create(CategoryRepository $categories)
    {
        $topic = new Topic;
        $topic->category = $categories->getBySlug(\Input::get('category'));

        return $this->respond('topic.create', compact('topic'));
    }

    /**
     * @param StartTopicRequest           $request
     * @param                             $categorySlug
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StartTopicRequest $request)
    {
        $slug = \Input::get('category');
        $categoryId = Category::slugToId($slug);
        $this->dispatch(new StartTopicCommand(
            $categoryId,
            1,
            $request->get('title'),
            $request->get('body')
        ));

        return redirect()->route('category.show', [$slug]);
    }

    /**
     * @param $categorySlug
     * @param $topicSlug
     * @return mixed
     */
    public function edit($categorySlug, $topicSlug)
    {
        $topic = $this->topics->getBySlug($topicSlug);

        return $this->respond('topic.edit', compact('topic'));
    }

    /**
     * @param UpdateTopicRequest $request
     * @param                    $categorySlug
     * @param                    $topicSlug
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateTopicRequest $request, $categorySlug, $topicSlug)
    {
        $this->dispatch(new UpdateTopicCommand($request->get('title'), $topicSlug));

        return redirect()->route('category.show', [$categorySlug]);
    }

    /**
     * @param $topicSlug
     * @return mixed
     */
    public function show($topicSlug)
    {
        $topic = $this->topics->getBySlug($topicSlug);

        $topic->incrementViews();

        return $this->respond('topic.show', compact('topic'));
    }

    /**
     * @param $categorySlug
     * @param $topicSlug
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($topicSlug)
    {
        $slug = \Input::get('category');
        $topic = $this->topics->getBySlug($topicSlug);
        $this->topics->delete($topic);

        return redirect()->route('category.index', [$slug]);
    }
}
