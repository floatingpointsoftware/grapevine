<?php 
namespace FloatingPoint\Grapevine\Modules\Topics\Handlers\Commands;

use FloatingPoint\Grapevine\Modules\Topics\Commands\UpdateReplyCommand;
use FloatingPoint\Grapevine\Library\Support\Command;
use FloatingPoint\Grapevine\Modules\Topics\Data\ReplyRepositoryInterface;

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
