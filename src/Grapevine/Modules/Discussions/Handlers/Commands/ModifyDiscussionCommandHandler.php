<?php 
namespace FloatingPoint\Grapevine\Modules\Discussions\Handlers\Commands;

use FloatingPoint\Grapevine\Library\Slugs\Slug;
use FloatingPoint\Grapevine\Modules\Discussions\Commands\ModifyDiscussionCommand;
use FloatingPoint\Grapevine\Modules\Discussions\Data\DiscussionRepository;

class ModifyDiscussionCommandHandler
{
    private $discussions;

    public function __construct(DiscussionRepository $discussions)
    {
        $this->discussions = $discussions;
    }

    public function handle(ModifyDiscussionCommand $command)
    {
        $discussion = $this->discussions->getBySlug($command->discussionSlug);
        $discussion->title = $command->title;
        $discussion->slug = Slug::fromTitle($command->title);
        $this->discussions->save($discussion);
    }
}
