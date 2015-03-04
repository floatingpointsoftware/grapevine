<?php 
namespace FloatingPoint\Grapevine\Modules\Discussions\Handlers\Commands;

use FloatingPoint\Grapevine\Modules\Discussions\Commands\ModifyCommentCommand;
use FloatingPoint\Grapevine\Modules\Discussions\Data\CommentRepository;

class ModifyCommentCommandHandler
{
    public function __construct(CommentRepository $comments)
    {
        $this->comments = $comments;
    }

    /**
     * @param ModifyCommentCommand $command
     * @return void
     */
    public function handle(ModifyCommentCommand $command)
    {
        $comments = $this->comments->getById($command->id);

        $this->comments->update($comments, $command->toArray());
    }
}
