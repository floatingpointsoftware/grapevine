<?php 
namespace FloatingPoint\Grapevine\Modules\Discussions\Handlers\Commands;

use FloatingPoint\Grapevine\Library\Events\Dispatcher;
use FloatingPoint\Grapevine\Modules\Discussions\Commands\RespondToDiscussionCommand;
use FloatingPoint\Grapevine\Modules\Discussions\Data\CommentFactory;
use FloatingPoint\Grapevine\Modules\Discussions\Data\CommentRepository;

class RespondToDiscussionCommandHandler
{
    use Dispatcher;

    private $comments;
    private $factory;

    public function __construct(CommentFactory $factory, CommentRepository $comments)
    {
        $this->factory = $factory;
        $this->comments = $comments;
    }

    public function handle(RespondToDiscussionCommand $command)
    {
        $comment = $this->factory->create($command->discussionId, $command->userId, $command->title, $command->content);

        $this->comments->save($comment);

        $this->dispatch($comment->releaseEvents());
    }
}
