<?php 
namespace FloatingPoint\Grapevine\Modules\Topics\Handlers\Commands;

use FloatingPoint\Grapevine\Library\Slugs\Slug;
use FloatingPoint\Grapevine\Modules\Topics\Commands\UpdateTopicCommand;
use FloatingPoint\Grapevine\Modules\Topics\Data\TopicRepository;

class UpdateTopicCommandHandler
{
    private $topics;

    public function __construct(TopicRepository $topics)
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
