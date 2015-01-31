<?php 
namespace FloatingPoint\Grapevine\Modules\Forums\Handlers\Commands;

use FloatingPoint\Grapevine\Modules\Forums\Commands\CreatePostCommand;

class CreatePostCommandHandler
{
    private $posts;
    private $factory;

    public function handle(CreatePostCommand $command)
    {
        $post = $this->factory->create($command->toArray());

        $this->posts->save($post);

        $this->dispatch($post->releaseEvents());
    }
}
