<?php 
namespace FloatingPoint\Grapevine\Modules\Topics\Handlers\Commands;

use FloatingPoint\Grapevine\Modules\Topics\Commands\UpdateReplyCommand;
use FloatingPoint\Grapevine\Modules\Topics\Data\ReplyRepository;

class UpdateReplyCommandHandler
{
    public function __construct(ReplyRepository $replies)
    {
        $this->replies = $replies;
    }

    /**
     * @param UpdateReplyCommand $command
     * @return void
     */
    public function handle(UpdateReplyCommand $command)
    {
        $replies = $this->replies->getById($command->id);

        $this->replies->update($replies, $command->toArray());
    }
}
