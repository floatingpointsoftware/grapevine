<?php 
namespace FloatingPoint\Grapevine\Modules\Forums\Handlers\Commands;

use FloatingPoint\Grapevine\Modules\Forums\Commands\UpdatePostCommand;
use FloatingPoint\Grapevine\Library\Support\Command;

class UpdatePostCommandHandler extends Command
{
    public function __construct(PostRepositoryInterface $posts)
    {
        $this->posts = $posts;
    }

    public function handle(UpdatePostCommand $command)
    {
        $post = $this->posts->getById($command->id);

        return $this->posts->update($post, $command->toArray());
    }
}
