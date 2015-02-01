<?php 
namespace FloatingPoint\Grapevine\Modules\Forums\Handlers\Commands;

use FloatingPoint\Grapevine\Modules\Forums\Commands\UpdateReplyCommand;
use FloatingPoint\Grapevine\Library\Support\Command;
use FloatingPoint\Grapevine\Modules\Forums\Repositories\ReplyRepositoryInterface;

class UpdateReplyCommandHandler
{
    public function __construct(ReplyRepositoryInterface $replies)
    {
        $this->replies = $replies;
    }

    public function handle(UpdateReplyCommand $command)
    {
        $replies = $this->replies->getById($command->id);

        $this->replies->update($replies, $command->toArray());
    }
}
