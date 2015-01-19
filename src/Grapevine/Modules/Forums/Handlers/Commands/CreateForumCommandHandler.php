<?php
namespace FloatingPoint\Grapevine\Modules\Forums\Handlers\Commands;

use FloatingPoint\Grapevine\Library\Events\Dispatcher;
use FloatingPoint\Grapevine\Modules\Forums\Commands\CreateForumCommand;
use FloatingPoint\Grapevine\Modules\Forums\Data\ForumFactory;
use FloatingPoint\Grapevine\Modules\Forums\Repositories\ForumRepositoryInterface;

class CreateForumCommandHandler
{
    use Dispatcher;

    /**
     * @var ForumRepository
     */
    private $forums;

    /**
     * @var ForumFactory
     */
    private $factory;

    /**
     * @param ForumRepositoryInterface $forums
     */
    public function __construct(ForumRepositoryInterface $forums, ForumFactory $factory)
    {
        $this->forums = $forums;
        $this->factory = $factory;
    }

    /**
     * Handle the command, creating a new forum record and returning the result.
     *
     * @param CommandInterface $command
     * @return Forum
     */
    public function handle(CreateForumCommand $command)
    {
        $forum = $this->factory->create($command->title, $command->description);

        $this->forums->save($forum);

        $this->dispatch($forum->releaseEvents());
    }
}
