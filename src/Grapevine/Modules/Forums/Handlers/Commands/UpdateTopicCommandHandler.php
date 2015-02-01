<?php 
namespace FloatingPoint\Grapevine\Modules\Forums\Handlers\Commands;

use FloatingPoint\Grapevine\Library\Slugs\Slug;
use FloatingPoint\Grapevine\Modules\Forums\Commands\UpdateTopicCommand;
use FloatingPoint\Grapevine\Modules\Forums\Repositories\TopicRepositoryInterface;

class UpdateTopicCommandHandler
{
    private $topics;

    public function __construct(TopicRepositoryInterface $topics)
    {
        $this->topics = $topics;
    }

    public function handle(UpdateTopicCommand $command)
    {
        $topic = $this->topics->getBySlug($command->topicSlug);
        $topic->title = $command->title;
        $topic->slug = Slug::fromTitle($command->title);
        $this->topics->save($topic);
    }
}
