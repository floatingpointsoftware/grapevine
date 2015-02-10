<?php 
namespace FloatingPoint\Grapevine\Modules\Topics\Commands;

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
