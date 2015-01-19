<?php
namespace FloatingPoint\Grapevine\Modules\Forums\Handlers\Commands;

use FloatingPoint\Grapevine\Library\Events\Dispatcher;
use FloatingPoint\Grapevine\Modules\Forums\Commands\StartTopicCommand;
use FloatingPoint\Grapevine\Modules\Forums\Data\TopicFactory;
use FloatingPoint\Grapevine\Modules\Forums\Repositories\TopicRepositoryInterface;

class StartTopicCommandHandler
{
    use Dispatcher;

    /**
     * @var TopicRepositoryInterface
     */
    private $topics;
    /**
     * @var TopicFactory
     */
    private $factory;

    /**
     * @param TopicRepositoryInterface $topics
     */
    function __construct(TopicRepositoryInterface $topics, TopicFactory $factory)
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
        $topic = $this->factory->start($command->forumId, $command->userId, $command->title, $command->description);

        $this->topics->save($topic);

        $this->dispatch($topic->releaseEvents());
    }
}
