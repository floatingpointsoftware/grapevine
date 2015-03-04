<?php
namespace FloatingPoint\Grapevine\Modules\Discussions\Handlers\Commands;

use FloatingPoint\Grapevine\Library\Events\Dispatcher;
use FloatingPoint\Grapevine\Modules\Discussions\Commands\StartDiscussionCommand;
use FloatingPoint\Grapevine\Modules\Discussions\Data\DiscussionFactory;
use FloatingPoint\Grapevine\Modules\Discussions\Data\DiscussionRepository;
use Illuminate\Support\Facades\Auth;

class StartDiscussionCommandHandler
{
    use Dispatcher;

    /**
     * @var DiscussionRepository
     */
    private $discussions;

    /**
     * @var DiscussionFactory
     */
    private $factory;

    /**
     * @param DiscussionRepository $discussions
     */
    function __construct(DiscussionRepository $discussions, DiscussionFactory $factory)
    {
        $this->discussions = $discussions;
        $this->factory = $factory;
    }

    /**
     * Start a new discussion and fire off the relevant events.
     *
     * @param StartDiscussionCommand $command
     */
    public function handle(StartDiscussionCommand $command)
    {
        $discussion = $this->factory->start($command->categoryId, Auth::user()->id, $command->title);

        $this->discussions->save($discussion);

        $this->dispatch($discussion->releaseEvents());
    }
}
