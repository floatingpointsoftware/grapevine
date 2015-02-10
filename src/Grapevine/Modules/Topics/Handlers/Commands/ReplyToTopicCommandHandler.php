<?php 
namespace FloatingPoint\Grapevine\Modules\Topics\Handlers\Commands;

use FloatingPoint\Grapevine\Library\Events\Dispatcher;
use FloatingPoint\Grapevine\Modules\Topics\Commands\ReplyToTopicCommand;
use FloatingPoint\Grapevine\Modules\Topics\Data\ReplyFactory;
use FloatingPoint\Grapevine\Modules\Topics\Data\ReplyRepositoryInterface;

class ReplyToTopicCommandHandler
{
    use Dispatcher;

    private $replies;
    private $factory;

    public function __construct(ReplyFactory $factory, ReplyRepositoryInterface $replies)
    {
        $this->factory = $factory;
        $this->replies = $replies;
    }

    public function handle(ReplyToTopicCommand $command)
    {
        $reply = $this->factory->create($command->topicId, $command->userId, $command->title, $command->content);

        $this->replies->save($reply);

        $this->dispatch($reply->releaseEvents());
    }
}
