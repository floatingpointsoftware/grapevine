<?php 
namespace FloatingPoint\Grapevine\Modules\Forums\Commands;

class UpdateTopicCommand 
{
    public $title;
    public $topicSlug;

    public function __construct($title, $topicSlug)
    {
        $this->title = $title;
        $this->topicSlug = $topicSlug;
    }
}
