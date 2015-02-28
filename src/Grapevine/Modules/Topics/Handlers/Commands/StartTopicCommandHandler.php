<?php
namespace FloatingPoint\Grapevine\Modules\Topics\Handlers\Commands;

use FloatingPoint\Grapevine\Library\Events\Dispatcher;
use FloatingPoint\Grapevine\Modules\Topics\Commands\StartTopicCommand;
use FloatingPoint\Grapevine\Modules\Topics\Data\TopicFactory;
use FloatingPoint\Grapevine\Modules\Topics\Data\TopicRepository;

class StartTopicCommandHandler
{
    use Dispatcher;

    /**
     * @var TopicRepository
     */
    private $topics;
    /**
     * @var TopicFactory
     */
    private $factory;

    /**
     * @param TopicRepository $topics
     */
    function __construct(TopicRepository $topics, TopicFactory $factory)
    {
        $this->topics = $topics;
        $this->factory = $factory;
    }

    /**
     * Start a new topic and fire off the relevant events.
     *
     * @param StartTopicCommand $command
     */
    public function handle(StartTopicCommand $command)
    {
        $topic = $this->factory->start($command->categoryId, $command->userId, $command->title);

        $this->topics->save($topic);

        $this->dispatch($topic->releaseEvents());
    }
}
