<?php
namespace FloatingPoint\Grapevine\Modules\Forums\Handlers\Commands;

use FloatingPoint\Grapevine\Modules\Forums\Commands\StartTopicCommand;
use FloatingPoint\Grapevine\Modules\Forums\Repositories\TopicRepositoryInterface;

class StartTopicCommandHandler
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

    public function handle(StartTopicCommand $command)
    {

    }
}
