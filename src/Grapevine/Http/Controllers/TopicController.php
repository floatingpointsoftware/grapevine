<?php
namespace FloatingPoint\Grapevine\Http\Controllers;

use FloatingPoint\Grapevine\Http\Requests\Topics\StartTopicRequest;
use FloatingPoint\Grapevine\Http\Requests\Topics\UpdateTopicRequest;
use FloatingPoint\Grapevine\Library\Support\Controller;
use FloatingPoint\Grapevine\Modules\Categories\Data\CategoryRepositoryInterface;
use FloatingPoint\Grapevine\Modules\Topics\Commands\StartTopicCommand;
use FloatingPoint\Grapevine\Modules\Topics\Commands\UpdateTopicCommand;
use FloatingPoint\Grapevine\Modules\Topics\Data\TopicRepositoryInterface;
use FloatingPoint\Grapevine\Modules\Topics\Data\Topic;

class TopicController extends Controller
{
    /**
     * @var TopicRepositoryInterface
     */
    private $topics;

    /**
     * @param TopicRepositoryInterface $topics
     * @internal param CategoryRepositoryInterface $categories
     */
    public function __construct(TopicRepositoryInterface $topics)
    {
        $this->topics = $topics;
    }

    /**
     * Method supporting the ability to browse a category's topics.
     *
     * @param string $categorySlug
     * @return mixed
     */
    public function browse(CategoryRepositoryInterface $categories, $categorySlug)
    {
        $category = $categories->getBySlug($categorySlug);
        $topics = $this->topics->getByCategoryId($category->id);

        return $this->respond('topic.browse', compact('category', 'topics'));
    }

    /**
     * @param string                   $categorySlug
     * @param CategoryRepositoryInterface $categories
     * @return \Illuminate\View\View
     */
    public function create($categorySlug, CategoryRepositoryInterface $categories)
    {
        $category = $categories->getBySlug($categorySlug);
        $topic = new Topic;
        $topic->category()->associate($category);

        return $this->respond('category.topics.create', compact('topic'));
    }

    public function store(StartTopicRequest $request, CategoryRepositoryInterface $categories, $categorySlug)
    {
        $category = $categories->getBySlug($categorySlug);

        $this->dispatch(new StartTopicCommand(
            $category->id,
            1,
            $request->get('title'),
            $request->get('body')
        ));

        return redirect()->route('category.show', [$categorySlug]);
    }

    public function edit($categorySlug, $topicSlug)
    {
        $topic = $this->topics->getBySlug($topicSlug);

        return $this->respond('category.topics.edit', compact('topic'));
    }

    public function update(UpdateTopicRequest $request, $categorySlug, $topicSlug)
    {
        $this->dispatch(new UpdateTopicCommand($request->get('title'), $topicSlug));

        return redirect()->route('category.show', [$categorySlug]);
    }

    public function show($categorySlug, $topicSlug)
    {
        $topic = $this->topics->getBySlug($topicSlug);

        $topic->incrementViews();

        return $this->respond('category.topics.show', compact('topic'));
    }

    public function destroy($categorySlug, $topicSlug)
    {
        $topic = $this->topics->getBySlug($topicSlug);
        $this->topics->delete($topic);

        return redirect()->route('category.show', [$categorySlug]);
    }
}
